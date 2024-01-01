
<?php 


include 'koneksi.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 



?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Diagnosa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-6">
            <!-- small box -->
           <div class="card">
              <div class="card-header">
                    
              </div>
              

              <!-- /.card-header -->
              <div class="card-body p-0">



   <?php 
 

  if (isset($_POST['submited'])) {

    $selected = (array) $_POST['select'];
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
    

  }

?>

<?php
//fungsi format rupiah 
/**function format_rupiah($rp) {
    $hasil = "Rp." . number_format($rp, 0, "", ".") . ",00";
    return $hasil;
    }
    **/
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "dbmobil";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
    echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}   
?>


<?php



if(isset($_POST['simpan'])){

$username  = $_SESSION['username'];
$tgl_diagnosa = date("Y-m-d");

$kerusakan = $_POST['kerusakan'];
$id_lap = "On Process";
$presentase = $_POST['presentase'];



$query = mysqli_query($koneksi, "INSERT INTO diagnosa (username, tgl_diagnosa,kerusakan,presentase ) VALUES ('$username', '$tgl_diagnosa', '$kerusakan', '$presentase')");
if ($query){
  echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'index.php'</script>";  
} else {
  echo "<script>alert('Data Gagal dimasukan!'); window.location = 'index.php'</script>"; 
} 
}



                ?>


<form id="select" method="POST" action="detail.php" >


                                    <table id="" class="table">
                                          <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Gejala</th>
                                                <th>Nama Gejala</th>
                                            </tr>
                                        </thead>
                                        <?php 
                                          $i=1;
                                          foreach ($rowsa as $key) {
                                            echo "<tr>";
                                            echo "<td>".$i++."</td>";
                                            echo "<td>".$key['kd_gejala']."</td>";
                                            echo "<td>".$key["gejala"]."</td>";
                                            echo "</tr>";
                                          }
                                        ?>

            
                                        </tbody>
                                       
                                    </table>


                                    <br>
                                    


                                     
                                </div>
            <!--Tambah Modal -->

            <div class="container-fluid">
                        <div class="card">
                            <div class="">
                               <br>

                                <div class="table-responsive">

                                    <form id="select" method="POST" action="detail.php" >


                                    <table id="zero_config" class="table">
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
                                                    <?= floor($hasil_akhir) ?> %  </center>
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
                                    


                                       
                                </div>

               

                <div class="container-fluid">
                        <div class="card">
                            <div class="row">
                               <br>

                                <div class="table-responsive">

                                    <form id="select" method="POST" action="detail.php" >


                                     <table class="table">
                                    
                 

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
    
    <td width="78%"><?= floor($terbesar['hasil_akhir']) ?> %</td>
    
   
   
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


                                    <br>
                                    


                                        <?php
                                          if (isset($_POST['ubah'])){
                                            $kd_gejala = $_POST['kd_gejala'];
                                            $gejala = $_POST['gejala'];
                                           
                                            
                                          
                                            $ubah = mysqli_query($koneksi,"UPDATE gejala SET gejala='$gejala', kd_gejala='$kd_gejala' WHERE id_g='$id_g' "); 
                                            if($ubah){
                                              ?>
                                              <script type="text/javascript">
                                              alert('Edit Data Berhasil');
                                                document.location.href="data_gejala.php?page=gejala";
                                               </script>
                                               <?php
                                              }else{
                                                echo"Gagal Mengedit Data";
                                              } 
                                            
                                          }
                                        ?> 
                                </div>
                                   </div>


                   
                                
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
                                        
                <a class="btn btn-sm btn-primary" href="index.php"><span Class="fa 
                    fa-arrow-circle-left"></span> Kembali</a>

                 <a class="btn btn-sm btn-primary"  href="cetak.php?<?=http_build_query(array('selected' => $selected))?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>




                  <input type="submit" name="simpan" value="Simpan diagnosa" class="btn btn-sm btn-primary" />&nbsp;


                  <input type='hidden' class="form-control" type="text" name="kerusakan" id="kerusakan"  value="<?PHP ECHO $terbesar['kerusakan']; ?>" readOnly />

                   <input type='hidden' class="form-control" type="text" name="presentase" id="presentase"  value="<?PHP ECHO $terbesar['hasil_akhir'] ?>"    / >

                    <?php
                                                $no++;
                                            }
                                        }
                                        ?>

        <!-- /.row -->
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </div>

  <!-- /.content-wrapper -->
 <?php include 'template/footer.php'; ?>



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
