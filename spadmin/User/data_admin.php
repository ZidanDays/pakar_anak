
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
            <h1 class="m-0">Data Admin</h1>
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
                  <button type="button" class="fa fa-plus btn btn-info" data-toggle="modal" data-target="#tambah" style="margin-top: 10px;" align="center" title="">Tambah</button><br>
              </div>
              

              <!-- /.card-header -->
              <div class="card-body p-0">


                   <?php


                    

                    $query1="SELECT * FROM admin  ";
                    

                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());


                

                    ?>


                     <?php
             if(isset($_GET['aksi']) == 'hapus'){
        $id_user = $_GET['id_user'];
        $cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_user='$id_user'");
        if(mysqli_num_rows($cek) == 0){

          
        }else{
          $delete = mysqli_query($koneksi, "DELETE FROM admin WHERE id_user='$id_user'");
          if($delete){
            
              echo "<script>alert('Data Berhasil di hapus gan!'); window.location = 'data_admin.php'</script>";



          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
        }
      }
      ?>




                  <table class="table">

                      <thead>
                                              <tr>
                                                <th><i class=""></i> NO</th>
                                                 <th><center>id_user </center></th>
                        <th><center>nama</center></th>
                        <th><center>alamat </center></th>
                         <th><center>username </center></th>
                                                <th><i class="icon_cogs"></i> Action</th>
                                              </tr>
                                        </thead>
                                        <tbody>
            
                                             <?php
                                                  include'koneksi.php';
                                                  $no = 1;
                                                  $sql = mysqli_query($koneksi, "select * from admin where level='Admin'");
                                                    while($data = mysqli_fetch_array($sql)){
                                                  

                                                  
                                                ?>

                                            <tr class="table-white">
                                                <td><?php echo $no++;  ?></td>
                                             
                    <td><center><?php echo $data['id_user'];?></center></td>
                    <td><center><?php echo $data['nama'];?></center></td>
                     <td><center><?php echo $data['alamat'];?></center></td>
                      <td><center><?php echo $data['username'];?></center></td>
                                                <td>
                                                  <div class="btn-group">
                                                    <a class="btn btn-success" href="#" type="button" class="btn btn-sm btn-secondary btn-xs" data-toggle="modal" data-target="#ubah<?php echo $data['id_user']; ?>"><i class="fa fa-edit">Edit</i></a> &nbsp;
                                                    <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')"  href="data_admin.php?aksi=hapus&id=<?php echo $data['id_user']; ?>" class="btn btn-sm btn-danger" title=""><i class="fa fa-trash">Hapus</i></a>



                                                  </div>
                                                </td>
                                            </tr>
            <!-- Edit Modal !-->
                <div id="ubah<?php echo $data['id_user']; ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            
                            <h4 class="modal-title">Edit Data Kerusakan</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                            <div class="modal-body">
                                <form method="POST" action="">
                                <?php
                                  $id_user = $data['id_user']; 
                                  $query_edit = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_user='$id_user'");
                                    while ($row = mysqli_fetch_array($query_edit)) {  
                                  ?>

                                    <div class="form-group">
                                      <label class="control-label" for="kd_kerusakan">Id user</label>
                                      <input name="id_user" type="text" id="id_user" class="form-control" value="<?php echo $row['id_user']; ?>" placeholder="Auto Number" autocomplete="off" autofocus="on" readonly="readonly" />
                                    </div> 

                                    <div class="form-group">
                                      <label class="control-label" for="kerusakan">Nama Admin</label>
                                      <input name="nama" type="text" id="nama" class="form-control" value="<?php echo $row['nama']; ?>" placeholder="Nama Admin" autocomplete="off" required />
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="solusi">alamat</label>
                                      <input name="alamat" type="text" id="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" placeholder="Alamat" autocomplete="off" required />
                                    </div>

                                      <div class="form-group">
                                      <label class="control-label" for="solusi">username</label>
                                 <input name="username" type="text" id="username" class="form-control" value="<?php echo $row['username']; ?>" placeholder="Username" autocomplete="off" required />
                                    </div>

                                      <div class="form-group">
                                      <label class="control-label" for="solusi">password</label>
                                     <input name="password" type="text" id="password" class="form-control" value="<?php echo $row['password']; ?>"  placeholder="Password" autocomplete="off" required />
                                    </div>


                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-success" name="ubah">Update</button>
                                    </div>
                                        <?php
                                      }
                                      ?>

                            </div>

                                </form>
                            </div>
                            <?php
                                  }
                                  ?>
                                        </tbody>
                                       
                                    </table>
                                        <?php
                                          if (isset($_POST['ubah'])){


                                             $id_user        = $_POST['id_user'];
                                             $nama           = $_POST['nama'];
                                             $alamat         = $_POST['alamat'];
                                             $username       = $_POST['username'];
                             
                                             $password = md5($_POST['password']);
                                             $level          = 'Admin';

                                           
                                           
                                            
                                          
                                            $ubah = mysqli_query($koneksi,"UPDATE admin SET nama='$nama', alamat='$alamat', username='$username', password='$password', level='$level' WHERE id_user='$id_user'"); 


                                            if($ubah){
                                              ?>
                                              <script type="text/javascript">
                                              alert('Edit Data Berhasil');
                                                document.location.href="data_admin.php";
                                               </script>
                                               <?php
                                              }else{
                                                echo"Gagal Mengedit Data";
                                              } 
                                            
                                          }
                                        ?> 
                                </div>
            <!--Tambah Modal -->
                  <div id="tambah" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Tambah Data Admin</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                <form method="POST" action="">
                                  <div class="modal-body">
                                <?php
                           
                                  $query_edit1 = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_user=(SELECT MAX(id_user) FROM admin)");
                                  while ($ok = mysqli_fetch_array($query_edit1)) { 
                                      $id_user= $ok['id_user']+1; 
                                  
                                  }
                                  ?>

                                   <div class="form-group">
                                      <label class="control-label" for="id_user">id_user</label>
                                      <input name="id_user" type="text" id="id_user" class="form-control" placeholder="Tidak perlu di isi" value="<?php $a="D"; $b=rand(1000,10000); $c=$a.$b; echo $c; ?>" autofocus="on" readonly="readonly" />
                                    </div> 

                                    <div class="form-group">
                                      <label class="control-label" for="kerusakan">Nama pengguna</label>
                                      <input name="nama" type="text" id="nama" class="form-control" placeholder="nama" autocomplete="off" required />
                                    </div>

                                    <div class="form-group">
                                      <label class="control-label" for="solusi">alamat</label>
                                       <input name="alamat" type="text" id="alamat" class="form-control" placeholder="alamat" autocomplete="off" required />
                                    </div>

                                      <div class="form-group">
                                      <label class="control-label" for="solusi">username</label>
                                        <input name="username" type="text" id="username" class="form-control" placeholder="username" autocomplete="off" required /></div>

                                      <div class="form-group">
                                      <label class="control-label" for="solusi">password</label>
                                       <input name="password" type="text" id="password" class="form-control" placeholder="Password" autocomplete="off" required />
                                    </div>


                                      


                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-danger">Reset</button>
                                      <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                                    </div>

                                  </div>
                                </form>

                                <?php
                                    if (isset($_POST['simpan'])){

                                   

                                    $id_user        = $_POST['id_user'];
                                    $nama           = $_POST['nama'];
                                    $alamat         = $_POST['alamat'];
                                    $username       = $_POST['username'];
                                    $password = md5($_POST['password']);
                                    $level          = "Admin";
                                    
                                      $tambah = mysqli_query($koneksi,"INSERT INTO admin (id_user, nama, alamat, username, password, level) VALUES ('$id_user', '$nama', '$alamat', '$username', '$password', '$level')"); 

                                      if($tambah){
                                        ?>
                                        <script type="text/javascript">
                                        alert('Input Data Berhasil');
                                          document.location.href="data_admin.php";
                                         </script>
                                         <?php
                                        }else{
                                          echo"Gagal Menginput Data";
                                        } 
                                    }
                                  ?>

                      </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
