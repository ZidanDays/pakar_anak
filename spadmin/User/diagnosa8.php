
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
            <h1 class="m-0">Diagnosa </h1>
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
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">

 


               <?php

   if(isset($_POST['YA'])){

  
      $id_user         = $_SESSION['id_user'];
      $tgl_diagnosa    = $_POST['tgl_diagnosa'];
      $kd_gejala    = $_POST['kd_gejala'];
      $ya_siap         = "1";
      $ragu_ragu       = "0";
      $belum_siap      = "0";
  


 
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM diagnosa WHERE id_user='$_SESSION[id_user]' AND kd_gejala='$kd_gejala' "));

    if ($cek > 0){
    echo "<script>window.alert(' anda sudah melakukan diagnosa ')
    window.location='hasil_diagnosa.php'</script>";
    }else {
    

    mysqli_query($koneksi, "INSERT INTO diagnosa (id_user, tgl_diagnosa,kd_gejala, ya_siap, ragu_ragu, belum_siap) VALUES
                  ('$id_user', '$tgl_diagnosa', '$kd_gejala', '$ya_siap', '$ragu_ragu', '$belum_siap')");

  
   echo "<script>window.alert('pertanyaan selanjutnya')
    window.location='diagnosa9.php'</script>";

  
    }
  }
   
    ?>

     

 <?php

   if(isset($_POST['BLM'])){

  
      $id_user         = $_SESSION['id_user'];
      $tgl_diagnosa    = $_POST['tgl_diagnosa'];
      $kd_gejala    = $_POST['kd_gejala'];
      $ya_siap         = "0";
      $ragu_ragu       = "0";
      $belum_siap      = "1";
  


 
    
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM diagnosa WHERE id_user='$_SESSION[id_user]' AND kd_gejala='$kd_gejala' "));

    if ($cek > 0){
    echo "<script>window.alert(' anda sudah melakukan diagnosa ')
    window.location='hasil_diagnosa.php'</script>";
    }else {

    mysqli_query($koneksi, "INSERT INTO diagnosa (id_user, tgl_diagnosa,kd_gejala, ya_siap, ragu_ragu, belum_siap) VALUES
                  ('$id_user', '$tgl_diagnosa', '$kd_gejala', '$ya_siap', '$ragu_ragu', '$belum_siap')");

  
   echo "<script>window.alert('pertanyaan selanjutnya')
    window.location='diagnosa9.php'</script>";

  
    }
  }
   
    ?>



            <!-- general form elements -->
            <!-- Horizontal Form -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pilih dengan jawaban sesuai </h3>
              </div>

             
              <!-- /.card-header -->
              <!-- form start -->
             <form class="forms-sample" action="diagnosa8.php" method="post" >
                <div class="card-body">

 
                                             <?php
                                                  include'koneksi.php';
                                                  $no = 1;
                                                  $sql = mysqli_query($koneksi, "SELECT * from gejala WHERE Kd_gejala='G8' ");
                                                    while($data = mysqli_fetch_array($sql)){
                          

                                                  
                                                ?>





                    <div class="form-group">

                     <label>(<?php echo $data['kd_gejala']; ?>) Apakah anak anda <?php echo $data['gejala']; ?> ? </label>


                          <input type='hidden' class="form-control" type="text" value="<?php echo date("Y-m-d"); ?>" name="tgl_diagnosa" ReadOnly required='required' />


                    <input name="kd_gejala" type="hidden" id="kd_gejala" class="form-control" value="<?php echo $data['kd_gejala']; ?>"placeholder="Nama penduduk" autocomplete="off" required />
                     
                  </div>





                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                   <?php
                                      }
                                      ?>


                <div class="card-footer">
                  <button type="submit" name="YA" class="btn btn-primary">YA </button>
                 
                  
                   <button type="submit" name="BLM" class="btn btn-primary">Tidak </button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
               



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
