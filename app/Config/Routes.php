<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/register', 'Home::register');
// $routes->get('/register/success', 'Home::registerSuccess');
// $routes->get('/reset/lama', 'Home::reset');
// $routes->get('/reset/baru', 'Home::resetPass');

$routes->group('admin', ['namespace' => 'App\Controllers'], function ($routes) {

	# This is for homepage, landing page, etc

	// $routes->get('/', 'Admin::index', ['filter' => 'login']);


	# This is for report dashboard
	/*
		1. http://localhost:8080/admin/report-1 		=> URL ini menuju halaman index untuk report ke 1.			[5]
	*/
	$routes->get('report-1', 'Admin::report_1_index', ['filter' => 'permission:2']);


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# This is for users management
	/*
		1. http://localhost:8080/admin/users 					=> URL ini menuju halaman index untuk resource Users.			[5]
		2. http://localhost:8080/admin/users/update/($1) 		=> URL ini menuju halaman update data user untuk user id = $1.	[0]
		3. http://localhost:8080/admin/users/delete 			=> URL ini untuk request AJAX pada proses hapus data user.		[5]
		4. http://localhost:8080/admin/users/active-status 	=> URL ini untuk request AJAX pada proses aktif/nonaktif user.		[5]
		5. http://localhost:8080/admin/users/register 		=> URL ini untuk halaman registrasi user.							[5]
	*/

	$routes->get('users', 'Admin::users_index', ['filter' => 'permission:2']);
	$routes->match(['get', 'post'], 'users/update/(:num)', 'Admin::update_user/$1', ['filter' => 'permission:3']);
	$routes->post('users/delete', 'Admin::delete_user', ['filter' => 'permission:4']);
	$routes->post('users/active-status', 'Admin::active_status_user', ['filter' => 'permission:3']);

	// For register user
	$routes->get('users/register', 'Admin::register', ['filter' => 'permission:2']);
	$routes->post('users/register', 'Admin::attemptRegister', ['filter' => 'permission:2']);


	#------------------------------------------------------------------------------------------------------------------------------------------------#

	# This is for users groups management
	/*
		1. http://localhost:8080/admin/users-groups 					=>  URL ini menuju halaman index pada management user groups.			[5]
		2. http://localhost:8080/admin/users-groups/insert 			=>  URL ini untuk request AJAX pada proses insert group untuk user.			[5]
	*/

	$routes->get('users-groups', 'Admin::users_groups_index', ['filter' => 'permission:2']);
	$routes->post('users-groups/insert', 'Admin::insert_users_groups', ['filter' => 'permission:1']);


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# This is for groups management
	/*
		1. http://localhost:8080/admin/groups 					=>  URL ini menuju halaman index pada management groups.						[5]
		2. http://localhost:8080/admin/groups/insert 				=>  URL ini menuju method `insert_group` untuk menyimpan group baru.		[5]
		2. http://localhost:8080/admin/groups/update 				=>  URL ini menuju method `update_group` untuk mengupdate group baru.		[5]
		2. http://localhost:8080/admin/groups/delete 				=>  URL ini untuk request AJAX pada proses delete group.					[5]
	*/

	$routes->get('groups', 'Admin::groups_index', ['filter' => 'permission:2']);
	$routes->match(['get', 'post'], 'groups/insert', 'Admin::insert_group', ['filter' => 'permission:1']);
	$routes->match(['get', 'post'], 'groups/update', 'Admin::update_group', ['filter' => 'permission:3']);
	$routes->post('groups/delete', 'Admin::delete_group', ['filter' => 'permission:4']);


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# This is for menus management
	/*
		1. http://localhost:8080/admin/menu/insert 				=>  URL ini menuju method `insert_menu` untuk menyimpan menu baru.			[5]
		2. http://localhost:8080/admin/menu/update 				=>  URL ini menuju method `insert_menu` untuk mengupdate menu baru.			[5]
		2. http://localhost:8080/admin/menu/delete 				=>  URL ini untuk request AJAX pada proses delete menu.						[5]
	*/
	$routes->post('menu/insert', 'Admin::insert_menu', ['filter' => 'permission:1']);
	$routes->post('menu/update', 'Admin::update_menu', ['filter' => 'permission:3']);
	$routes->post('menu/delete', 'Admin::delete_menu', ['filter' => 'permission:4']);


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# This is for menus management
	/*
		1. http://localhost:8080/admin/resources 					=>  URL ini menuju halaman index pada resources.							[5]
		2. http://localhost:8080/admin/resources/insert 			=>  URL ini menuju halaman untuk insert resource baru 					[5]
		2. http://localhost:8080/admin/resources/update/($1) 		=>  URL ini menuju halaman untuk update resource untuk resource id = $1.	[5]
		2. http://localhost:8080/admin/resources/delete_resource 	=>  URL ini untuk request AJAX pada proses delete resource.					[5]
	*/

	$routes->get('resources', 'Admin::resources_index', ['filter' => 'permission:2']);
	$routes->match(['get', 'post'], 'resources/insert', 'Admin::insert_resource', ['filter' => 'permission:1']);
	$routes->match(['get', 'post'], 'resources/update/(:num)', 'Admin::update_resource/$1', ['filter' => 'permission:3']);
	$routes->post('resources/delete', 'Admin::delete_resource', ['filter' => 'permission:4']);


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# This is for access management
	/*
		1. http://localhost:8080/admin/access 					=>  URL ini menuju halaman index pada akses resource.					[5]
		2. http://localhost:8080/admin/access/insert 			=>  URL ini untuk request AJAX pada penambahan akses untuk resource.[5]
	*/

	$routes->get('access', 'Admin::access_index', ['filter' => 'permission:2']);
	$routes->post('access/insert', 'Admin::insert_access', ['filter' => 'permission:2']);


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# This is for permissions management
	/*
		1. http://localhost:8080/admin/permissions 				=>  URL ini menuju halaman index pada management permissions.						[5]
		2. http://localhost:8080/admin/permissions/($1) 		=>  URL ini menuju halaman managment akses untuk grup dengan id group = $1.  	[5]
		2. http://localhost:8080/admin/permissions/insert 		=>  URL ini untuk request AJAX pada penambahan akses group dengan id group = $1.  	[5]
	*/
	$routes->get('permissions', 'Admin::permissions_index', ['filter' => 'permission:2']);
	$routes->match(['get', 'post'], 'permissions/(:num)', 'Admin::permission/$1', ['filter' => 'permission:3,4']);
	$routes->post('permissions/insert', 'Admin::insert_permission', ['filter' => 'permission:1']);


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# This is for security management
	/*
		1. http://localhost:8080/admin/login-attempts 					=>  URL ini menuju halaman index pada login attempts.	[5]
		2. http://localhost:8080/admin/reset-attempts 					=>  URL ini menuju halaman index pada login attempts.  	[5]
		2. http://localhost:8080/admin/activation-attempts 				=>  URL ini menuju halaman index pada login attempts.  	[5]
	*/
	$routes->get('login-attempts', 'Admin::login_attempts_index', ['filter' => 'permission:2']);
	$routes->get('reset-attempts', 'Admin::token_reset_index', ['filter' => 'permission:2']);
	$routes->get('activation-attempts', 'Admin::token_activation_index', ['filter' => 'permission:2']);


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# This is for token management
	/*
		1. http://localhost:8080/admin/activation-tokens 			=>  URL ini menuju halaman index pada token aktivasi.				[5]
		1. http://localhost:8080/admin/reset-tokens 				=>  URL ini menuju halaman index pada token forgot password log.	[5]
	*/
	$routes->get('activation-tokens', 'Admin::activation_tokens_index', ['filter' => 'permission:2']);
	$routes->get('reset-tokens', 'Admin::reset_tokens_index', ['filter' => 'permission:2']);


	#------------------------------------------------------------------------------------------------------------------------------------------------#


	# This is for activity management
	/*
		1. http://localhost:8080/admin/activity-log 				=>  URL ini menuju halaman index pada activity log.	[5]
	*/
	$routes->get('activity-log', 'Admin::activity_log_index', ['filter' => 'permission:2']);


	#------------------------------------------------------------------------------------------------------------------------------------------------#
});
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
