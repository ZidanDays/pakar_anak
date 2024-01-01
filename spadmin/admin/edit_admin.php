
<?php 


include 'koneksidb.php'; 
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
            <h1 class="m-0">edit data admin </h1>
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
            $id_user = $_GET['id_user'];
      $sql = mysqli_query($kon, "SELECT * FROM admin WHERE id_user='$id_user'");
      if(mysqli_num_rows($sql) == 0){
        header("Location: data_admin.php");
      }else{
        $row = mysqli_fetch_assoc($sql);
      }
      if(isset($_POST['update'])){



     
      $nama           = $_POST['nama'];
      $alamat         = $_POST['alamat'];
      $username       = $_POST['username'];
      $password      = $_POST['password'];
    
      $level          = "Admin";


                
        $update = mysqli_query($kon, "UPDATE admin SET nama='$nama', alamat='$alamat', username='$username' , password='$password' , level='$level' WHERE id_user='$id_user'") or die(mysqli_error());



        if($update){
                    echo "<script>alert('Data Berhasil di ubah gan!'); window.location = 'data_admin.php'</script>"; 
             
             

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
                <h3 class="card-title">edit data suplier</h3>
              </div>

             
              <!-- /.card-header -->
              <!-- form start -->
            <form class="form-horizontal style-form" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

                <div class="card-body">


                
                  <div class="form-group">
                     <label>Nama Admin</label>
                   
                     <input name="nama" type="text" id="nama" value="<?php echo $row['nama']; ?>" class="form-control"autocomplete="off" required />

                  </div>



                    <div class="form-group">
                     <label>Alamat</label>
                    <input name="alamat" type="text" id="alamat"  value="<?php echo $row['alamat']; ?>" class="form-control" autocomplete="off" required />
                  </div>



                  <div class="form-group">
                     <label>username</label>

                                                       <input name="username" type="text" id="username"  value="<?php echo $row['username']; ?>" class="form-control"autocomplete="off" required />
                  </div>

                              

                  <div class="form-group">
                     <label>password</label>

                                                       <input name="password" type="text" id="password" value="<?php echo $row['password']; ?>" class="form-control" autocomplete="off" required />
                  
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
