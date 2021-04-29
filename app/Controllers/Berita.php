<?php

namespace App\Controllers;

use Config\Services;
use App\Models\BeritaModel;
use App\Models\admin_model;

use Config\Email;
use Myth\Auth\Entities\User;


class Berita extends BaseController
{

    private $data = [];

    public function __construct()
    {
        $this->form_validation = \Config\Services::validation();
        $this->session = service('session');

        $this->config = config('Auth');
        $this->auth = service('authentication');
    }

    protected function output_json($data = null)
    {
        echo (json_encode($data));
    }

    protected function getPostComment($id, $all = null)  #SOLVED
    {
        $init = new BeritaModel();
        $init_user = new admin_model();

        if ($all) {
            $query_comments = $init->getPostComments($id, false)->getResultArray();
        } else {
            $query_comments = $init->getPostComments($id)->getResultArray();
        }

        $comments_count = $init->countComments($id)->getRowArray();

        for ($i = 0; $i < count($query_comments); $i++) {
            $data = $init_user->getUserById($query_comments[$i]['user_id'])->getRowArray();

            $query_comments[$i]['time'] = time_for_comment($query_comments[$i]['time']);
            if (!$data) {
                $query_comments[$i]['name'] = 'Unknown';
                $query_comments[$i]['image'] = 'default.png';
            } else {
                $query_comments[$i]['name'] = ucwords($data['fullname']);
                $query_comments[$i]['image'] = $data['user_image'];
            }
        }

        sortByOrder($query_comments, 'id');
        return [array_values($query_comments), $comments_count];
    }

    public function news_index() #SOLVED
    {
        $init = new BeritaModel();
        $init_user = new admin_model();
        $data = $init->getAllNews()->getResultArray();

        $inactive = [];
        $count_data = count($data);
        for ($i = 0; $i < $count_data; $i++) {
            $user = $init_user->getUserById($data[$i]['user_id'])->getRowArray();
            if ($user && !empty($user)) {
                $data[$i]['user'] = $user['fullname'];
            } else {
                $data[$i]['user'] = 'User Unknown';
            }
            $data[$i]['count_comments'] = $this->getPostComment($data[$i]['id'])[1]['total'];
            $data[$i]['visited'] = $init->getVisitedPage($data[$i]['id'])->getRowArray();

            if ($data[$i]['aktif'] != 1) {
                $inactive[] = $data[$i];
                unset($data[$i]);
            }
        }

        $data = array_values($data);

        $this->data =  [
            'title' => 'Management Berita',
            'data' => $data,
            'inactive' => $inactive,
            'access' => ['Public', 'Private', 'Other'],
            'datasets' => json_encode($this->get_all_datasets())
        ];

        return view('admin' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . 'index', $this->data);
    }

    public function news_list() #SOLVED
    {
        $init = new BeritaModel();
        $data = $init->getAllNews()->getResultArray();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['comments'] = $this->getPostComment($data[$i]['id'])[0];
            $data[$i]['count_comments'] = $this->getPostComment($data[$i]['id'])[1]['total'];
            $data[$i]['visited'] = $init->getVisitedPage($data[$i]['id'])->getRowArray();
        }

        $this->data =  [
            'title' => 'Management Berita',
            'data' => $data,
        ];

        return view('admin' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . 'news', $this->data);
    }

    public function get_content()
    {
        if (!$this->request->isAJAX()) $this->output_json(false);

        $init = new BeritaModel();

        $news_id = $this->request->getPost('id');

        $query = $init->getNewsById($news_id)->getRowArray();
        if (!$news_id || empty($query)) {
            $this->output_json(false);
        } else {
            $query['count_comments'] = $this->getPostComment($query['id'])[1]['total'];
            $query['visited'] = $init->getVisitedPage($query['id'])->getRowArray();
            $query['tanggal_publish'] =  date_formats($query['tanggal_publish']);
            $this->output_json($query);
        }
    }

    public function create_news() #SOLVED
    {
        if (isset($_POST['insert_news'])) {

            if ($this->form_validation->run($this->request->getPost(), 'create_news') === FALSE) {
                session()->setFlashdata('inputs', $this->request->getPost());
                session()->setFlashdata('errors', $this->form_validation->getErrors());
                return redirect()->to(base_url('/admin/berita/insert'));
            } else {
                if (!session()->has('folder_name')) {
                    $name_folder = 'raw_file' . round(microtime(true));
                    $curr_folder = ROOTPATH . '/public/berita' . '/' . $name_folder;
                    mkdir($curr_folder, 0777, true);
                    session()->set('folder_name', $name_folder);
                }

                $init = new BeritaModel();
                $dataset = [
                    'date' => $this->request->getPost('date'),
                    'header' => $this->request->getPost('header'),
                    'content' =>  $this->request->getPost('content'),
                    'access' =>  $this->request->getPost('access'),
                    'author' =>  $this->request->getPost('author'),
                    'thumbnail' => NULL,
                    'user_id' => NULL,
                    'groups_id' => NULL,
                ];

                $access_groups = $this->request->getPost('access_groups');
                $thumbnail = $this->request->getFile('thumbnail');

                $thumb_name = "thumbnail_" . $thumbnail->getName();
                $thumbnail->move(ROOTPATH . 'public/berita/' . session()->get('folder_name'), $thumb_name);
                $dataset['thumbnail'] = esc($thumb_name);

                if ($dataset['access'] == 'other') {
                    if (is_null($access_groups) || empty($access_groups)) {
                        $err = ['access_groups' => 'Group access data is required if you set access for specific groups.'];
                        session()->setFlashdata('errors', $err);
                        return redirect()->to(base_url('/admin/berita/insert'));
                    }
                    $dataset['groups_id'] = preg_replace("/[\s\/.]/", "", array_to_string($access_groups, 1));
                } else  if ($dataset['access'] == 'private') {
                    $dataset['user_id'] = userdata()['id'];
                }

                $query = $init->insertNews($dataset);

                if ($query === true) {
                    session()->setFlashdata('status', "<script>Swal.fire({icon: 'success',title: 'Success',text: 'News added successfully',showConfirmButton: false,timer: 2500})</script>");
                    return redirect()->to(base_url('/admin/berita'));
                } else {
                    session()->setFlashdata('status', "<script>Swal.fire({icon: 'info',title: 'Oops',text: 'Something went wrong',showConfirmButton: false,timer: 2500})</script>");
                    return redirect()->to(base_url('/admin/berita/insert'));
                }
            }
        }

        $authorize = Services::authorization();
        $groups = $authorize->groups();

        $this->data =  [
            'groups' => $groups,
            'listErrors' => $this->form_validation->listErrors()
        ];

        return view('admin' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . 'create', $this->data);
    }

    public function update_news($id) #SOLVED
    {
        if (isset($_POST['update_news'])) {
            if ($this->form_validation->run($this->request->getPost(), 'update_news') === FALSE) {
                session()->setFlashdata('inputs', $this->request->getPost());
                session()->setFlashdata('errors', $this->form_validation->getErrors());
                return redirect()->to(base_url('/admin/berita/update/' . $id));
            } else {
                $init = new BeritaModel();

                $dataset = [
                    'id' => $id,
                    'date' => $this->request->getPost('date'),
                    'header' => $this->request->getPost('header'),
                    'content' =>  $this->request->getPost('content'),
                    'access' =>  $this->request->getPost('access'),
                    'author' =>  $this->request->getPost('author'),
                    'thumbnail' => NULL,
                    'user_id' => NULL,
                    'groups_id' => NULL,
                ];

                $thumbnail = $this->request->getFile('thumbnail');
                if ($thumbnail->getSize() > 0) {
                    $thumb_name = "thumbnail_" . $thumbnail->getName();
                    $thumbnail->move(ROOTPATH . 'public/berita/berita_' . $id, $thumb_name);
                    $dataset['thumbnail'] = esc($thumb_name);
                }

                $access_groups = $this->request->getPost('access_groups');

                if ($dataset['access'] == 'other') {
                    if (is_null($access_groups) || empty($access_groups)) {
                        $err = ['access_groups' => 'Group access data is required if you set access for specific groups.'];
                        session()->setFlashdata('errors', $err);
                        return redirect()->to(base_url('/admin/berita/update/' . $id));
                    }
                    $dataset['groups_id'] = preg_replace("/[\s\/.]/", "", array_to_string($access_groups, 1));
                } else  if ($dataset['access'] == 'private') {
                    $dataset['user_id'] = userdata()['id'];
                }

                $query = $init->updateNews($dataset);
                if ($query === true) {
                    session()->setFlashdata('status', "<script>Swal.fire({icon: 'success',title: 'Success',text: 'News updated successfully',showConfirmButton: false,timer: 1500})</script>");
                    return redirect()->to(base_url('/admin/berita'));
                } else {
                    session()->setFlashdata('status', "<script>Swal.fire({icon: 'info',title: 'Oops',text: 'Something went wrong',showConfirmButton: false,timer: 1500})</script>");
                    return redirect()->to(base_url('/admin/berita/update/' . $id));
                }
            }
        }

        $init = new BeritaModel();
        $data = $init->getNewsById($id)->getRowArray();

        $authorize = Services::authorization();
        $groups = $authorize->groups();
        if ($data['groups_id']) $data['groups_id'] = explode(',', $data['groups_id']);

        $this->data =  [
            'groups' => $groups,
            'data' => $data,
            'listErrors' => $this->form_validation->listErrors()
        ];

        return view('admin' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . 'update', $this->data);
    }

    public function upload_file() #SOLVED
    {
        if (!$this->request->isAJAX()) $this->output_json(false);

        $id =  $this->request->getPost('id');

        $dir = ROOTPATH . '/public/berita';
        $file_name = explode(".", $_FILES['file']['name']);
        $file_name = round(microtime(true)) . '.' . end($file_name);
        $tmp_name =  $_FILES['file']['tmp_name'];

        if (!$id) {
            if (session()->has('folder_name')) {
                $name_folder = session()->get('folder_name');
                $curr_folder = $dir . '/' . session()->get('folder_name');
            } else {
                $name_folder = 'raw_file' . round(microtime(true));
                $curr_folder = $dir . '/' . $name_folder;
                session()->set('folder_name', $name_folder);
            }

            if (!file_exists($curr_folder)) {
                mkdir($curr_folder, 0777, true);
            }

            $upload = move_uploaded_file($tmp_name, $curr_folder . '/' . $file_name);
            $return_dir = base_url() . "/berita/" . $name_folder . "/" . $file_name;
        } else {
            $upload = move_uploaded_file($tmp_name, $dir . '/berita_' . $id . '/' . $file_name);
            $return_dir = base_url() . "/berita/berita_" . $id . "/" . $file_name;
        }

        if ($upload !== false) {
            $this->output_json($return_dir);
        } else {
            $this->output_json(false);
        }
    }

    public function delete_file() #SOLVED
    {
        $src = $this->request->getPost('path');
        $src = explode('/', $src);
        $dir_file = array_values(array_slice($src, -2));
        $curr_folder = ROOTPATH . '/public/berita/' . $dir_file[0] . '/' . $dir_file[1];
        if (file_exists($curr_folder)) {
            $this->output_json(unlink($curr_folder));
        } else {
            $this->output_json(false);
        }
    }

    public function delete_news($id) #SOLVED
    {
        $init = new BeritaModel();
        $query = $init->deleteNews($id);
        if ($query === true) {
            session()->setFlashdata('status', "<script>Swal.fire({icon: 'success',title: 'Success',text: 'News deleted successfully',showConfirmButton: false,timer: 1500})</script>");
            return redirect()->to(base_url('/admin/berita'));
        } else {
            session()->setFlashdata('status', "<script>Swal.fire({icon: 'info',title: 'Oops',text: 'Something went wrong',showConfirmButton: false,timer: 1500})</script>");
            return redirect()->to(base_url('/admin/berita'));
        }
    }

    public function post_comment() #SOLVED
    {
        if (!$this->request->isAJAX()) $this->output_json(false);

        $init = new BeritaModel();

        $news_id = $this->request->getPost('news_id');
        $comment = $this->request->getPost('data');
        $user_id =  userdata()['id'];

        $query = $init->postComments([$news_id, $user_id, $comment]);
        $this->output_json($query);
    }

    public function get_comments() #SOLVED
    {
        if (!$this->request->isAJAX()) $this->output_json(false);

        $dataset = [];
        $news = $this->request->getPost('data');
        $is_all = $this->request->getPost('all');

        for ($i = 0; $i < count($news); $i++) {
            $html = '';
            $data_comments = $this->getPostComment($news[$i], $is_all);
            $comments = $data_comments[0];
            if (!$is_all) {
                if (count($comments) > 5) $comments = array_values(array_slice($comments, -5, 5, true));
            }

            for ($j = 0; $j < count($comments); $j++) {
                $html .= '<div class="card-comment">
                <img class="img-circle img-sm" src="' . base_url('users/profile/' . $comments[$j]['image']) . '" alt="User Image">
                	<div class="comment-text">
                    	<span class="username">
                            ' . $comments[$j]['name'] . '
                            	<div class="float-right">
                                	<span class="text-muted">' . $comments[$j]['time'] . '</span>
									<div class="btn-group dropleft ml-2">
                                        <a class="text-secondary" href="#" role="button" data-toggle="dropdown" style="font-weight: 100;">
                                        	<i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0)" onclick="delete_comment(' . $comments[$j]['id'] . ',' . $news[$i] . ')" style="font-size: 12px;">Hapus Komentar</a>
                                        </div>
                                    </div>
                                </div>
                        </span>
                        ' . $comments[$j]['komentar'] . '
                	</div>
            	</div>';
            }

            if (!$is_all) {
                if ($data_comments[1]['total'] > 5) {
                    $html .=  '<br><a href="javascript:void(0)" id="set-length-comments-' . $news[$i] . '" onclick="show_all_comments(' . $news[$i] . ')">Lihat semua komentar</a>';
                }
            } else {
                if ($data_comments[1]['total'] > 5) {
                    $html .=  '<br><a href="javascript:void(0)" id="set-length-comments-' . $news[$i] . '" onclick="show_less_comments(' . $news[$i] . ')">Tampilkan lebih sedikit</a>';
                }
            }

            $dataset[] = [
                'count' => $data_comments[1]['total'],
                'news_id' => $news[$i],
                'html' => $html
            ];
        }
        $this->output_json($dataset);
    }

    public function delete_comment() #SOLVED
    {
        if (!$this->request->isAJAX()) $this->output_json(false);

        $init = new BeritaModel();

        $id = $this->request->getPost('id');
        $query = $init->deleteComment($id);
        $this->output_json($query);
    }

    public function news_view($id) #SOLVED
    {
        $init = new BeritaModel();
        $data = $init->getNewsById($id)->getRowArray();

        $data['comments'] = $this->getPostComment($data['id'])[0];
        $data['count_comments'] = $this->getPostComment($data['id'])[1]['total'];
        $data['visited'] = $init->getVisitedPage($id)->getRowArray();
        record_visits($id);

        $this->data =  [
            'title' => 'Management Berita',
            'dataset' => $data,
        ];

        return view('admin' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . 'news_specified', $this->data);
    }

    public function change_access()  #SOLVED
    {
        if (!$this->request->isAJAX()) $this->output_json(false);

        $init = new BeritaModel();

        $id = $this->request->getPost('id');
        $val = strtolower($this->request->getPost('val'));

        if ($val != 'public' && $val != 'private' && $val != 'other') {
            $this->output_json(false);
        } else {
            $query = $init->changeAccessNews($id, $val);
            $this->output_json($query);
        }
    }

    public function activate_news()  #SOLVED
    {
        if (!$this->request->isAJAX()) $this->output_json(false);

        $init = new BeritaModel();
        $id = $this->request->getPost('id');

        $query = $init->activate_news($id);
        $this->output_json($query);
    }

    protected function get_all_datasets()
    {
        $init = new BeritaModel();
        $news = $init->getAllNews()->getResultArray();

        $ip = 1;
        $labels = [];
        $datasets = [];

        for ($i = 0; $i < count($news); $i++) {
            $ip = $this->get_datasets($news[$i]['id'], $return_obj = false);
            $datasets[] = [
                'judul' => $news[$i]['judul'],
                'date' => $ip['labels'],
                'hits' => $ip['datasets']['data'],
            ];
        }

        $labels = [];
        for ($i = 0; $i < count($datasets); $i++) {
            for ($j = 0; $j < count($datasets[$i]['date']); $j++) {
                $chck = in_array_help($datasets[$i]['date'][$j], $labels);
                if ($chck === FALSE) {
                    $labels[] =  $datasets[$i]['date'][$j];
                }
            }
        }
        $labels = date_short($labels);

        $c = [];
        for ($i = 0; $i < count($datasets); $i++) {
            $VAL_BERITA = [];
            for ($j = 0; $j < count($datasets[$i]['date']); $j++) {
                $chck = in_array_help($datasets[$i]['date'][$j], $labels);
                if ($chck !== FALSE) {
                    $VAL_BERITA[$chck] = $datasets[$i]['hits'][$j];
                }
            }

            for ($k = 0; $k < count($labels); $k++) {
                if (!array_key_exists($k, $VAL_BERITA)) {
                    $VAL_BERITA[$k] = 0;
                }
            }
            ksort($VAL_BERITA, 1);
            $color = getRGBColor(rand(10, 85));
            $c[] = [
                'label' => $datasets[$i]['judul'],
                'data' => $VAL_BERITA,
                'fill' => false,
                'borderColor' => 'rgb(' . $color[0] . ',' . $color[1] . ',' . $color[2] . ')'
            ];
        }
        $retur = [
            'labels' => $labels,
            'datasets' => $c,
        ];
        return $retur;
    }

    protected function get_datasets($id, $return_obj = true)
    {
        $init = new BeritaModel();

        $ip = $init->getIPVisits($id)->getResultArray();

        $data = [];
        $labels = [];
        $datasets = [];

        for ($i = 0; $i < count($ip); $i++) {
            $chk = search_array_2($data, 'date',  explode(' ', $ip[$i]['date'])[0]);
            if ($chk === FALSE) {
                $data[] = [
                    'date' => explode(' ', $ip[$i]['date'])[0],
                    'hits' => (int)$ip[$i]['hits'],
                ];
            } else {
                $data[$chk]['hits'] += (int)$ip[$i]['hits'];
            }
        }

        for ($i = 0; $i < count($data); $i++) {
            $labels[] = $data[$i]['date'];
            $datasets[] = $data[$i]['hits'];
        }

        $datasets = [
            'label' => 'Total Visits',
            'data' => $datasets,
            'fill' => false,
            'borderColor' => 'rgb(75, 192, 192)',
        ];

        if ($return_obj) {
            $object = new \stdClass;
            $object->labels  = $labels;
            $object->datasets  = [$datasets];
            return $object;
        } else {
            return [
                'labels' => $labels,
                'datasets' => $datasets,
            ];
        }
    }

    public function news_analysis()
    {
        if (!$this->request->isAJAX()) $this->output_json(false);

        $id = $this->request->getPost('id');

        $init = new BeritaModel();
        $ip_visited = $ip = $init->getIPVisits($id)->getResultArray();
        $count_visits = $init->getVisitedPage($id)->getRowArray();

        $tr_ip = '';
        for ($i = 0; $i < count($ip_visited); $i++) {
            $loc = '<span title="Request Time Out">Unknown</span>';
            if ($ip_visited[$i]['ip'] == '::1') {
                $loc = '<span>Localhost</span>';
            } else if (is_connected()) {
                $loc = json_decode(file_get_contents("http://ipinfo.io/{$ip_visited[$i]['ip']}/json"))->city;
            }

            $tr_ip .= '<tr>
			<td>' . ($i + 1) . '</td>
			<td>' . $ip_visited[$i]['ip'] . '</td>
			<td>' . date('d-m-Y H:i', strtotime($ip_visited[$i]['date'])) . '</td>
			<td>' . $loc . '</td>
			<td class="text-center">' . $ip_visited[$i]['hits'] . '</td>
			</tr>';
        }

        $tr_comments = '';
        $comments = $this->getPostComment($id, $all = true);
        $count_visits['comments'] = count($comments);
        for ($i = 0; $i < count($comments[0]); $i++) {
            $tr_comments .= '<tr>
			<td>' . ($i + 1) . '</td>
			<td>' . $comments[0][$i]['name'] . '</td>
			<td>' . $comments[0][$i]['time'] . '</td>
			<td>' . substr($comments[0][$i]['komentar'], 0, 10) . ' ...'  . '</td>
			<td class="text-center"><a href="javascript:void(0)" onclick="delete_comment(' . $comments[0][$i]['id'] . ',' . $id . ')" class="text-muted"><i class="fas fa-trash"></i></a></td>
			</tr>';
        }

        $object = $this->get_datasets($id);

        $this->output_json([$object, $count_visits, $tr_ip, $tr_comments]);
    }
}
