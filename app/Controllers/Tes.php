<?php

namespace App\Controllers;

use \App\Models\AlumniEntryModel;
use \App\Controllers\BaseController;

class Tes extends BaseController
{

    protected $request;

    public function index()
    {
        $this->AlumniEntryModel = new AlumniEntryModel();
        // array(
        //     array(
        //     "nama" => "ihza",
        //     "kelas" => "3sd2",
        //     "nim"=>"221810336"),
        //     array(
        //          "nama" => "ihza",
        //          "kelas" => "3sd2",
        //          "nim"=>"221810336"
        //     )
        // )

        helper('standarisasi');
        $data_Alumni_1_58 = csv_to_array('alumni/kepegawaian-pendik-updated.csv', ";");
        $data_pendidikan_1_58 = csv_to_array('alumni/Pendidikan-1-58-updated.csv', ";");

        $data_alumni_d1 = csv_to_array('alumni/d1-rapih.csv', ";");
        $data_alumni_d1_TB = csv_to_array('alumni/d1tb-rapih.csv', ";");

        //$keys = array_keys($data_1_57[0]);
        //dd(ucwords(standardTempatLahir(strtolower($data_1_57[633]['tlahir']))), " ");

        //insert data 1-58
        foreach ($data_Alumni_1_58 as $alumni) {

            //standardisasi data tanggal
            $orgDatePens = $alumni['pens'];
            $stdDatePens = str_replace('/', '-', $orgDatePens);
            $stdDatePens = strtotime($stdDatePens);

            $orgDateLahir = $alumni['tlahir'];
            $stdDateLahir = str_replace('/', '-', $orgDateLahir);
            $stdDateLahir = date("Y-m-d", strtotime($stdDateLahir));
            //end standardisasi tanggal

            //pengecekan status pns dan status di bps
            if ($alumni['statpeg'] == "Pensiun" || strpos($alumni['statpeg'], 'Meninggal') || $alumni['statpeg'] == "Berhenti" || $alumni['statpeg'] == "Diberhentikan" || $alumni['statpeg'] == "MPP" || $alumni['statpeg'] == "Pensiun di" || $alumni['statpeg'] == "CPNS") {
                $aktif_pns = 0;
            } else {
                $aktif_pns = 1;
            }

            if ($aktif_pns == 0) {
                $aktif_bekerja = 0;
            } elseif (strpos($alumni['statpeg'], 'Diberhentikan') || strpos($alumni['statpeg'], 'Dipekerjakan') || strpos($alumni['statpeg'], 'Diperbantukan') || strpos($alumni['statpeg'], 'Melimpah')) {

                $aktif_bekerja = 0;
            } else {
                $aktif_bekerja = 1;
            }
            //end pengecekan

            $kab = standardBPS("Pusat");
            dd($kab);

            //ngambil kota,kabupaten,provinsi
            $dataAlumni = [
                'nama' => $alumni['nama'],
                'jenis_kelamin' => $alumni['jk'],
                'tempat_lahir' => ucwords(standardTempatLahir(strtolower($alumni['tlahir'])), " "),
                'tanggal_lahir' => $stdDateLahir,
                'telp_alumni' => standardNoHp($alumni['hp']),
                'alamat_alumni' => strtolower($alumni['alamat']),
                'kota' => '', //fungsi standardisasi ngga bisa
                'provinsi' => '',
                'negara' => 'Indonesia',
                'status_bekerja' => $aktif_bekerja,
                'perkiraan_pensiun' => $stdDatePens,
                'jabatan_terakhir' => $alumni['jabter'],
                'aktif_pns' => $aktif_pns,
                'deskripsi' => '',
                'email' => $alumni['email'],
                'ig' => '',
                'fb' => '',
                'twitter' => '',
                'linkedin' => '',
                'gscholar' => '',
                'nip' => $alumni['nip'],
                'nip_bps' => $alumni['nipbps'],
                'foto_profil' => '',
                'cttl' => '',
                'calamat' => '',
                'cpendidikan' => '',
                'cprestasi' => '',
            ];

            //insert data ke tabel alumni
            $id_alumni = $this->AlumniEntryModel->addAlumni($dataAlumni);

            //mengambil id alumni (return value fungsi add ALumni ialah id dari data yang baru diinsert)
            $id_alumni = $id_alumni[0]['id_alumni'];

            //insert data pendidikan dan pendidikan tinggi
            foreach ($data_pendidikan_1_58 as $pendidikan) {

                //standardisasi untuk mendapatkan jenjang

                if ($pendidikan['nampen'] == $dataAlumni['nama']) {


                    $dataPendidikan = [
                        "jenjang" => "",
                        "instansi" => "",
                        "tahun_lulus" => "",
                        "tahun_masuk" => "",
                        "angkatan" => "",
                        "id_alumni" => $id_alumni,
                    ];

                    $id_pendidikan = $this->AlumniEntryModel->addPendidikan($dataPendidikan);
                    $id_pendidikan = $id_pendidikan[0]['id_pendidikan'];

                    $dataPendidikanTinggi = [
                        "id_pendidikan" => $id_pendidikan,
                        "program_studi" => "",
                        "nim" => "",
                        "judul_tulisan" => "",
                    ];
                }
            }


            // end insert data 1-57
        }

        // insert data alumni d1
        foreach ($data_alumni_d1 as $alumni) {

            //standardisasi data tanggal
            $orgDatePens = $alumni['pens'];
            $stdDatePens = str_replace('/', '-', $orgDatePens);
            $stdDatePens = strtotime($stdDatePens);

            $orgDateLahir = $alumni['tlahir'];
            $stdDateLahir = str_replace('/', '-', $orgDateLahir);
            $stdDateLahir = date("Y-m-d", strtotime($stdDateLahir));
            //end standardisasi tanggal

            //pengecekan status pns dan status di bps
            if ($alumni['statpeg'] == "Pensiun" || strpos($alumni['statpeg'], 'Meninggal') || $alumni['statpeg'] == "Berhenti" || $alumni['statpeg'] == "Diberhentikan" || $alumni['statpeg'] == "MPP" || $alumni['statpeg'] == "Pensiun di" || $alumni['statpeg'] == "CPNS") {
                $aktif_pns = 0;
            } else {
                $aktif_pns = 1;
            }

            if ($aktif_pns == 0) {
                $aktif_bekerja = 0;
            } elseif (strpos($alumni['statpeg'], 'Diberhentikan') || strpos($alumni['statpeg'], 'Dipekerjakan') || strpos($alumni['statpeg'], 'Diperbantukan') || strpos($alumni['statpeg'], 'Melimpah')) {

                $aktif_bekerja = 0;
            } else {
                $aktif_bekerja = 1;
            }
            //end pengecekan

            //ngambil kota,kabupaten,provinsi
            $dataAlumni = [
                'nama' => $alumni['nama'],
                'jenis_kelamin' => $alumni['jk'],
                'tempat_lahir' => ucwords(standardTempatLahir(strtolower($alumni['tlahir'])), " "),
                'tanggal_lahir' => $stdDateLahir,
                'telp_alumni' => standardNoHp($alumni['hp']),
                'alamat_alumni' => strtolower($alumni['alamat']),
                'kota' => '', //fungsi standardisasi ngga bisa
                'provinsi' => '',
                'negara' => 'Indonesia',
                'status_bekerja' => $aktif_bekerja,
                'perkiraan_pensiun' => $stdDatePens,
                'jabatan_terakhir' => $alumni['jabter'],
                'aktif_pns' => $aktif_pns,
                'deskripsi' => '',
                'email' => $alumni['email'],
                'ig' => '',
                'fb' => '',
                'twitter' => '',
                'linkedin' => '',
                'gscholar' => '',
                'nip' => $alumni['nip'],
                'nip_bps' => $alumni['nipbps'],
                'foto_profil' => '',
                'cttl' => '',
                'calamat' => '',
                'cpendidikan' => '',
                'cprestasi' => '',
            ];

            //insert data ke tabel alumni
            $id_alumni = $this->AlumniEntryModel->addAlumni($dataAlumni);

            //mengambil id alumni (return value fungsi add ALumni ialah id dari data yang baru diinsert)
            $id_alumni = $id_alumni[0]['id_alumni'];

            //insert data pendidikan dan pendidikan tinggi
            foreach ($data_pendidikan_1_58 as $pendidikan) {

                //standardisasi untuk mendapatkan jenjang

                if ($pendidikan['nampen'] == $dataAlumni['nama']) {


                    $dataPendidikan = [
                        "jenjang" => "",
                        "instansi" => "",
                        "tahun_lulus" => "",
                        "tahun_masuk" => "",
                        "angkatan" => "",
                        "id_alumni" => $id_alumni,
                    ];

                    $id_pendidikan = $this->AlumniEntryModel->addPendidikan($dataPendidikan);
                    $id_pendidikan = $id_pendidikan[0]['id_pendidikan'];

                    $dataPendidikanTinggi = [
                        "id_pendidikan" => $id_pendidikan,
                        "program_studi" => "",
                        "nim" => "",
                        "judul_tulisan" => "",
                    ];
                }
            }


            // end insert data 1-57
        }


        // insert data alumni d1 tb
        foreach ($data_alumni_d1_TB as $alumni) {

            //standardisasi data tanggal
            $orgDatePens = $alumni['pens'];
            $stdDatePens = str_replace('/', '-', $orgDatePens);
            $stdDatePens = strtotime($stdDatePens);

            $orgDateLahir = $alumni['tlahir'];
            $stdDateLahir = str_replace('/', '-', $orgDateLahir);
            $stdDateLahir = date("Y-m-d", strtotime($stdDateLahir));
            //end standardisasi tanggal

            //pengecekan status pns dan status di bps
            if ($alumni['statpeg'] == "Pensiun" || strpos($alumni['statpeg'], 'Meninggal') || $alumni['statpeg'] == "Berhenti" || $alumni['statpeg'] == "Diberhentikan" || $alumni['statpeg'] == "MPP" || $alumni['statpeg'] == "Pensiun di" || $alumni['statpeg'] == "CPNS") {
                $aktif_pns = 0;
            } else {
                $aktif_pns = 1;
            }

            if ($aktif_pns == 0) {
                $aktif_bekerja = 0;
            } elseif (strpos($alumni['statpeg'], 'Diberhentikan') || strpos($alumni['statpeg'], 'Dipekerjakan') || strpos($alumni['statpeg'], 'Diperbantukan') || strpos($alumni['statpeg'], 'Melimpah')) {

                $aktif_bekerja = 0;
            } else {
                $aktif_bekerja = 1;
            }
            //end pengecekan

            //ngambil kota,kabupaten,provinsi
            $dataAlumni = [
                'nama' => $alumni['nama'],
                'jenis_kelamin' => $alumni['jk'],
                'tempat_lahir' => ucwords(standardTempatLahir(strtolower($alumni['tlahir'])), " "),
                'tanggal_lahir' => $stdDateLahir,
                'telp_alumni' => standardNoHp($alumni['hp']),
                'alamat_alumni' => strtolower($alumni['alamat']),
                'kota' => '', //fungsi standardisasi ngga bisa
                'provinsi' => '',
                'negara' => 'Indonesia',
                'status_bekerja' => $aktif_bekerja,
                'perkiraan_pensiun' => $stdDatePens,
                'jabatan_terakhir' => $alumni['jabter'],
                'aktif_pns' => $aktif_pns,
                'deskripsi' => '',
                'email' => $alumni['email'],
                'ig' => '',
                'fb' => '',
                'twitter' => '',
                'linkedin' => '',
                'gscholar' => '',
                'nip' => $alumni['nip'],
                'nip_bps' => $alumni['nipbps'],
                'foto_profil' => '',
                'cttl' => '',
                'calamat' => '',
                'cpendidikan' => '',
                'cprestasi' => '',
            ];

            //insert data ke tabel alumni
            $id_alumni = $this->AlumniEntryModel->addAlumni($dataAlumni);

            //mengambil id alumni (return value fungsi add ALumni ialah id dari data yang baru diinsert)
            $id_alumni = $id_alumni[0]['id_alumni'];

            //insert data pendidikan dan pendidikan tinggi
            foreach ($data_pendidikan_1_58 as $pendidikan) {

                //standardisasi untuk mendapatkan jenjang


                $dataPendidikan = [
                    "jenjang" => "",
                    "instansi" => "",
                    "tahun_lulus" => "",
                    "tahun_masuk" => "",
                    "angkatan" => "",
                    "id_alumni" => $id_alumni,
                ];

                $id_pendidikan = $this->AlumniEntryModel->addPendidikan($dataPendidikan);
                $id_pendidikan = $id_pendidikan[0]['id_pendidikan'];

                $dataPendidikanTinggi = [
                    "id_pendidikan" => $id_pendidikan,
                    "program_studi" => "",
                    "nim" => "",
                    "judul_tulisan" => "",
                ];
            }


            // end insert data 1-57
        }
        // key data_1_57
        // ⇄0 => string (4)"nama"
        // ⇄1 => string (2) "jk"
        // ⇄2 => string (6) "tlahir"
        // ⇄3 => string (7) "tglahir"
        // ⇄4 => string (7) "telepon"
        // ⇄5 => string (2) "hp"
        // ⇄6 => string (5) "email"
        // ⇄7 => string (6) "alamat"
        // ⇄8 => string (4) "pens"
        // ⇄9 => string (6) "jabter"
        // ⇄10 => string (7) "statpeg"
        // ⇄11 => string (8) "instansi"
        // ⇄12 => string (6) "penter"

        //dd($res[1]['Nama']);
        // $data[0] = [
        //     'nama' => 'Fikri',
        //     'jenis_kelamin' => 'LK',
        //     'tempat_lahir' => 'Sungai Penuh',
        //     'tanggal_lahir' => '1997-01-25',
        //     'telp_alumni' => '081299594151',
        //     'alamat_alumni' => 'Jr. Abdul Rahmat No. 755, Tangerang 47637, SulUt',
        //     'kota' => 'Kabupaten Tuban',
        //     'provinsi' => 'Jawa Timur',
        //     'negara' => 'Indonesia',
        //     'status_bekerja' => 0,
        //     'perkiraan_pensiun' => '1978',
        //     'jabatan_terakhir' => 'amet',
        //     'aktif_pns' => 0,
        //     'deskripsi' => 'Maiores ut quasi beatae vel quisquam. Quo aut iusto et nobis et blanditiis non. Animi in architecto et iusto occaecati mollitia vel.',
        //     'email' => '',
        //     'ig' => 'dummy_ig',
        //     'fb' => 'dummy_fb',
        //     'twitter' => 'dummy_twitter',
        //     'linkedin' => 'dummy_linkedin',
        //     'gscholar' => 'dummy_gscholar',
        //     'nip' => '198109262004122002',
        //     'nip_bps' => '301820912',
        //     'foto_profil' => 'components/icon/Lk-icon.svg',
        //     'cttl' => 0,
        //     'calamat' => 0,
        //     'cpendidikan' => 0,
        //     'cprestasi' => 0
        // ];
        // $data[1] = [
        //     'nama' => 'Fikri',
        //     'jenis_kelamin' => 'LK',
        //     'tempat_lahir' => 'Sungai Penuh',
        //     'tanggal_lahir' => '1997-01-25',
        //     'telp_alumni' => '081299594151',
        //     'alamat_alumni' => 'Jr. Abdul Rahmat No. 755, Tangerang 47637, SulUt',
        //     'kota' => 'Kabupaten Tuban',
        //     'provinsi' => 'Jawa Timur',
        //     'negara' => 'Indonesia',
        //     'status_bekerja' => 0,
        //     'perkiraan_pensiun' => '1978',
        //     'jabatan_terakhir' => 'amet',
        //     'aktif_pns' => 0,
        //     'deskripsi' => 'Maiores ut quasi beatae vel quisquam. Quo aut iusto et nobis et blanditiis non. Animi in architecto et iusto occaecati mollitia vel.',
        //     'email' => '',
        //     'ig' => 'dummy_ig',
        //     'fb' => 'dummy_fb',
        //     'twitter' => 'dummy_twitter',
        //     'linkedin' => 'dummy_linkedin',
        //     'gscholar' => 'dummy_gscholar',
        //     'nip' => '198109262004122002',
        //     'nip_bps' => '301820912',
        //     'foto_profil' => 'components/icon/Lk-icon.svg',
        //     'cttl' => 0,
        //     'calamat' => 0,
        //     'cpendidikan' => 0,
        //     'cprestasi' => 0
        // ];

        //$data['hasil'] = $this->AlumniEntryModel->addAlumni($data);
        //dd($data['hasil']);


        // $file = fopen("alumni/tes.csv","r");

        // $res=array();
        // while(! feof($file))
        // {
        //    $r=fgetcsv($file,0,";");
        //    $res[]=array(
        //        "nama" =>$r[1],
        //        "kelas" => "hai",
        //        "nim" => "hai"
        //    );
        // }

        // fclose($file);
        // dd($res);
    }
}
