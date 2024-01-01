
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
            <h1 class="m-0">Data Bengkel</h1>
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



if(isset($_POST['simpan'])){

$kerusakan = $_POST['kerusakan'];
$id_user  = $_SESSION['id_user'];
$tgl_diagnosa = date("Y-m-d");






$query = mysqli_query($koneksi, "INSERT INTO riwayat (kerusakan, id_user,tgl_diagnosa ) VALUES ('$kerusakan', '$id_user', '$tgl_diagnosa')");



 $delete = mysqli_query($koneksi, "DELETE FROM diagnosa WHERE id_user='$id_user'");

if ($query){
  echo "<script>alert('Data Berhasil dimasukan!'); window.location = 'riwayat.php'</script>";  
} else {
  echo "<script>alert('Data Gagal dimasukan!'); window.location = 'index.php'</script>"; 
} 
}



                ?>
    



                   

<form id="select" method="POST" action="hasil_diagnosa.php" >


                   <table id="zero_config" class="table">
                                          <table id="zero_config" class="table">
                                        <thead>
                                              <tr>
                                                <th><left>No </center></th>
                                               
                    
       
                           <th><left> SIAP SEKOLAH </center></th>

                            <th><left> RAGU RAGU </center></th>

                                <th><left> BELUM SIAP </center></th>
                                              </tr>
                                        </thead>
                                        <tbody>
            
                                             <?php
                                                  include'koneksi.php';
                                                  $no = 1;
                                                      $subtotal = 0;
                                                      $subtotal_ragu = 0;
                                                       $subtotal_belum = 0;
                                                  $sql = mysqli_query($koneksi, "SELECT * from diagnosa WHERE id_user='$_SESSION[id_user]' ");
                                                    while($data = mysqli_fetch_array($sql)){
                                                  
                                                      $total = $data['ya_siap'] ;

                                                       $total_ragu = $data['ragu_ragu'] ;

                                                       $total_belum= $data['belum_siap'] ;

                                                      $subtotal = $subtotal + $total ;

                                                       $subtotal_ragu = $subtotal_ragu + $total_ragu ;

                                                       $subtotal_belum = $subtotal_belum + $total_belum ;

                                                       $maxsubtotal[]        = $subtotal   ;

                                                ?>

                                            <tr class="table-white">
                                                <td><?php echo $data['kd_gejala'];?></td>

                    
                     <td><left><?php echo $data['ya_siap'];?></left></td>
                      <td><left><?php echo $data['ragu_ragu'];?></center></td>

                        <td><left><?php echo $data['belum_siap'];?></center></td>
                                                
                                            </tr>
            <!-- Edit Modal !-->
                
                                </form>
                            </div>
                            <?php
                                  }
                                  ?>
                                        </tbody>

                                        <th colspan="1" class="text-center">Grand Total </th>
                   
                   <td><?php echo $subtotal;  ?></td>
                       
                      <td><?php echo $subtotal_ragu;  ?></td>

                                    <td><?php echo $subtotal_belum;  ?></td>  

                                    

                                    </table>
                                        
                                </div>
            <!--Tambah Modal -->




                        </div>
                    </div>

<div class="container-fluid">
                        <div class="card">
                            <div class="row">
                               <br>

                                <div class="table-responsive">

                                    <form id="select" method="POST" action="hasil_diagnosa.php" >


                                     <table class="table">
                                    
                 

                     <?php

                           

                                   $jumlah_akhir = $subtotal - $subtotal_ragu - $subtotal_belum;

    ?>
   



   
 <tr>
    <td width="20%"><b>YA SIAP UNTUK SEKOLAH </b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%"> <?php echo $subtotal;  ?> JAWABAN ANAK YANG MENYATAKAN SIAP SEKOLAH</td>
    
  </tr>


  <tr>

   

    <td width=""><b>RAGU RAGU </b></td>
    <td width=""><b>:</b></td>
    <td  width=""> <?php echo $subtotal_ragu;  ?> JAWABAN ANAK YANG MENYATAKAN RAGU RAGU UNTUK BERSEKOLAH </td>

  </tr>

  <tr>

   

    <td width=""><b>BELUM SIAP SEKOLAH </b></td>
    <td width=""><b>:</b></td>
    <td  width=""><?php echo $subtotal_belum;  ?> JAWABAN ANAK YANG MENYATAKAN  BELUM SIAP SEKOLAH</td>

  </tr>





  <tr>
    <td width="20%"><b>Kesimpulan </b></td>
    <td width="2%"><b>:</b></td>
    <td width="78%">   <?php



// Dengan Colon
if ($jumlah_akhir >= 6): 
  echo 'ANAK ANDA DINYATAKAN SIAP UNTUK BERSEKOLAH';
elseif ($jumlah_akhir <  6):
  echo 'ANAK ANDA MASIH BELUM SIAP UNTUK BERSEKOLAH';

endif;


?> 


</td>

   
       <input type='hidden' class="form-control" type="text" name="kerusakan" id="kerusakan"  value="<?php



// Dengan Colon
if ($jumlah_akhir >= 6): 
  echo 'ANAK ANDA DINYATAKAN SIAP UNTUK BERSEKOLAH';
elseif ($jumlah_akhir <  6):
  echo 'ANAK ANDA MASIH BELUM SIAP UNTUK BERSEKOLAH';

endif;


?> " readOnly />

   
    

   
  </tr>

  

    </tbody>

                                </table>


                                    <br>

                </div>        



                      </div>
              <!-- /.card-body -->


            </div>
            <!-- /.card -->

             <a class="btn btn-sm btn-primary" href="index.php"><span Class="fa 
                    fa-arrow-circle-left"></span> Kembali</a>

                 

                 <input type="submit" name="simpan" value="Simpan diagnosa" class="btn btn-sm btn-primary"  />&nbsp;

          </div>


            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
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
