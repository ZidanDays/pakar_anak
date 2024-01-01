<h1>Hasil Diagnosa</h1>


<?php

session_start();
  /*echo $_SESSION['level'];
  echo $_SESSION['nama'];*/

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "dbmobil";
    
//$base_url = "http://localhost/koperasi/";

$koneksi = mysqli_connect($server,$user,$pass,$dbname);

if(mysqli_connect_errno()){
    echo "Koneksi database gagal".mysqli_connect_error();
}
/*if (mysqli_connect($server,$user,$pass)){
    #echo ":)";
    mysqli_select_db($dbname) or die("database not found");
}else{
    echo "Database Not Found";
}*/

?>

<?php


 $selected = (array) $_GET['selected'];
    $rowsa = mysqli_query($koneksi, "SELECT kd_gejala, gejala FROM gejala WHERE kd_gejala IN ('".implode("','", $selected)."')");
    $as = mysqli_fetch_assoc($rowsa);

    $sql_row = "SELECT COUNT(bayes_aturan.kd_gejala) as rowspan, bayes_aturan.kd_gejala, bayes_aturan.nilai ,kerusakan.* FROM bayes_aturan INNER JOIN kerusakan ON bayes_aturan.kd_kerusakan = kerusakan.kd_kerusakan WHERE kd_gejala IN  ('".implode("','", $selected)."') GROUP BY bayes_aturan.kd_kerusakan";
    // echo($sql_row);
    $data_row = mysqli_query($koneksi, $sql_row) ;

    $sql = "SELECT bayes_aturan.kd_gejala, bayes_aturan.nilai ,kerusakan.* FROM bayes_aturan INNER JOIN kerusakan ON bayes_aturan.kd_kerusakan = kerusakan.kd_kerusakan WHERE kd_gejala IN  ('".implode("','", $selected)."')";
    // echo($sql);
    $data = mysqli_query($koneksi, $sql) ;

    $as = mysqli_fetch_assoc($data);

    $hasil_perkalian = [];
    foreach ($data_row as $data_a) {
        $bobot = $data_a['bobot'];
        $total = 0;
        foreach ($data as $data_b) {
            
            if($data_a['kd_kerusakan'] == $data_b['kd_kerusakan']){
                // if($data_a['kd_gejala'] == $data_b['kd_gejala']){
                    $nilai = $data_b["nilai"];
                    $total = $bobot * $nilai *10;
                    $bobot = $total;
                // }
            }
            
        }

                                        

        $hasil_perkalian[$data_a['kd_kerusakan']] = $total;
    }

    $total_penjumlahan = array_sum($hasil_perkalian);
    


?>

<html>
<head>
    <title>MEMBUAT CETAK PRINT LAPORAN DENGAN PHP - WWW.MALASNGODING.COM</title>
</head>
<body>
 

<h3>Hasil Analisa</h3>
   <table border="1">
                                          <thead>
                                            <tr>
                                           
                                                <th>Kerusakan</th>
                                                <th>Hasil</th>
                                            </tr>
                                        </thead>
                                      

            
                                        </tbody>

                                          <?php 
    
                                          $hasil_semua = [];
                                          $hasil_akhir = 0;  
                                          $hasil_akhir_semua = [];
                                          $rowspan = 1;
                                          
                                          $total_penjumlahan = round($total_penjumlahan, 4);
                                          foreach ($data_row as $key_row) {



                                            $hasil_akhir_perkalian = round($hasil_perkalian[$key_row["kd_kerusakan"]], 4);

                                             
                                          
                                                
                                           
                                                                                      
                                            $hasil_akhir = $hasil_perkalian[$key_row["kd_kerusakan"]] / $total_penjumlahan * 100;
                                            

                                            $hasil_akhir = round($hasil_akhir, 4);
                                             
                                             if($hasil_akhir > 100)
                                            {
                                                 $hasil_akhir = 100;
                                            }
                                          

                                            $hasil_akhir_semua[] = round($hasil_akhir, 4);
                                         
                                            $hasil_semua[] = [
                                                'kd_kerusakan' => $key_row["kd_kerusakan"],
                                                'kerusakan' => $key_row["kerusakan"],
                                                'solusi' => $key_row["solusi"],
                                               
                                                
                                                'hasil_akhir' => $hasil_akhir
                                            ];

                                            foreach ($data as $key) {
                                            
                                              if($key_row['kd_kerusakan'] == $key['kd_kerusakan']){
                                        ?>
                                        <tr>

                                            <?php
                                              if($key_row['kd_gejala'] == $key['kd_gejala']){
                                            ?>
                                            
                                           
                                            <td rowspan="<?= $key_row["rowspan"] ?>">
                                                <left>
                                                    <?= $key['kerusakan'];?>
                                                </left>
                                            </td>

                                             <td rowspan="<?=  $key_row["rowspan"] ?>">
                                                <left>
                                                    <?= $hasil_akhir ?> % </center>
                                            </td>
                                           
                                            <?php
                                                }
                                            ?>

                                           

                                           
                                              


                                           
                                            <?php
                                                
                                              }
                                            ?>
                                        </tr>
                                        <?php
                                                }
                                                
                                                $rowspan = $key_row["rowspan"];
                                            }
                                        
                                      
                                       
                                        ?>
                                    </tbody>
                                    </table>

                                  
                                

                                <br>

<h3>Hasil Analisa</h3>
 
                                      <table border="1">
                                    
                 

                     <?php
                                          $no=1;
                                          $max = max($hasil_akhir_semua);
                                          foreach ($hasil_semua as $terbesar) {
                                            if($terbesar["hasil_akhir"] == $max){
                                        ?>
  
   


   
 <tr>
    <td width="20%"><b>Nama USER</b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"> <?PHP ECHO $_SESSION['nama']; ?></td>
    
  </tr>


  <tr>

   

    <td width=""><b>Kode Kerusakan </b></td>
    <td width=""><b>:</b></td>
    <td  width="">  <?= $terbesar['kd_kerusakan'];?></td>

  </tr>

  <tr>

   

    <td width=""><b>Kerusakan yang di alami </b></td>
    <td width=""><b>:</b></td>
    <td  width="">  <?= $terbesar['kerusakan'];?></td>

  </tr>


   <tr>
    <td width="20%"><b>Presentase Terbesar</b></td>
    <td width="2%"><b>:</b></td>
    
    <td width="78%"><?= $terbesar['hasil_akhir'] ?> %</td>
   
  </tr>

 
  <tr>
    <td width="20%"><b>Pengendalian / solusi </b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"> <?= $terbesar['solusi'];?></td>

   
    

   
  </tr>

  
  <?php
                                                $no++;
                                            }
                                        }
                                        ?>


    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

         
                     <?php
                                          $no=1;
                                          $max = max($hasil_akhir_semua);
                                          foreach ($hasil_semua as $terbesar) {
                                            if($terbesar["hasil_akhir"] == $max){
                                        ?>
                  
                



                  



                 


            </section>


  <?php
                                                $no++;
                                            }
                                        }
                                        ?>

                     
                 


                  


              




    <script>
        window.print();
    </script>
    
</body>
</html>
