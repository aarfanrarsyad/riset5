<?php

# Helper to standardize Pendidikan Terakhir
function standardPendidikanTerakhir($key)
{
    $arr_standar = [
        'Ak. Ilmu Statistik' => 'Akademi Ilmu Statistik',
        'D III Statistika' => 'D-III Statistika',
        'D III STIS' => 'D-III Statistika',
        'D-III STIS' => 'D-III Statistika',
        'D-III AIS' => 'D-III Statistika',
        'D-IV Statistik Ekonomi' => 'D-IV Statistika Ekonomi',
        'D-IV SE' => 'D-IV Statistika Ekonomi',
        'Statistik Ekonomi' => 'D-IV Statistika Ekonomi',
        'D-IV Statistik Sosial Kependudukan' => 'D-IV Statistika Sosial & Kependudukan',
        'D-IV SK' => 'D-IV Statistika Sosial & Kependudukan',
        'Statistik Sosial Kependudukan' => 'D-IV Statistika Sosial & Kependudukan',
        'Komputasi Statistik' => 'D-IV Komputasi Statistik',
        'S-1 Adm.Negara' => 'S-1 Administrasi Negara',
        'S-1 Ek. Akuntansi' => 'S-1 Ekonomi Akuntansi',
        'S-1 Ekonomi(Perus)' => 'S-1 Ekonomi Perusahaan',
        'S-1 IKIP (Penddkn)' => 'S-1 IKIP Pendidikan',
        'S-2 Businnes adm.' => 'S-2 Business Administration',
        'S-2 Ekonomi (Manajemen)' => 'S-2 Ekonomi Manajemen',
        'S-2 Engin In Computer Science' => 'S-2 Engineering In Computer Science',
        'S-2 Engin In Indus Engineering' => 'S-2 Engineering In Indus Engineering',
        'S-2 Engin. In Manag.Engin' => 'S-2 Engineering In Manag. Engineering',
        'S-2 Engineering in Mech. Engin' => 'S-2 Engineering in Mech. Engineering',
        'S-2 Lainnya' => 'S-2',
        'S-2 Master' => 'S-2',
        'S-2 Public Healt' => 'S-2 Public Health',
        'S-2 Sains' => 'S-2',
        'S-3 Doktor' => 'S-3',
        'S-3 Of Engenering' => 'S-3 Of Engineering',
    ];
    $standard = $arr_standar[$key];

    if (isset($standard) || $standard != NULL) {
        $value = $standard;
    } else {
        $value = $key;
    }

    return $value;
}

# Helper to standardize Prodi Jurusan
function standardProdiJurusan($key)
{
    $arr_standar = [
        'Ak. Ilmu Statistik' => 'Akademi Ilmu Statistik',
        'Ak.I.Keu.Perbankan' => 'Akademi Ilmu Keuangan Perbankan',
        'Akademi (D III)' => 'Akademi D-III',
        'APP (Ekonomi)' => 'APP Ekonomi',
        'APP (Umum)' => 'APP Umum',
        'D-IV Statistik Ekonomi' => 'D-IV Statistika Ekonomi',
        'D-IV SE' => 'D-IV Statistika Ekonomi',
        'Statistik Ekonomi' => 'D-IV Statistika Ekonomi',
        'D-IV Statistik Sosial Kependudukan' => 'D-IV Statistika Sosial & Kependudukan',
        'D-IV SK' => 'D-IV Statistika Sosial & Kependudukan',
        'Statistik Sosial Kependudukan' => 'D-IV Statistika Sosial & Kependudukan',
        'Komputasi Statistik' => 'D-IV Komputasi Statistik',
        'D III Kebidanan' => 'D-III Kebidanan',
        'D III Manajemen Informatika' => 'D-III Manajemen Informatika',
        'D III Statistika' => 'D-III Statistika',
        'D III STIS' => 'D-III Statistika',
        'D-III STIS' => 'D-III Statistika',
        'D-III AIS' => 'D-III Statistika',
        'Diploma I Statistika' => 'D-I Statistika',
        'S-1 Adm.Negara' => 'S-1 Administrasi Negara',
        'S-1 Adm.Niaga' => 'S-1 Administrasi Niaga',
        'S-1 Ek. Akuntansi' => 'S-1 Ekonomi Akuntansi',
        'S-1 Ekonomi(Perus)' => 'S-1 Ekonomi Perusahaan',
        'S-1 IKIP (Penddkn)' => 'S-1 IKIP Pendidikan',
        'S-1 Lainnya' => 'S-1',
        'S-1 Sospol(Adm.Negara' => 'S-1 Sospol Administrasi Negara',
        'S-1 Sospol(Adm.Niaga)' => 'S-1 Sospol Administrasi Niaga',
        'S-2 Businnes adm.' => 'S-2 Business Administration',
        'S-2 Ekonomi (Manajemen)' => 'S-2 Ekonomi Manajemen',
        'S-2 Engin In Computer Science' => 'S-2 Engineering In Computer Science',
        'S-2 Engin In Indus Engineering' => 'S-2 Engineering In Indus Engineering',
        'S-2 Engin. In Manag.Engin' => 'S-2 Engineering In Manag. Engineering',
        'S-2 Engineering in Mech. Engin' => 'S-2 Engineering in Mech. Engineering',
        'S-2 Lainnya' => 'S-2',
        'S-2 Master' => 'S-2',
        'S-2 Public Healt' => 'S-2 Public Health',
        'S-2 Sains' => 'S-2',
        'S-3 Doktor' => 'S-3',
        'S.D.' => 'SD',
        'S.M.A' => 'SMA',
        'S.M.A Pasti' => 'SMA',
        'S.M.A Sosial' => 'SMA IPS',
        'S.M.E.A Tata Buku' => 'SMEA Tata Buku',
        'S.M.E.P' => 'SMEP',
        'S.M.P' => 'SMP',
        'S.T.M' => 'STM',
        'S.T.M Bangunan' => 'STM Bangunan',
        'S.T.M Mesin' => 'STM',
        'S.T.M. Listrik' => 'STM Listrik',
        'SMA A1 (Fisik)' => 'SMA IPA',
        'SMA A2 (Biologi)' => 'SMA IPA',
        'SMA A3 (Sosial)' => 'SMA IPS',
        'SMK Lainnya' => 'SMK',
        'SMU IPA' => 'SMA IPA',
        'SMU IPS' => 'SMA IPS'
    ];
    $standard = $arr_standar[$key];

    if (isset($standard) || $standard != NULL) {
        $value = $standard;
    } else {
        $value = $key;
    }

    return $value;
}

# Helper to standardize No Hp
function standardNoHp($key)
{
    $provider = array('811', '812', '813', '852', '853', '821', '822', '851', '823', '814', '815', '816', '855', '856', '857', '858', '817', '818', '819', '859', '877', '878', '831', '832', '833', '838', '828', '881', '882', '884', '886', '885', '883', '887', '888', '889', '895', '896', '897', '899', '898');
    $ss = 0;
    // remove strip
    $number = str_replace('-', '', $key);
    $number = str_replace(' ', '', $key);
    // standarkan 62
    $country_code = '62';
    if (substr($number, 0, strlen($country_code)) == $country_code) {
        $number = substr($number, strlen($country_code));
        $number = "0" . $number;
    }
    // Loop to check provider
    foreach ($provider as $p) {
        if (substr($number, 1, 3) === $p) {
            $ss = $ss + 1;
        } else {
            $ss = $ss + 0;
        }
    }
    if ($ss == 1) {
        $value = $number;
    } elseif ($ss == 0) {
        $value = "-";
    }
    return $value;
}

# Helper to standardize No Telepon
function standardNoTelepon($key)
{
    $area3 = ['627', '629', '641', '642', '643', '644', '645', '646', '650', '651', '652', '653', '654', '655', '656', '657', '658', '659', '621', '622', '623', '624', '626', '628', '630', '631', '632', '633', '634', '636', '639', '751', '752', '753', '754', '755', '756', '757', '760', '761', '762', '763', '764', '765', '766', '767', '768', '769', '770', '771', '772', '773', '776', '777', '778', '779', '741', '742', '743', '744', '745', '746', '747', '748', '702', '711', '712', '713', '714', '730', '731', '733', '734', '735', '715', '716', '717', '718', '719', '732', '736', '737', '738', '739', '721', '723', '724', '725', '726', '727', '728', '729', '252', '253', '254', '257', '231', '232', '233', '234', '251', '260', '261', '262', '263', '264', '265', '266', '267', '271', '272', '273', '274', '275', '276', '280', '281', '282', '283', '284', '285', '286', '287', '289', '291', '292', '293', '294', '295', '296', '297', '298', '299', '356', '321', '322', '323', '324', '325', '327', '328', '331', '332', '333', '334', '335', '338', '341', '342', '343', '351', '352', '353', '354', '355', '357', '358', '361', '362', '363', '365', '366', '368', '370', '371', '372', '373', '374', '376', '380', '381', '382', '383', '384', '385', '386', '387', '388', '389', '561', '562', '563', '564', '565', '567', '568', '534', '513', '522', '525', '526', '528', '531', '532', '536', '537', '538', '539', '511', '512', '517', '518', '527', '542', '545', '548', '549', '554', '551', '552', '553', '556', '430', '431', '432', '434', '438', '435', '443', '445', '450', '451', '452', '453', '454', '457', '458', '461', '462', '463', '464', '465', '455', '426', '428', '410', '411', '413', '414', '417', '418', '419', '420', '421', '423', '427', '472', '473', '474', '475', '481', '484', '485', '401', '402', '403', '404', '405', '408', '910', '911', '913', '914', '915', '916', '917', '918', '921', '922', '924', '927', '929', '931', '901', '902', '951', '952', '955', '956', '957', '966', '967', '969', '971', '975', '980', '981', '983', '984', '985', '986'];
    $area2 = ['61', '21', '22', '24', '31'];
    $s2 = 0;
    $s3 = 0;
    // remove strip, space, kurung
    $number = str_replace('-', '', $key);
    $number = str_replace(' ', '', $number);
    $number = str_replace('(', '', $number);
    $number = str_replace(')', '', $number);
    foreach ($area3 as $a3) {
        if (substr($number, 1, 3) === $a3) {
            $s3 = $s3 + 1;
        } else {
            $s3 = $s3 + 0;
        }
    }
    if ($s3 == 1) {
        $area = substr($number, 0, 4);
        $number = substr($number, 4);
        $value = $area . "-" . $number;
    } elseif ($s3 == 0) {
        foreach ($area2 as $a2) {
            if (substr($number, 1, 2) === $a2) {
                $s2 = $s2 + 1;
            } else {
                $s2 = $s2 + 0;
            }
        }
        if ($s2 == 1) {
            $area = substr($number, 0, 3);
            $number = substr($number, 3);
            $value = $area . "-" . $number;
        } elseif ($s2 == 0) {
            $value = "-";
        }
    }
    return $value;
}

# Helper to standardize Instansi Pendidikan
function standardInstansiPendidikan($key)
{
    $key = str_replace('(', '', $key);
    $key = str_replace(')', '', $key);
    $ak = 'Ak.';
    $univ = 'Univ.';
    $stia = "STIA-";
    $stia1 = "STIA -";
    if (substr($key, 0, strlen($ak)) == $ak) {
        $key = substr($key, strlen($ak));
        $key = "Akademi" . $key;
    } else if (substr($key, 0, strlen($univ)) == $univ) {
        $key = substr($key, strlen($univ));
        $key = "Universitas" . $key;
    } else if (substr($key, 0, strlen($stia)) == $stia) {
        $key = substr($key, strlen($stia));
        $key = "STIA " . $key;
    } else if (substr($key, 0, strlen($stia1)) == $stia1) {
        $key = substr($key, strlen($stia1));
        $key = "STIA" . $key;
    }
    return $key;
}

# Helper to standardize Kabupaten Provinsi
function kabprovinsi($key)
{
    $db = \Config\Database::connect();
    if (!is_null($key)) {
        if ($key == "Pusat") {
            return array("nama_kabkota" => "Kota Jakarta Pusat", "nama_provinsi" => "Dki Jakarta", "id_kabkota" => "3173", "id_provinsi" => "31");
        }
        $ka = "Kabupaten";
        $kab = $ka . " " . $key;
        $query = "SELECT A.*, B.nama_provinsi FROM kabkota AS A JOIN provinsi AS B ON A.id_provinsi=B.id_provinsi WHERE A.nama_kabkota LIKE '%$kab'";
        $kabupaten = $db->query($query)->getRow();
        $ko = "Kota";
        $kot = $ko . " " . $key;
        $query = "SELECT A.*, B.nama_provinsi FROM kabkota AS A JOIN provinsi AS B ON A.id_provinsi=B.id_provinsi WHERE A.nama_kabkota LIKE '%$kot'";
        $kota = $db->query($query)->getRow()->nama_kabkota;
        $query = "SELECT * FROM provinsi WHERE nama_provinsi LIKE '%$key'";
        $provinsi = $db->query($query)->getRow();
        // Semua null
        if (is_null($kabupaten) && is_null($kota) && is_null($provinsi)) {
            return array("nama_kabkota" => $key, "nama_provinsi" => "-", "id_kabkota" => "-", "id_provinsi" => "-");
        }
        // Kabupaten
        if (!is_null($kabupaten) && is_null($kota) && is_null($provinsi)) {
            return array("nama_kabkota" => $kabupaten->nama_kabkota, "nama_provinsi" => $kabupaten->nama_provinsi, "id_kabkota" => $kabupaten->id_kabkota, "id_provinsi" => $kabupaten->id_provinsi);
        }
        // Kota
        if (is_null($kabupaten) && !is_null($kota) && is_null($provinsi)) {
            return array("nama_kabkota" => $kota->nama_kabkota, "nama_provinsi" => $kota->nama_provinsi, "id_kabkota" => $kota->id_kabkota, "id_provinsi" => $kota->id_provinsi);
        }
        //Provinsi
        if (is_null($kabupaten) && is_null($kota) && !is_null($provinsi)) {
            return array("nama_kabkota" => "-", "nama_provinsi" => $provinsi->nama_provinsi, "id_kabkota" => "-", "id_provinsi" => $provinsi->id_provinsi);
        }
        // Nama Kabupaten & Provinsi sama
        if (!is_null($kabupaten) && is_null($kota) && !is_null($provinsi)) {
            return array("nama_kabkota" => "-", "nama_provinsi" => $provinsi->nama_provinsi, "id_kabkota" => "-", "id_provinsi" => $provinsi->id_provinsi);
        }
        //Nama Kota & Provinsi sama
        if (is_null($kabupaten) && !is_null($kota) && !is_null($provinsi)) {
            return array("nama_kabkota" => "-", "nama_provinsi" => $provinsi->nama_provinsi, "id_kabkota" => "-", "id_provinsi" => $provinsi->id_provinsi);
        }
        // Nama Kabupaten & Kota sama 
        if (!is_null($kabupaten) && !is_null($kota) && is_null($provinsi)) {
            return array("nama_kabkota" => "-", "nama_provinsi" => $kabupaten->nama_provinsi, "id_kabkota" => "-", "id_provinsi" => $kabupaten->id_provinsi);
        }
        // Nama Kabupaten, Kota, & Provinsi Sama
        if (!is_null($kabupaten) && !is_null($kota) && !is_null($provinsi)) {
            return array("nama_kabkota" => "-", "nama_provinsi" => $provinsi->nama_provinsi, "id_kabkota" => "-", "id_provinsi" => $provinsi->id_provinsi);
        }
    } else {
        return array("nama_kabkota" => "-", "nama_provinsi" => "-", "id_kabkota" => "-", "id_provinsi" => "-");
    }
}

# Penambahan prefix BPS
function standardBPS($key)
{
    $bps = "BPS";
    $value = $bps . " " . $key;

    return $value;
}

# Helper to standardize Tempat Lahir

function standardTempatLahir($key)
{
    $arr_standar = [
        'pekan baru' => 'Pekanbaru',
        'fak-fak' => 'Fakfak',
        'fak fak"' => 'Fakfak',
        'klanten' => 'Klaten',
        '16085' => '-',
        'temaggung' => 'Temanggung',
        'pare-pare' => 'Parepare',
        'lalantuka' => 'Larantuka',
        'sangliat' => 'Sungailiat',
        'tanjungkarang' => 'Tanjung karang',
        'sungai liat' => 'Sungailiat',
        'kota pematang siantar' => 'Kota Pematangsiantar',
        'komba-komba' => 'Komba-Komba',
        'toraja' => 'Tana Toraja',
        'hulu sei tengah' => 'Hulu Sungai Tengah',
        'simarsoituruk' => 'Simarsoit Uruk',
        'palangkaraya' => 'Palangka Raya',
        'tapak tuan kab. aceh sela' => 'Tapaktuan',
        'pongkah' => 'Pangkah',
        'tulung agung' => 'Tulungagung',
        'purwajaya/lima puluh koto' => 'Lima Puluh Kota',
        'sungaliat' => 'Sungailiat',
        'bukittinngi' => 'Bukittinggi',
        'bukit tinggi' => 'Bukittinggi',
        'bulelelng' => 'Buleleng',
        'majelengka' => 'Majalengka',
        'toli-toli' => 'Toli-Toli',
        'tojo una-una' => 'Tojo Una-Una'
    ];
    $standard = $arr_standar[strtolower($key)];

    if (isset($standard) || $standard != NULL) {
        return $standard;
    } else {
        $tempat = ucwords(strtolower($key));
        if (strpos($tempat, '/') !== false) {
            $tempat = substr($tempat, 0, strrpos($tempat, '/'));
        }
        if (strpos($tempat, '(') !== false) {
            $tempat = substr($tempat, 0, strrpos($tempat, '('));
        }
        $value = $tempat;
    }

    return $value;
}

function csv_to_array($filename='', $delimiter=',')
{
if(!file_exists($filename) || !is_readable($filename))
return FALSE;

$header = NULL;
$data = array();
if (($handle = fopen($filename, 'r')) !== FALSE)
{
while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
{
if(!$header)
$header = $row;
else
$data[] = array_combine($header, $row);
}
fclose($handle);
}
return $data;
}