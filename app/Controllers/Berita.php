<?php

namespace App\Controllers;

use Config\Services;
use App\Models\BeritaModel;
use App\Models\admin_model;

use Colors\RandomColor;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Berita extends BaseController
{

    private $data = [];

    public function __construct()
    {
        if (session()->has('role'))
            if (!in_array("2", session('role')) && !in_array("1", session('role')))
                echo '<script>window.location.replace("' . base_url() . '");</script>';

        $this->form_validation = \Config\Services::validation();
        $this->session = service('session');

        $this->config = config('Auth');
        $this->auth = service('authentication');
    }

    protected function output_json($data = null)
    {
        echo (json_encode($data));
    }

    protected function getPostComment($id, $all = null, $html = true)  #SOLVED
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

            if ($html) {
                $query_comments[$i]['time'] = time_for_comment($query_comments[$i]['time']);
            } else {
                $query_comments[$i]['time'] = date("d M Y H:i", strtotime($query_comments[$i]['time']));
            }

            if (!$data) {
                $query_comments[$i]['name'] = 'Unknown';
                $query_comments[$i]['image'] = '/img/components/icon/Lk-icon.svg';
            } else {
                $default = ["Lk-icon.svg", "Pr-icon.svg"];
                if (!$data['id_alumni']) {
                    //Kalau di edit profile, user non alumni can edit profile, so pliss uncomment this code
                    // $query_comments[$i]['image'] = strtolower($data['user_image']) == "default.svg" ? "/img/components/icon/" . $default[0] : "/img/components/user/userid_" . $data['id'] . "/" . $data['user_image'];
                    $query_comments[$i]['image'] = "/img/components/icon/" . $default[0];
                } else {
                    $alumni = $init_user->getAlumniById($data['id_alumni'])->getRowArray();
                    $check_img = in_array_help(strtolower($alumni['foto_profil']), $default);
                    $tmp =  $check_img !== FALSE ?  "/img/components/user/userid_" . $data['id'] . "/" . $alumni['foto_profil'] : "/img/components/icon/" . $default[$check_img];
                    $query_comments[$i]['image'] = $tmp;
                }

                $query_comments[$i]['name'] = ucwords($data['fullname']);
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

        $review = [];
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

            if ($data[$i]['akses'] == 'review') {
                $review[] = $data[$i];
                unset($data[$i]);
            }
        }

        $data = array_values($data);

        $authorize = Services::authorization();
        $groups = $authorize->groups();
        for ($i = 0; $i < count($groups); $i++) {
            if ($groups[$i]->id == '1' || strtolower($groups[$i]->name) == 'administrator') {
                unset($groups[$i]);
            }
        }
        $groups = array_values($groups);

        $this->data =  [
            'title' => 'Management Berita',
            'data' => $data,
            'review' => $review,
            'access' => ['Public', 'Private', 'Other', 'Review'],
            'datasets' => json_encode($this->get_all_datasets()),
            'groups' => $groups
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
        if (!$news_id || !$query) {
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
                    $curr_folder = ROOTPATH . '../berita' . '/' . $name_folder;
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
                $thumbnail->move(ROOTPATH . '../berita/' . session()->get('folder_name'), $thumb_name);
                $dataset['thumbnail'] = esc($thumb_name);

                if ($dataset['access'] == 'other') {
                    if (is_null($access_groups) || empty($access_groups)) {
                        $err = ['access_groups' => 'Group access data is required if you set access for specific groups.'];
                        session()->setFlashdata('errors', $err);
                        return redirect()->to(base_url('/admin/berita/insert'));
                    } else {
                        $dataset['groups_id'] = preg_replace("/[\s\/.]/", "", array_to_string($access_groups, 1));
                    }
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
        for ($i = 0; $i < count($groups); $i++) {
            if ($groups[$i]->id == '1' || strtolower($groups[$i]->name) == 'administrator') {
                unset($groups[$i]);
            }
        }
        $groups = array_values($groups);
        $this->data =  [
            'groups' => $groups,
            'listErrors' => $this->form_validation->listErrors()
        ];

        return view('admin' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . 'create', $this->data);
    }

    public function update_news($id) #SOLVED
    {
        $init = new BeritaModel();
        $data = $init->getNewsById($id)->getRowArray();

        $authorize = Services::authorization();
        $groups = $authorize->groups();

        for ($i = 0; $i < count($groups); $i++) {
            if ($groups[$i]->id == '1' || strtolower($groups[$i]->name) == 'administrator') {
                unset($groups[$i]);
            }
        }
        $groups = array_values($groups);

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
                    'groups_id' => NULL,
                ];

                $thumbnail = $this->request->getFile('thumbnail');
                if ($thumbnail->getSize() > 0) {
                    $thumb_name = "thumbnail_" . $thumbnail->getName();
                    $thumbnail->move(ROOTPATH . '../berita/berita_' . $id, $thumb_name);
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

        if ($data['groups_id']) $data['groups_id'] = explode(',', $data['groups_id']);
        if ($data['tanggal_publish']) {
            $date = explode(' ', $data['tanggal_publish']);
            $data['tanggal_publish'] = $date[0];
        }

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

        $dir = ROOTPATH . '../berita';
        $file_name = explode(".", $_FILES['file']['name']);
        $file_name = round(microtime(true)) . '.' . end($file_name);
        $tmp_name =  $_FILES['file']['tmp_name'];

        if (!$id) {
            if (session()->has('folder_name')) {
                $name_folder = session()->get('folder_name');
                $curr_folder = $dir . '/' . $name_folder;
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
        $curr_folder = ROOTPATH . '../berita/' . $dir_file[0] . '/' . $dir_file[1];
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
                if (count($comments) > 4) $comments = array_values(array_slice($comments, -4, 4, true));
            }

            for ($j = 0; $j < count($comments); $j++) {
                $html .= '<div class="flex items-center text-primary lg:mb-4 mb-3">
                                <img class="lg:h-14 md:h-12 h-8 lg:mr-4 mr-2" src="' . base_url($comments[$j]['image']) . '">
                                <div class="bg-gray-200 lg:pl-6 pl-4 py-3 gap-x-2 rounded-lg w-full">
                                    <div class="flex justify-between">
                                        <div class="w-7/8">
                                            <div class="text-primary lg:text-xl md:text-lg text-base font-bold">' . $comments[$j]['name'] . '</div>
                                            <div class="lg:text-base md:text-sm text-xs">' . $comments[$j]['komentar'] . '</div>
                                        </div>
                                        <div class="w-1/8">
                                            <div class="float-right">
                                                <div class="btn-group dropleft mr-4">
                                                    <a class="text-secondary" href="javascript:void(0)" role="button" data-toggle="dropdown" style="font-weight: 100;" onclick="delete_comment(' . $comments[$j]['id'] . ',' . $news[$i] . ')">
                                                        <i class="fas fa-trash-alt text-lg"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>';
            }

            if (!$is_all) {
                if ($data_comments[1]['total'] > 4) {
                    $html .=   '<div class="flex justify-end text-secondary lg:text-xl md:text-lg text-base lg:mb-8 md:mb-6 mb-4">
                                <a href="javascript:void(0)" id="set-length-comments-' . $news[$i] . '" onclick="show_all_comments(' . $news[$i] . ')">Lihat semua komentar</a>
                            </div>';
                }
            } else {
                if ($data_comments[1]['total'] > 4) {
                    $html .=   '<div class="flex justify-end text-secondary lg:text-xl md:text-lg text-base lg:mb-8 md:mb-6 mb-4">
                                <a href="javascript:void(0)" id="set-length-comments-' . $news[$i] . '" onclick="show_less_comments(' . $news[$i] . ')">Tampilkan lebih sedikit</a>
                            </div>';
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

    public function berita()
    {
        $init = new BeritaModel();

        $dataset = $init->getAllNews()->getResultArray();
        $news_pop = $init->getNewsPop()->getResultArray();
        $count = count($news_pop);

        $current_date = strtotime(get_date());
        for ($i = 0; $i < $count; $i++) {
            if ($news_pop[$i]['akses'] == 'private') {
                if (userdata()['id'] != $news_pop[$i]['user_id']) {
                    unset($news_pop[$i]);
                }
            } else if ($news_pop[$i]['akses'] == 'other') {
                $groups_access = explode(',', $news_pop[$i]['groups_id']);
                $user_groups = role_user();
                $permission = false;
                for ($j = 0; $j < count($user_groups); $j++) {
                    if (in_array_help($user_groups[$j]['group_id'], $groups_access, true) !== FALSE) {
                        $permission = true;
                    }
                }
                if (!$permission) {
                    unset($news_pop[$i]);
                }
            }
        }
        $news_pop = array_values($news_pop);

        $count_data = count($dataset);
        for ($i = 0; $i < $count_data; $i++) {
            $PublishDate = strtotime($dataset[$i]['tanggal_publish']);
            if ($current_date < $PublishDate) {
                unset($dataset[$i]);
                continue;
            }

            if ($dataset[$i]['akses'] == 'review' || $dataset[$i]['aktif'] != 1) {
                unset($dataset[$i]);
                continue;
            } else {
                if ($dataset[$i]['akses'] == 'private') {
                    if (userdata()['id'] != $dataset[$i]['user_id']) {
                        unset($dataset[$i]);
                        continue;
                    }
                } else if ($dataset[$i]['akses'] == 'other') {
                    $groups_access = explode(',', $dataset[$i]['groups_id']);
                    $user_groups = role_user();
                    $permission = false;
                    for ($j = 0; $j < count($user_groups); $j++) {
                        if (in_array_help($user_groups[$j]['group_id'], $groups_access, true) !== FALSE) {
                            $permission = true;
                        }
                    }
                    if (!$permission) {
                        unset($dataset[$i]);
                        continue;
                    }
                }
            }

            $dataset[$i]['tanggal_publish'] = date('d F Y', strtotime($dataset[$i]['tanggal_publish']));
            $string_length = 150;
            $dataset[$i]['konten'] = substr(strip_tags($dataset[$i]['konten']), 0, $string_length) . ' ..';
        }
        $data = array_values($dataset);

        $limit = 10;
        $page = isset($_GET['page']) ? (int)$this->request->getGet('page') : 1;
        $number_of_page = ($page > 1) ? ($page * $limit) - $limit : 0;

        $total_data = count($data);
        $total_page = ceil($total_data / $limit);

        $data_berita = array_slice($data, $number_of_page, $limit);

        $previous = $page - 1;
        $next = $page + 1;

        $dataUserNews = [];
        $userNews = $init->getNewsByUserId(userdata()['id'])->getResultArray();

        for ($i = 0; $i < count($userNews); $i++) {
            if ($userNews[$i]['akses'] == 'review' && $userNews[$i]['aktif'] == '0') {
                $msg = 'Berita anda dengan judul "' . $userNews[$i]['judul']  . '" sedang menunggu konfirmasi Administrator.';
            } else if ($userNews[$i]['akses'] != 'review' && $userNews[$i]['akses'] != 'private' && $userNews[$i]['aktif'] == '1' && (strtotime(get_date()) >= strtotime($userNews[$i]['tanggal_publish']))) {
                $msg = 'Berita anda dengan judul "' . $userNews[$i]['judul']  . '" telah dikonfirmasi dan telah dipublikasikan.';
            } else if ($userNews[$i]['akses'] != 'review' && $userNews[$i]['akses'] != 'private' && $userNews[$i]['aktif'] == '1' && (strtotime(get_date()) < strtotime($userNews[$i]['tanggal_publish']))) {
                $msg = 'Berita anda dengan judul "' . $userNews[$i]['judul']  . '" telah dikonfirmasi dan belum dipublikasikan.';
            } else if ($userNews[$i]['akses'] != 'review' && $userNews[$i]['akses'] != 'private' && $userNews[$i]['aktif'] == '0') {
                $msg = 'Berita anda dengan judul "' . $userNews[$i]['judul']  . '" telah dikonfirmasi dan menunggu dipublikasikan.';
            } else {
                $msg = 'Berita anda dengan judul "' . $userNews[$i]['judul']  . '" telah diterima dan menunggu review Administrator.';
            }

            $dataUserNews[] = [
                'id' => $userNews[$i]['id'],
                'msg' => $msg,
                'date' => date('d M Y', strtotime($userNews[$i]['tanggal_publish'])),
                'thumbnail' => $userNews[$i]['thumbnail'],
            ];
        }

        //API BERITA
        $client = \Config\Services::curlrequest();
        $response = $client->request('POST', 'https://pusdiklat-bps.id/api/berita', [
            'form_params' => [
                'kategori' => '1',
                'token' => '473KpgTwt9MFxmpAYJ7aF2w5'
            ]
        ]);

        $beritaApi = json_decode($response->getBody());
        if ($beritaApi->status == 'sukses') {
            $berita = $beritaApi->data;
            //dd($berita);
            $page = !empty($_GET['pageapi']) ? (int) $_GET['pageapi'] : 1;
            $total = count($berita); //total items in array    
            $limit = 8; //per page    
            $totalPages = ceil($total / $limit); //calculate total pages
            $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
            $page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
            $offset = ($page - 1) * $limit;
            if ($offset < 0) $offset = 0;
            $berita = array_slice($berita, $offset, $limit);

            $data['apiberita'] = $berita;
            $data['tot_page'] = $totalPages;
            $data['pageapi'] = $page;
        };
        // end apiberita

        $data['dataset'] = $data_berita;
        $data['judulHalaman'] = 'Berita';
        $data['active'] = 'berita';
        $data['login'] = 'sudah';
        $data['notifications'] = $dataUserNews;
        $data['newsPop'] = $news_pop;
        $data['pagination'] = [
            'number' => $number_of_page + 1,
            'page' => $page,
            'previous' => $previous,
            'next' => $next,
            'total_page' => $total_page
        ];
        return view('websia/kontenWebsia/beritaArtikel/berandaBerita', $data);
    }

    public function news_view($id) #SOLVED
    {
        $id = esc($id);
        $init = new BeritaModel();
        $data = $init->getNewsById($id)->getRowArray();
        $current_date = strtotime(get_date());

        if (!$data) return redirect()->to(base_url('/berita/berita'));

        if ($current_date < strtotime($data['tanggal_publish']))
            return redirect()->to(base_url('/berita/berita'));

        if ($data['akses'] == 'review' || $data['aktif'] != 1) {
            return redirect()->to(base_url('/berita/berita'));
        }

        if ($data['akses'] == 'private') {
            if (userdata()['id'] != $data['user_id']) {
                return redirect()->to(base_url('/berita/berita'));
            }
        } else if ($data['akses'] == 'other') {
            $groups_access = explode(',', $data['groups_id']);
            $user_groups = role_user();
            $permission = false;
            for ($j = 0; $j < count($user_groups); $j++) {
                if (in_array_help($user_groups[$j]['group_id'], $groups_access, true) !== FALSE) {
                    $permission = true;
                }
            }
            if (!$permission) {
                return redirect()->to(base_url('/berita/berita'));
            }
        }

        $getComments = $this->getPostComment($data['id']);

        $data['tanggal_publish'] = date('d F Y', strtotime($data['tanggal_publish']));
        $data['comments'] = $getComments[0];
        $data['count_comments'] = $getComments[1]['total'];
        $data['visited'] = $init->getVisitedPage($id)->getRowArray()['visited'];
        record_visits($id);

        $news_pop = $init->getNewsPop()->getResultArray();
        $count = count($news_pop);

        for ($i = 0; $i < $count; $i++) {

            if ($news_pop[$i]['akses'] == 'private') {
                if (userdata()['id'] != $news_pop[$i]['user_id']) {
                    unset($news_pop[$i]);
                    continue;
                }
            } else if ($news_pop[$i]['akses'] == 'other') {
                $groups_access = explode(',', $news_pop[$i]['groups_id']);
                $user_groups = role_user();
                $permission = false;
                for ($j = 0; $j < count($user_groups); $j++) {
                    if (in_array_help($user_groups[$j]['group_id'], $groups_access, true) !== FALSE) {
                        $permission = true;
                    }
                }
                if (!$permission) {
                    unset($news_pop[$i]);
                    continue;
                }
            }

            $news_pop[$i]['tanggal_publish'] = date('d F Y', strtotime($news_pop[$i]['tanggal_publish']));
            $news_pop[$i]['konten'] = substr(strip_tags($news_pop[$i]['konten']), 0, 65) . ' ..';
        }
        $news_pop = array_values($news_pop);

        $hotNews = $init->getHotNews()->getResultArray();
        $count_data = count($hotNews);
        for ($i = 0; $i < $count_data; $i++) {
            $PublishDate = strtotime($hotNews[$i]['tanggal_publish']);
            if ($current_date < $PublishDate) {
                unset($hotNews[$i]);
                continue;
            }

            if ($hotNews[$i]['akses'] == 'private') {
                if (userdata()['id'] != $hotNews[$i]['user_id']) {
                    unset($hotNews[$i]);
                    continue;
                }
            } else if ($hotNews[$i]['akses'] == 'other') {
                $groups_access = explode(',', $hotNews[$i]['groups_id']);
                $user_groups = role_user();
                $permission = false;
                for ($j = 0; $j < count($user_groups); $j++) {
                    if (in_array_help($user_groups[$j]['group_id'], $groups_access, true) !== FALSE) {
                        $permission = true;
                    }
                }
                if (!$permission) {
                    unset($hotNews[$i]);
                    continue;
                }
            }
            $hotNews[$i]['tanggal_publish'] = date('d F Y', strtotime($hotNews[$i]['tanggal_publish']));
            $hotNews[$i]['konten'] = substr(strip_tags($hotNews[$i]['konten']), 0, 65) . ' ..';
        }

        $hotNews = array_values($hotNews);
        $hotNews = array_slice($hotNews, 0, 5);

        record_visits($id);

        $dataUserNews = [];
        $userNews = $init->getNewsByUserId(userdata()['id'])->getResultArray();

        for ($i = 0; $i < count($userNews); $i++) {
            if ($userNews[$i]['akses'] == 'review' && $userNews[$i]['aktif'] == '0') {
                $msg = 'Berita anda dengan judul "' . $userNews[$i]['judul']  . '" sedang menunggu konfirmasi Administrator.';
            } else if ($userNews[$i]['akses'] != 'review' && $userNews[$i]['akses'] != 'private' && $userNews[$i]['aktif'] == '1' && (strtotime(get_date()) >= strtotime($userNews[$i]['tanggal_publish']))) {
                $msg = 'Berita anda dengan judul "' . $userNews[$i]['judul']  . '" telah dikonfirmasi dan telah dipublikasikan.';
            } else if ($userNews[$i]['akses'] != 'review' && $userNews[$i]['akses'] != 'private' && $userNews[$i]['aktif'] == '1' && (strtotime(get_date()) < strtotime($userNews[$i]['tanggal_publish']))) {
                $msg = 'Berita anda dengan judul "' . $userNews[$i]['judul']  . '" telah dikonfirmasi dan belum dipublikasikan.';
            } else if ($userNews[$i]['akses'] != 'review' && $userNews[$i]['akses'] != 'private' && $userNews[$i]['aktif'] == '0') {
                $msg = 'Berita anda dengan judul "' . $userNews[$i]['judul']  . '" telah dikonfirmasi dan menunggu dipublikasikan.';
            } else {
                $msg = 'Berita anda dengan judul "' . $userNews[$i]['judul']  . '" telah diterima dan menunggu review Administrator.';
            }

            $dataUserNews[] = [
                'id' => $userNews[$i]['id'],
                'msg' => $msg,
                'date' => date('d M Y', strtotime($userNews[$i]['tanggal_publish'])),
                'thumbnail' => $userNews[$i]['thumbnail'],
            ];
        }

        $this->data =  [
            'active' => '',
            'title' => 'Management Berita',
            'judulHalaman' => 'Berita',
            'berita' =>  $hotNews,
            'berita_popular' =>  $news_pop,
            'dataset' => $data,
            'is_admin' => false,
            'notifications' => $dataUserNews,
        ];

        $authorize =  Services::authorization();
        if ($authorize->inGroup('Administrator', userdata()['id'])) {
            $this->data['is_admin'] = true;
        }

        return view('admin' . DIRECTORY_SEPARATOR . 'news' . DIRECTORY_SEPARATOR . 'berita', $this->data);
    }

    public function change_access()  #SOLVED
    {
        if (!$this->request->isAJAX()) $this->output_json(false);

        $init = new BeritaModel();

        $id = $this->request->getPost('id');
        $val = strtolower($this->request->getPost('val'));
        $groups = $this->request->getPost('groups');

        if ($val != 'public' && $val != 'private' && $val != 'other' && $val != 'review') {
            $this->output_json(false);
        } else {
            if ($val == 'other') {
                if ($groups && !empty($groups)) {
                    $query = $init->changeAccessNews($id, $val, $groups);
                    $this->output_json($query);
                } else {
                    return $this->output_json(false);
                }
            } else {
                $query = $init->changeAccessNews($id, $val);
                $this->output_json($query);
            }
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

        $color = RandomColor::many(count($datasets), array(
            'hue' => 'purple'
        ));

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

            $c[] = [
                'label' => $datasets[$i]['judul'],
                'data' => $VAL_BERITA,
                'fill' => false,
                'lineTension' => 0.16,
                'borderColor' => $color[$i]
            ];
        }
        $return = [
            'labels' => $labels,
            'datasets' => $c,
        ];
        return $return;
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
                $date = explode(' ', $ip[$i]['date'])[0];
                $data[] = [
                    'date' => date('d M Y', strtotime($date)),
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
			<td>' . date('d M Y H:i', strtotime($ip_visited[$i]['date'])) . '</td>
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

    public function downloadReport($id)
    {
        $init = new BeritaModel();
        $init_admin = new admin_model();

        $Newsdata = $init->getNewsById($id)->getRowArray();
        if (!$Newsdata) return redirect()->to(base_url('/admin/berita'));
        $userData = $init_admin->getUserById($Newsdata['user_id'])->getRowArray();


        $spreadsheet = new Spreadsheet();
        $spreadsheet->getSheet(0);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getStyle('A')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:AT100')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('ffffff');

        $spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(30);

        $sheet = $spreadsheet->getActiveSheet()->setTitle("Data Berita");

        $ip_visited = $init->getIPVisits($id)->getResultArray(); //List of IP
        $count_visits = $init->getVisitedPage($id)->getRowArray();
        $comments = $this->getPostComment($id, $all = true, $html = false); //List of Komen

        $username = 'User Tidak Diketahui';
        $status = 'Aktif';
        if ($userData) $username = $userData['fullname'];
        if ($Newsdata['aktif'] != 1) $status = 'Tidak Aktif';

        $access = ucwords(strtolower($Newsdata['akses']));
        if ($Newsdata['akses'] == 'other') {
            $groups = explode(',', $Newsdata['groups_id']);
            $groupsName = '';
            for ($i = 0; $i < count($groups); $i++) {
                $group = $init_admin->getGroupById($groups[$i])->getRowArray();
                if ($group) {
                    if ($i != count($groups) - 1) {
                        $groupsName .= ucwords(strtolower($group['name'])) . ", ";
                    } else {
                        $groupsName .= ucwords(strtolower($group['name']));
                    }
                }
            }
            $access = 'Lainnya [' . $groupsName . ']';
        };

        $sheet->setCellValue('A1', 'Informasi Berita');
        $sheet->setCellValue('A2', 'Judul Berita');
        $sheet->setCellValue('A3', 'Tanggal Publish');
        $sheet->setCellValue('A4', 'Penanggung Jawab');
        $sheet->setCellValue('A5', 'Penulis');
        $sheet->setCellValue('A6', 'Status Berita');
        $sheet->setCellValue('A7', 'Akses Berita');

        $sheet->setCellValue('B2', ': ' . ucwords(strtolower($Newsdata['judul'])));
        $sheet->setCellValue('B3', ': ' . date("d M Y H:i", strtotime($Newsdata['tanggal_publish'])));
        $sheet->setCellValue('B4', ': ' . $username);
        $sheet->setCellValue('B5', ': ' . ucwords(strtolower($Newsdata['author'])));
        $sheet->setCellValue('B6', ': ' . $status);
        $sheet->setCellValue('B7', ': ' . $access);


        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(1);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

        $spreadsheet->getActiveSheet()->getStyle('1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
        $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A1:E1')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A')->getAlignment()->setVertical('center');
        $spreadsheet->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('C')->getAlignment()->setVertical('center');

        $spreadsheet->getActiveSheet()->getStyle('A1:AT100')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('ffffff');

        $sheet = $spreadsheet->getActiveSheet()->setTitle("Data Pengunjung Berita");

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'IP Pengunjung');
        $sheet->setCellValue('C1', 'Kunjungan Terakhir');
        $sheet->setCellValue('D1', 'Lokasi');
        $sheet->setCellValue('E1', 'Total Kunjungan');

        $no = 1;
        $index = 2;

        foreach ($ip_visited as $ip) {
            if ($ip['ip'] == '::1') {
                $loc = 'Localhost';
            } else if (is_connected()) {
                $loc = json_decode(file_get_contents("http://ipinfo.io/{$ip['ip']}/json"))->city;
            } else {
                $loc = 'Request Time Out (Unknown)';
            }

            $sheet->getStyle('A' . $index . ':E' . $index)->getAlignment()->setVertical('center');
            $sheet->getStyle('E' . $index)->getAlignment()->setHorizontal('center');

            $sheet->setCellValue('A' . $index, $no);
            $sheet->setCellValue('B' . $index, $ip['ip']);
            $sheet->setCellValue('C' . $index, date('d M Y H:i', strtotime($ip['date'])));
            $sheet->setCellValue('D' . $index, $loc);
            $sheet->setCellValue('E' . $index, $ip['hits']);
            $no++;
            $index++;
        }

        $index++;

        $spreadsheet->getActiveSheet()->getStyle($index)->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getRowDimension($index)->setRowHeight(30);
        $spreadsheet->getActiveSheet()->getStyle('A' . $index . ':E' . $index)->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle('A' . $index . ':E' . $index)->getAlignment()->setVertical('center');
        $sheet->setCellValue('A' . $index, 'No');
        $sheet->setCellValue('B' . $index, 'User');
        $sheet->setCellValue('C' . $index, 'Tanggal');
        $sheet->setCellValue('D' . $index, 'Komentar');

        $index++;
        $no = 1;
        foreach ($comments[0] as $comment) {

            $sheet->getStyle('A' . $index . ':D' . $index)->getAlignment()->setVertical('center');

            $sheet->setCellValue('A' . $index, $no);
            $sheet->setCellValue('B' . $index, $comment['name']);
            $sheet->setCellValue('C' . $index, $comment['time']);
            $sheet->setCellValue('D' . $index, $comment['komentar']);
            $no++;
            $index++;
        }

        $spreadsheet->setActiveSheetIndex(0);
        $writer = new xlsx($spreadsheet);

        $filename = 'Laporan Kunjungan Berita ' . ucwords(strtolower($Newsdata['judul'])) . ' - ' . date('d M Y', strtotime(get_date(false)));

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function folder()
    {
        $curr_folder = ROOTPATH . '../berita/';
        mkdir($curr_folder, 0777, true);
    }

    public function sendUploadData()
    {
        if (!$this->request->isAJAX()) $this->output_json(false);

        if ($this->form_validation->run($this->request->getPost(), 'create_user_news') === FALSE) {
            $this->output_json(array_values($this->form_validation->getErrors()));
        } else {
            session()->remove('folder_name');
            if (!session()->has('folder_name')) {
                $name_folder = 'raw_file' . round(microtime(true));
                $curr_folder = ROOTPATH . '../berita/' . $name_folder;
                mkdir($curr_folder, 0777, true);
                session()->set('folder_name', $name_folder);
                // $this->output_json(session()->get('folder_name')); #Outputnya raw_file1622721146
            }

            $init = new BeritaModel();
            $dataset = [
                'date' => $this->request->getPost('date'),
                'header' => $this->request->getPost('header'),
                'content' =>  $this->request->getPost('content'),
                'access' =>  'review',
                'author' =>  $this->request->getPost('author'),
                'thumbnail' => NULL,
                'user_id' => NULL,
                'groups_id' => NULL,
            ];

            $thumbnail = $_FILES['thumbnail'];

            $file_name = "thumbnail_" . $thumbnail['name'];
            $tmp_name =  $thumbnail['tmp_name'];

            $upload_file = move_uploaded_file($tmp_name, ROOTPATH . '../berita/' . session()->get('folder_name')  . '/' .  $file_name);
            if (!$upload_file) return $this->output_json(false);
            $dataset['thumbnail'] = esc($file_name);

            $query = $init->insertUserNews($dataset);
            session()->remove('folder_name');

            $this->output_json($query);
        }
    }

    public function uploadBerita()
    {
        $data['judulHalaman'] = 'Unggah Berita/Artikel';
        // $data['login'] = 'sudah';
        $data['active'] = '';
        return view('websia/kontenWebsia/beritaArtikel/unggahBerita.php', $data);
    }

    /*public function apiberita()
    {
        $data['judulHalaman'] = 'API Berita';
        $data['active'] = 'API Berita';
        $data['login'] = 'sudah';

        $pager = \Config\Services::pager();
        $client = \Config\Services::curlrequest();
        $response = $client->request('POST', 'https://pusdiklat-bps.id/api/berita', [
            'form_params' => [
                'kategori' => '1',
                'token' => '473KpgTwt9MFxmpAYJ7aF2w5'
            ]
        ]);

        $beritaApi = json_decode($response->getBody());
        if ($beritaApi->status == 'sukses') {
            $berita = $beritaApi->data;
            //dd($berita);
            $page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;
            $total = count($berita); //total items in array    
            $limit = 8; //per page    
            $totalPages = ceil($total / $limit); //calculate total pages
            $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
            $page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
            $offset = ($page - 1) * $limit;
            if ($offset < 0) $offset = 0;
            $berita = array_slice($berita, $offset, $limit);

            $data['apiberita'] = $berita;
            $data['tot_page'] = $totalPages;
            $data['page'] = $page;
        };

        return view('websia/kontenWebsia/beritaArtikel/berandaBerita1', $data);
    }
    */
}
