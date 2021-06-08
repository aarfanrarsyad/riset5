<?php

namespace App\Controllers;


class Tes extends BaseController
{
	public function index()
    {

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
        $res= csv_to_array('alumni/tes.csv',";");
        dd($res[1]['Nama']);

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