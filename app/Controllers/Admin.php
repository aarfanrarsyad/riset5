<?php

namespace App\Controllers;

use Config\Services;
use App\Models\admin_model;
use Config\Email;
use Myth\Auth\Entities\User;


class Admin extends BaseController
{

	protected $auth;
	/**
	 * @var Auth
	 */
	protected $config;

	/**
	 * @var \CodeIgniter\Session\Session
	 */
	protected $session;

	public $data = [];

	public function __construct()
	{
		$this->form_validation = \Config\Services::validation();
		$this->session = service('session');

		$this->config = config('Auth');
		$this->auth = service('authentication');
	}

	public function output_json($data = null)
	{
		echo (json_encode($data));
	}

	public function index()
	{
		return view('admin' . DIRECTORY_SEPARATOR . 'index', $this->data);
	}


	#------------------------------------------------------------------------------------------------------------------------------------------------#

	# Method untuk report 
	public function report_1_index()
	{
		return view('admin' . DIRECTORY_SEPARATOR . 'reports' . DIRECTORY_SEPARATOR . 'report_1', $this->data);
	}

	# Method untuk index users
	public function users_index()
	{
		$init = new admin_model();
		$query = $init->getAllUsers()->getResultArray();

		$this->data =  ['data' => $query];
		return view('admin' . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . 'index', $this->data);
	}

	# Method untuk update users 
	public function update_user($id)
	{
		return view('admin' . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . 'update', $this->data);
	}

	# Method untuk delete users 
	public function delete_user()
	{
		if (!$this->request->isAJAX()) return false;

		$id = $this->request->getPost('id');
		if (!$id) return false;

		$init = new admin_model();
		$query = $init->deleteUserByid($id);
		$this->output_json($query);
	}

	# Method untuk menon/aktifkan user 
	public function active_status_user()
	{
		if (!$this->request->isAJAX()) return false;

		$id = $this->request->getPost('id');
		$active = $this->request->getPost('active');

		if (!$id) return false;

		$init = new admin_model();
		$query = $init->change_active_status([$id, $active]);
		$this->output_json($query);
	}

	# Method untuk halaman registrasi
	public function register()
	{

		// Check if registration is allowed
		if (!$this->config->allowRegistration) return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));

		$genr_pass = generate_strong_password(9, false, 'lud');
		return view($this->config->views['register'], ['config' => $this->config, 'genr_pass' => $genr_pass]);
	}

	# Method untuk checking proses regist
	public function attemptRegister()
	{
		// Check if registration is allowed
		if (!$this->config->allowRegistration) return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));

		$users = model('UserModel');

		// Validate here first, since some things,
		// like the password, can only be validated properly here.
		$rules = [
			'fullname'      => 'required',
			// 'nim'           => 'exact_length[9]|is_unique[users.nim]',
			'email'			=> 'required|valid_email|is_unique[users.email]',
			'password'	 	=> 'required|strong_password',
			'pass_confirm' 	=> 'required|matches[password]',
			// 'username'  	=> 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
		];
		if (!$this->validate($rules)) return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());

		// Save the user
		$allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
		$user = new User($this->request->getPost($allowedPostFields));

		$this->config->requireActivation !== false ? $user->generateActivateHash() : $user->activate();

		// Ensure default group gets assigned if set
		if (!empty($this->config->defaultUserGroup)) $users = $users->withGroup($this->config->defaultUserGroup);


		if (!$users->save($user)) return redirect()->back()->withInput()->with('errors', $users->errors());

		$desc = 'Menambahkan user ' . $this->request->getPost('fullname');
		activity_log(1, 1, ucfirst($desc), 1);

		if ($this->config->requireActivation !== false) {
			$activator = service('activator');

			$sent = $activator->send($user);

			if (!$sent) return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));

			// Success!
			return redirect()->route('admin/users')->with('message', lang('Auth.activationSuccess'));
		}

		// Success!
		return redirect()->route('admin/users')->with('message', lang('Auth.registerSuccess'));
	}

	#------------------------------------------------------------------------------------------------------------------------------------------------#

	# Method untuk index aktivasi token
	public function activation_tokens_index()
	{
		$init = new admin_model();
		$tokens = $init->getActivationTokens()->getResultArray();

		$this->data = ['data' => $tokens];
		return view('admin' . DIRECTORY_SEPARATOR . 'tokens' . DIRECTORY_SEPARATOR . 'activation_tokens', $this->data);
	}

	# Method untuk index reset token
	public function reset_tokens_index()
	{
		$init = new admin_model();
		$tokens = $init->getResetTokens()->getResultArray();

		$this->data = ['data' => $tokens];
		return view('admin' . DIRECTORY_SEPARATOR . 'tokens' . DIRECTORY_SEPARATOR . 'resset_tokens', $this->data);
	}


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# Method untuk index managament users groups
	public function users_groups_index()
	{
		$authorize = Services::authorization();

		$init = new admin_model();
		$users = $init->getAllUsers()->getResultArray();
		for ($i = 0; $i < count($users); $i++) {
			$groups = $init->getUserGroupsByUserId($users[$i]['id'])->getResultArray();
			$users[$i]['groups'] = $groups;
		}

		$groups = $authorize->groups();
		$this->data =  [
			'users' => $users,
			'groups' => $groups
		];

		return view('admin' . DIRECTORY_SEPARATOR . 'users' . DIRECTORY_SEPARATOR . 'users_groups', $this->data);
	}

	# Method untuk insert users groups
	public function insert_users_groups()
	{
		if (!$this->request->isAJAX()) return false;

		$init = new admin_model();

		$user_id    = $this->request->getPost('user_id');
		$group_id   = $this->request->getPost('group_id');

		$query = $init->insert_user_group([$user_id, $group_id]);
		$this->output_json($query);
	}


	#------------------------------------------------------------------------------------------------------------------------------------------------#

	# Method untuk index groups [Checked]
	public function groups_index()
	{
		$authorize = Services::authorization();
		$groups = $authorize->groups();
		$this->data = ['data' => $groups];
		return view('admin' . DIRECTORY_SEPARATOR . 'groups' . DIRECTORY_SEPARATOR . 'index', $this->data);
	}

	# Method untuk insert groups [Checked]
	public function insert_group()
	{
		$name = trim($this->request->getPost('name'));
		$description = trim($this->request->getPost('description'));
		if (!($name) || empty($name)) return redirect()->to(base_url('/admin/groups'));

		$init = new admin_model();
		$query = $init->createGroup([$name, $description]);

		if ($query) {
			session()->setFlashdata('status', "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Group added successfully',showConfirmButton: false,timer: 2500})</script>");
		} else {
			session()->setFlashdata('status', "<script>Swal.fire({icon: 'info',title: 'Oops',text: 'Something went wrong',showConfirmButton: false,timer: 2500})</script>");
		}
		return redirect()->to(base_url('/admin/groups'));
	}

	# Method untuk update groups [Checked]
	public function update_group()
	{
		$id = $this->request->getPost('id');
		$name = $this->request->getPost('name');
		$description = $this->request->getPost('description');

		if (!($id)) return redirect()->to(base_url('/admin/groups'));

		$init = new admin_model();
		$query = $init->updateGroup([$id, $name, $description]);
		if ($query) {
			session()->setFlashdata('status', "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Group updated successfully',showConfirmButton: false,timer: 2500})</script>");
		} else {
			session()->setFlashdata('status', "<script>Swal.fire({icon: 'info',title: 'Oops',text: 'Something went wrong',showConfirmButton: false,timer: 2500})</script>");
		}
		return redirect()->to(base_url('/admin/groups'));
	}

	# Method untuk delete groups [checked]
	public function delete_group()
	{
		if (!$this->request->isAJAX()) return false;

		$id = $this->request->getPost('id');
		if (!($id)) return false;

		$init = new admin_model();
		$query = $init->deleteGroup($id);

		$this->output_json($query);
	}

	#------------------------------------------------------------------------------------------------------------------------------------------------#

	# Method untuk insert menu [checked]
	public function insert_menu()
	{
		if (!isset($_POST['insert_menu'])) redirect()->to(base_url('/admin/resources'));

		$menu = $this->request->getPost('menu');
		$icon = $this->request->getPost('icon');

		$data = [
			'menu'  => $menu,
			'icon'  => $icon,
		];

		if ($this->form_validation->run($data, 'insertMenu') === FALSE) {
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('status', show_errors($this->form_validation->getErrors()));
			return redirect()->to(base_url('/admin/resources'));
		} else {
			$init = new admin_model();
			$query = $init->insertMenu($data);
			if ($query) {
				session()->setFlashdata('status', "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Menu added successfully',showConfirmButton: false,timer: 2500})</script>");
			} else {
				session()->setFlashdata('status', "<script>Swal.fire({icon: 'info',title: 'Oops',text: 'Something went wrong',showConfirmButton: false,timer: 2500})</script>");
			}
			return redirect()->to(base_url('/admin/resources'));
		}
	}

	# Method untuk delete menu
	public function delete_menu()
	{
		if (!$this->request->isAJAX()) return false;

		$id   = $this->request->getPost('id');
		$init = new admin_model();
		$query = $init->deleteMenuByid($id);

		$this->output_json($query);
	}

	# Method untuk update menu
	public function update_menu()
	{
		if (isset($_POST['update_menu'])) {

			$id   = $this->request->getPost('id');
			$menu   = $this->request->getPost('menu');
			$icon   = $this->request->getPost('icon');

			$data = [
				'id'  => $id,
				'menu'  => $menu,
				'icon'  => $icon,
			];

			if ($this->form_validation->run($data, 'updateMenu') === FALSE) {
				session()->setFlashdata('inputs', $this->request->getPost());
				session()->setFlashdata('errors', $this->form_validation->getErrors());
				return redirect()->to(base_url('/admin/resources'));
			} else {
				$init = new admin_model();
				$query = $init->updateMenu($data);
				if ($query === true) {
					session()->setFlashdata('status', "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Menu updated successfully',showConfirmButton: false,timer: 1500})</script>");
					return redirect()->to(base_url('/admin/resources'));
				} else {
					session()->setFlashdata('status', "<script>Swal.fire({icon: 'info',title: 'Oops',text: 'Something went wrong',showConfirmButton: false,timer: 1500})</script>");
					return redirect()->to(base_url('/admin/resources'));
				}
			}
		} else {
			redirect()->to(base_url('/admin/resources'));
		}
	}

	#------------------------------------------------------------------------------------------------------------------------------------------------#

	# Method untuk resources index
	public function resources_index()
	{
		$init = new admin_model();
		$resources = $init->getAllResources()->getResultArray();

		$menus = $init->getAllMenu()->getResultArray();
		$this->data = ['menus' => $menus, 'resources' => $resources];
		return view('admin' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'index', $this->data);
	}

	# Method untuk insert resource
	public function insert_resource()
	{
		if (isset($_POST['insert_resources'])) {
			$menu   = $this->request->getPost('menu');
			$title   = $this->request->getPost('title');
			$url      = $this->request->getPost('url');
			$icon   = $this->request->getPost('icon');
			$active   = $this->request->getPost('active');

			$data = [
				'menu'  => $menu,
				'title'  => $title,
				'title'  => $title,
				'url'     => $url,
				'icon'  => $icon,
				'active' => $active
			];

			if ($this->form_validation->run($data, 'insertResource') === FALSE) {
				session()->setFlashdata('inputs', $this->request->getPost());
				session()->setFlashdata('errors', $this->form_validation->getErrors());
				return redirect()->to(base_url('/admin/resources/insert'));
			} else {
				$init = new admin_model();
				$query = $init->insertNewResource($data);
				if ($query === true) {
					session()->setFlashdata('status', "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Menu added successfully',showConfirmButton: false,timer: 1500})</script>");
					return redirect()->to(base_url('/admin/resources'));
				} else {
					session()->setFlashdata('status', "<script>Swal.fire({icon: 'info',title: 'Oops',text: 'Something went wrong',showConfirmButton: false,timer: 1500})</script>");
					return redirect()->to(base_url('/admin/resources'));
				}
			}
		}

		$init = new admin_model();
		$query = $init->getAllMenu()->getResultArray();

		$this->data = ['data' => $query];
		return view('admin' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'insert', $this->data);
	}

	# Method untuk update resource
	public function update_resource($id)
	{
		if (isset($_POST['update_resources'])) {
			$menu   = $this->request->getPost('menu');
			$title   = $this->request->getPost('title');
			$url      = $this->request->getPost('url');
			$icon   = $this->request->getPost('icon');
			$active   = $this->request->getPost('active');

			$data = [
				'menu'  => $menu,
				'title'  => $title,
				'url'     => $url,
				'icon'  => $icon,
				'active' => $active
			];

			if ($this->form_validation->run($data, 'insertResource') === FALSE) {
				session()->setFlashdata('inputs', $this->request->getPost());
				session()->setFlashdata('errors', $this->form_validation->getErrors());
				return redirect()->to(base_url('/admin/resources/update/' . $id));
			} else {
				$data['id'] = $id;
				$init = new admin_model();
				$query = $init->UpdateResource($data);

				if ($query === true) {
					session()->setFlashdata('status', "<script>Swal.fire({icon: 'success',title: 'Success',text: 'Menu updated successfully',showConfirmButton: false,timer: 1500})</script>");
					return redirect()->to(base_url('/admin/resources'));
				} else {
					session()->setFlashdata('status', "<script>Swal.fire({icon: 'info',title: 'Oops',text: 'Something went wrong',showConfirmButton: false,timer: 1500})</script>");
					return redirect()->to(base_url('/admin/resources'));
				}
			}
		}

		$init = new admin_model();
		$query = $init->getResourceById($id)->getRowArray();
		$query_menu = $init->getAllMenu()->getResultArray();

		$this->data =  ['data' => $query, 'menus' => $query_menu];
		return view('admin' . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . 'update', $this->data);
	}

	# Method untuk delete resource
	public function delete_resource()
	{
		if ($this->request->isAJAX()) {
			$id   = $this->request->getPost('id');
			$init = new admin_model();
			$query = $init->deleteResourceByid($id);

			$this->output_json($query);
		}
	}


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# Method untuk access index
	public function access_index()
	{
		$init = new admin_model();
		$crud = $init->getAllCRUD()->getResultArray();
		$resources = $init->getAllResources()->getResultArray();

		for ($i = 0; $i < count($resources); $i++) {
			$id = $resources[$i]['submenu_id'];
			$resources[$i]['resource_access'] = $init->getAccessResources($id)->getResultArray();
		}

		$this->data =  [
			'crud' => $crud,
			'resources' => $resources
		];

		return view('admin' . DIRECTORY_SEPARATOR . 'access' . DIRECTORY_SEPARATOR . 'index', $this->data);
	}

	# Method untuk insert access
	public function insert_access()
	{
		$init = new admin_model();

		$resource = $this->request->getPost('resource');
		$access = $this->request->getPost('access');

		$resource_query = $init->insert_access([$resource, $access]);

		$this->output_json($resource_query);
	}


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# Method untuk permission index
	public function permissions_index()
	{
		$authorize = Services::authorization();
		$groups = $authorize->groups();

		$this->data = ['groups' => $groups];

		return view('admin' . DIRECTORY_SEPARATOR . 'permissions' . DIRECTORY_SEPARATOR . 'index', $this->data);
	}

	# Method permission untuk group id = $id
	public function permission($id)
	{
		$init = new admin_model();
		$resources = $init->getAllResources()->getResultArray();

		for ($i = 0; $i < count($resources); $i++) {
			$id_resource = $resources[$i]['submenu_id'];
			$resource_access_query = $init->getAccessResources($id_resource)->getResultArray();
			$resources[$i]['resource_access'] = $resource_access_query;
		}

		$crud = $init->getAllCRUD()->getResultArray();

		$authorize = Services::authorization();
		$group = $authorize->group($id);

		$this->data =  [
			'resources' => $resources,
			'group' => $group,
			'crud' => $crud,
			'init' => $init,
			'id' => $id,
		];
		return view('admin' . DIRECTORY_SEPARATOR . 'permissions' . DIRECTORY_SEPARATOR . 'permission', $this->data);
	}

	# Method permission untuk insert_permission
	public function insert_permission()
	{
		if (!$this->request->isAJAX()) return false;

		$init = new admin_model();

		$group    = $this->request->getPost('group');
		$access   = $this->request->getPost('access');

		$resource_query = $init->insert_permission([$group, $access]);
		$this->output_json($resource_query);
	}


	#------------------------------------------------------------------------------------------------------------------------------------------------#

	# Method untuk index attempts login
	public function login_attempts_index()
	{
		$init = new admin_model();
		$logins = $init->login_attempts()->getResultArray();
		$this->data =  [
			'logins' => $logins,
		];

		return view('admin' . DIRECTORY_SEPARATOR . 'security' . DIRECTORY_SEPARATOR . 'login_attempts', $this->data);
	}

	# Method untuk index attempts reset
	public function token_reset_index()
	{
		$init = new admin_model();
		$reset_attempts = $init->get_token_reset()->getResultArray();

		$this->data =  [
			'reset_attempts' => $reset_attempts,
		];

		return view('admin' . DIRECTORY_SEPARATOR . 'security' . DIRECTORY_SEPARATOR . 'resset_attempts', $this->data);
	}

	# Method untuk index activation token
	public function token_activation_index()
	{
		$init = new admin_model();
		$activation_attempts = $init->get_token_activation()->getResultArray();
		$this->data =  [
			'activation_attempts' => $activation_attempts,
		];

		return view('admin' . DIRECTORY_SEPARATOR . 'security' . DIRECTORY_SEPARATOR . 'activation_attempts', $this->data);
	}

	#------------------------------------------------------------------------------------------------------------------------------------------------#

	# Method untuk index activity_log
	public function activity_log_index()
	{
		$init = new admin_model();
		$activities = $init->activity_log()->getResultArray();

		$this->data =  [
			'activities' => $activities,
		];

		return view('admin' . DIRECTORY_SEPARATOR . 'security' . DIRECTORY_SEPARATOR . 'activity_log', $this->data);
	}
}
