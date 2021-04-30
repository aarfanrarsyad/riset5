<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
		\Myth\Auth\Authentication\Passwords\ValidationRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $insertResource = [
		'menu' => 'required',
		'title' => 'required',
		'url' => 'required',
		'icon' => 'required',
		'active' => 'required',
	];

	public $insertResource_errors  = [
		'menu' => [
			'required'      => 'Menu is required',
		],
		'title' => [
			'required'      => 'Title is required',
		],
		'url' => [
			'required'      => 'URL must be filled',
		],
		'icon' => [
			'required'      => 'Icon must be filled',
		],
		'active' => [
			'required'      => 'Resources active status must be filled',
		]
	];

	public $insertMenu = [
		'menu' => 'required',
		'icon' => 'required',
	];

	public $updateMenu = [
		'id' => 'required|numeric',
		'menu' => 'required',
		'icon' => 'required',
	];

	public $insertMenu_errors  = [
		'id' => [
			'required'      => 'Menu id is required',
			'numeric'      => 'Menu id can only be filled with numeric',
		],
		'menu' => [
			'required'      => 'Menu name is required',
		],
		'icon' => [
			'required'      => 'Icon must be filled',
		]
	];

	public $create_news = [
		'date'     => 'required',
		'header'   => 'required',
		'access' => 'required|in_list[public,private,other]',
		'author' => 'required',
		// 'thumbnail' => 'uploaded[thumbnail]|max_size[thumbnail,1024]|mime_in[thumbnail,image/png,image/jpg]|ext_in[thumbnail,png,jpg]'
	];

	public $update_news = [
		'date'     => 'required',
		'header'   => 'required',
		'access' => 'required|in_list[public,private,other]',
		'author' => 'required',
	];


	public $editProfil = [
		'telp_alumni'   => [
			'rules' => 'required|numeric|min_length[9]',
		],
		'email'			=> [
			'rules' => 'valid_email|is_unique[alumni.email,id_alumni,{id_alumni}]',
		],
	];

	public $editProfil_errors  = [
		'telp_alumni'   => [
			'required'	=> 'kolom nomor harus diisi',
			'numeric'	=> 'kolom harus berisi angka',
			'min_length' => 'minimal memiliki panjang 9 angka',
		],
		'email'			=> [
			'rules' => 'valid_email|is_unique[alumni.email,id_alumni,{id_alumni}]',
			'required'	=> 'kolom email harus diisi',
			'valid_email'	=> 'harus memiliki format email',
			'is_unique'	=> 'alamat email telah digunakan alumni lain',
		]
	];

	public $editPendidikan = [
		'nim'   => [
			'rules' => 'numeric',
		],
	];

	public $editPendidikan_errors  = [
		'nim'   => [
			'numeric'	=> 'kolom nim harus berisi angka',
		]
	];

	public $editAkun = [
		'new_password'   => [
			'rules' => 'required|regex_match[/^[a-z0-9]+$/]|min_length[8]',
		],
		'conf_password'   => [
			'rules' => 'required|matches[new_password]',
		],
	];

	public $editAkun_errors  = [
		'new_password'   => [
			'required' => 'kolom ini harus diisi',
			'regex_match' => 'Kata sandi harus terdiri dari huruf dan angka',
			'min_length' => 'minimal memiliki panjang 8 karakter',
		],
		'conf_password'   => [
			'required' => 'kolom ini harus diisi',
			'matches' => 'Konfirmasi kata sandi tidak cocok',
		],
	];

	public $editTempatKerja = [
		'nama_instansi'   => [
			'rules' => 'required',
		],
		'email_instansi'   => [
			'rules' => 'required',
		]
	];

	public $editTempatKerja_errors  = [
		'nama_instansi'   => [
			'required'	=> 'kolom ini harus diisi',
		],
		'email_instansi'   => [
			'required'	=> 'kolom ini harus diisi',
		],
	];
}
