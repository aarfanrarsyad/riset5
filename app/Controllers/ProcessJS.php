<?php

namespace App\Controllers;

class ProcessJS extends BaseController
{
    public function provinsi()
    {
        if(isset($_POST["provinsi"])){
            // Capture selected provinsi
            $provinsi = $_POST["provinsi"];
             
            // Define provinsi and city array
            $provinsiArr = array(
                            "usa" => array("New Yourk", "Los Angeles", "California"),
                            "india" => array("Mumbai", "New Delhi", "Bangalore"),
                            "uk" => array("London", "Manchester", "Liverpool")
                        );
             
            // Display city dropdown based on provinsi name
            if($provinsi !== 'Select'){
                echo "<label for='kabkota' class='font-medium' id='labelKabkot'>Kabupaten/Kota:</label>";
                echo "<select name='kabkota' id='kabkota' placeholder='Masukkan nama kabupaten/kota' class='inputForm'>";
                foreach($provinsiArr[$provinsi] as $value){
                    echo "<option>". $value . "</option>";
                }
                echo "</select>";
            } 
        }
    }
}