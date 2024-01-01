
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
            <h1 class="m-0">input data admin </h1>
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

   if(isset($_POST['simpan'])){

  
      $id_user        = $_POST['id_user'];
      $nama           = $_POST['nama'];
      $alamat         = $_POST['alamat'];
      $username       = $_POST['username'];
      $password      = $_POST['password'];
    
      $level          = $_POST['level'];


 
    $cek = mysqli_num_rows(mysqli_query($kon,"SELECT * FROM admin WHERE username='$username'"));

    if ($cek > 0){
    echo "<script>window.alert(' sudah ada username   ')
    window.location='input_admin.php'</script>";
    }else {
    mysqli_query($kon, "INSERT INTO admin (id_user, nama, alamat, username, password, level) VALUES
                  ('$id_user', '$nama', '$alamat', '$username', '$password', '$level')");

  


    echo "<script>window.alert('DATA SUDAH DISIMPAN')
    window.location='data_admin.php'</script>";
    }
    }
    ?>


            <!-- general form elements -->
            <!-- Horizontal Form -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">input data obat</h3>
              </div>

             
              <!-- /.card-header -->
              <!-- form start -->
             <form class="forms-sample" action="input_admin.php" method="post" >
                <div class="card-body">

 


                  <div class="form-group">
                     <label> id Admin</label>
                   
 <input name="id_user" type="text" id="id_user" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="D"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />


                  </div>
                 
                
                  <div class="form-group">
                     <label>Nama </label>
                   
                     <input name="nama" type="text" id="nama" class="form-control"autocomplete="off" required />

                  </div>



                    <div class="form-group">
                     <label>Alamat</label>
                    <input name="alamat" type="text" id="alamat" class="form-control" autocomplete="off" required />
                  </div>



                  <div class="form-group">
                     <label>username</label>

                                                       <input name="username" type="text" id="username" class="form-control"autocomplete="off" required />
                  </div>

                              

                  <div class="form-group">
                     <label>password</label>

                                                       <input name="password" type="text" id="password" class="form-control" autocomplete="off" required />
                  
                  </div>

<div class="form-group">
                     <label>level</label>

                  <select name="level" id="level" class="form-control">
                
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                
              </select>
               

                  </div>

                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
               


                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan data</button>
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
