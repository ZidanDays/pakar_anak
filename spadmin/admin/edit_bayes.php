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
            <h1 class="m-0">edit data </h1>
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
          <div class="col-md-6">



   <?php
      $ID = $_GET['ID'];
      $sql = mysqli_query($koneksi, "SELECT * FROM bayes_aturan INNER JOIN  kerusakan ON bayes_aturan.kd_kerusakan = kerusakan.kd_kerusakan INNER JOIN gejala ON bayes_aturan.kd_gejala = gejala.kd_gejala WHERE ID='$ID'");

      


      if(mysqli_num_rows($sql) == 0){
        header("Location: bayes.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      if(isset($_POST['update'])){
        $kd_kerusakan  = $_POST['kd_kerusakan'];
        $kd_gejala = $_POST['kd_gejala'];
        $nilai  = $_POST['nilai'];
       
      
                
        $update = mysqli_query($koneksi, "UPDATE bayes_aturan SET kd_gejala='$kd_gejala', kd_kerusakan='$kd_kerusakan' , nilai='$nilai' WHERE ID='$ID'") or die(mysqli_error());



        if($update){
           echo "<script>alert('Data Berhasil di ubah gan!'); window.location = 'data_bayes.php'</script>"; 
             

        }else{
          echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
        }
      }
      
      //if(isset($_GET['pesan']) == 'sukses'){
      //  echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil disimpan.</div>';
      //}
      ?>


            <!-- general form elements -->
            <!-- Horizontal Form -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">edit data barang</h3>
              </div>

             
              <!-- /.card-header -->
              <!-- form start -->
            <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

                <div class="card-body">




                  <div class="form-group">
                     <label> kd kerusakan </label>
                    <input name="kd_kerusakan" type="text" id="kd_kerusakan" class="form-control" value="<?php echo $row['kd_kerusakan']; ?>"placeholder="Auto Number" autocomplete="off" autofocus="on" readonly="readonly" />
                  </div>
                 
                
                 

                  <div class="form-group">
                     <label>kd gejala </label>
                    <input name="kd_gejala" type="text" id="kd_gejala" class="form-control" value="<?php echo $row['kd_gejala']; ?>"placeholder="Auto Number" autocomplete="off" autofocus="on"  />
                  </div>

                  <div class="form-group">
                     <label>nilai </label>
                    <input name="nilai" type="text" id="nilai" class="form-control" value="<?php echo $row['nilai']; ?>"placeholder="Auto Number" autocomplete="off" autofocus="on" />
                  </div>
                  

                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
               


                <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Simpan data</button>
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
