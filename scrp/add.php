<?php

require_once "../db.php";

require_once "../classes/seoController.php";

$seo = new seoNames();


/*$csvFilePath = "student-1.csv";
$file = fopen($csvFilePath, "r");
while (($row = fgetcsv($file)) !== FALSE) {
   if(strlen($row[2]) <= 20) echo $row[2].'<br />';
}*/


    $row = 1;
    if (($handle = fopen('medExport.csv', "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, '\n')) !== FALSE) {
            $num = count($data);
            //echo "<p> $num fields in line $row: <br /></p>\n";
            $row++;
            //echo $data[$c].'<hr>';
            for ($c=0; $c < $num; $c++) {

                $data = str_replace('true', '1', str_replace('false', '0', str_replace('"', '', explode(';"', str_replace(';;', ';"0";', $data[0])))));

                /*//VID
Preparato (sugalvotas) pavadinimas
Veiklioji (-osios) medžiaga (-os)
Stiprumas
Farmacinė forma
Vartojimo būdas (-ai)
Vaistinių preparatų grupė
Vaistinių preparatų pogrupis
Recepto poreikis
ATC kodas
Pavadinimas anglų kalba
Ar kontroliuojamas?
Ar stebimas?
Tiekimo LR rinkai pagrindas
Registracijos data
Perregistravimo data
Stadija
(pakuotės) PAKID
(pakuotės) NPAKID
(pakuotės) NPAKID7
(pakuotės) Pakuotės registracijos Nr.
(pakuotės) Pakuotės tipas
(pakuotės) Aprašymas
(pakuotės) Recepto poreikis
Registruotojas
Registruotojo valstybė
Paraiškos tipas
*/


                echo "vid:".$data[0]."<br />";
                echo "pavadinimas:".$data[1]."<br />";
                echo "veiklioji:".$data[2]."<br />";
                echo "stiprumas:".$data[3]."<br />";
                echo "farmacine forma:".$data[4]."<br />";
                echo "vartojimo budas:".$data[5]."<br />";
                echo "grupe:".$data[6]."<br />";
                echo "pogrupis:".$data[7]."<br />";
                echo "recepto poreikis:".$data[8]."<br />";
                echo "atc_kodas:".$data[9]."<br />";
                echo "en_title:".$data[10]."<br />";
                echo "ar_kontroliuojamas:".$data[11]."<br />";
                echo "ar_stebimas:".$data[12]."<br />";
                echo "lr_tiekimas:".$data[13]."<br />";
                echo "reg_data:".$data[14]."<br />";
                echo "perreg_data:".$data[15]."<br />";
                echo "stadija:".$data[16]."<br />";
                echo "pakid:".$data[17]."<br />";
                echo "npakid:".$data[18]."<br />";
                echo "npakid7:".$data[19]."<br />";
                echo "pak_reg_nr:".$data[20]."<br />";
                echo "pak_tipas:".$data[21]."<br />";
                echo "pak_aprasymas:".$data[22]."<br />";
                echo "pak_receptas:".$data[23]."<br />";
                echo "registruotojas:".$data[24]."<br />";
                echo "reg_valstybe:".$data[25]."<br />";
                echo "paraiskos_tipas:".$data[26]."<br />";
                echo "<hr><br />";

            //    9849;"Imuran";"Azatioprinas";"50 mg";"plėvele dengtos tabletės";"vartoti per burną";"Vaistinis preparatas";"Cheminis";"Receptinis";"L04AX01";"Azathioprine";"false";"false";"Nacionalinė procedūra";"1994-11-11";"2010-02-04";"Perregistruotas";"1096";"951";"1000951";"LT/1/94/1856/001";"lizdinė plokštelė";"N100";"Receptinis";"Aspen Pharma Trading Limited";"Airija";"8(3)";


              //  mysqli_query($connection, "INSERT INTO vardai (vid) VALUES('".$data[0]."')");

             //   mysqli_query($connection, "INSERT INTO vardai (rewrite, vid, vardas, veiklioji, stiprumas, farmacine_forma, vartojimo_budas, grupe, pogrupis, recepto_poreikis, atc_kodas, en_title, ar_kontroliuojamas, ar_stebimas, lr_tiekimas, reg_data, perreg_data, stadija, pakid, npakid, npakid7, pak_reg_nr, pak_tipas, pak_aprasymas, pak_receptas, registruotojas, reg_valstybe, paraiskos_tipas) VALUES('".$seo->seoURL($data[1])."','".$data[0]."','".mysqli_real_escape_string($connection, $data[1])."','".mysqli_real_escape_string($connection,$data[2])."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."','".$data[7]."','".$data[8]."','".$data[9]."','".$data[10]."','".$data[11]."','".$data[12]."','".$data[13]."','".$data[14]."','".$data[15]."','".$data[16]."','".$data[17]."','".$data[18]."','".$data[19]."','".$data[20]."','".$data[21]."','".$data[22]."','".$data[23]."','".mysqli_real_escape_string($connection, $data[24])."','".$data[25]."','".$data[26]."')") or die ('Unable to execute query. '. mysqli_error($connection));
            	//$details = explode('<TARP>",', $data[$c]);
            	//.'<hr>';
            	//$id = $data[$c];
            	//$details = explode('",', str_replace('""', '"', $id));

               // if(strpos($details[0], "\n") === '') echo $details[0].'<br />';

             /*   if($details[]) {
            	echo $details[1].'<br />';
            }
        			/*$db->query("insert registras_jadis
                    (obj_kodas, obj_pav, form_kodas, form_pav_i, stat_statusas, stat_pav_i, ja_reg_data, pateikimo_poz, saraso_data, formavimo_data) values (?,?,?,?,?,?,?,?,?,?)", $details[0], $details[1], $details[2], $details[3], $details[4], $details[5], $details[6], $details[7], $details[8], $details[9]);*/
            	//305835263
            	//if($row == 0) echo $data[$c] . "<br />\n";
            	//if(strpos($data[$c], $_GET['code']) !== false) echo $data[$c] . "<br />\n";*/

            }
        }

        fclose($handle);
    }
    ?>

