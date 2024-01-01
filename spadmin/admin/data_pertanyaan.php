
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
            <h1 class="m-0">Data Pertanyaan</h1>
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
             if(isset($_GET['aksi']) == 'hapus'){
        $kd_gejala = $_GET['kd_gejala'];
        $cek = mysqli_query($koneksi, "SELECT * FROM gejala WHERE kd_gejala='$kd_gejala'");
        if(mysqli_num_rows($cek) == 0){

          
        }else{
          $delete = mysqli_query($koneksi, "DELETE FROM gejala WHERE kd_gejala='$kd_gejala'");
          if($delete){
            
              echo "<script>alert('Data Berhasil di hapus gan!'); window.location = 'data_pertanyaan.php'</script>";



          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
        }
      }
      ?>




                  <table id="zero_config" class="table">
                                        <thead>
                                              <tr>
                                                <th><i class=""></i> NO</th>
                                                <th><i class=""></i>Kode Pertanyaan</th>
                                                <th><i class=""></i>Pertanyaan</th>
                                                <th><i class="icon_cogs"></i> Action</th>
                                              </tr>
                                        </thead>
                                        <tbody>
            
                                             <?php
                                                  include'koneksi.php';
                                                  $no = 1;
                                                  $sql = mysqli_query($koneksi, "SELECT * from gejala ");
                                                    while($data = mysqli_fetch_array($sql)){
                          

                                                  
                                                ?>

                                            <tr class="table-white">
                                                <td><?php echo $no++;  ?></td>
                                                <td><?php echo $data['kd_gejala']; ?></td>
                                                <td><?php echo $data['gejala']; ?></td>
                                                <td>
                                                  <div class="btn-group">
                                                    <a class="btn btn-success" href="#" type="button" class="btn btn-sm btn-secondary btn-xs" data-toggle="modal" data-target="#ubah<?php echo $data['id_g']; ?>"><i class="fa fa-edit">Edit</i></a> &nbsp;
                                                   <a class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')"  href="data_pertanyaan.php?aksi=hapus&kd_gejala=<?php echo $data['kd_gejala']; ?>" class="btn btn-sm btn-danger" title=""><i class="fa fa-trash">Hapus</i></a>
                                                  </div>
                                                </td>
                                            </tr>
            <!-- Edit Modal !-->
                <div id="ubah<?php echo $data['id_g']; ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Edit pertanyaan</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                            <div class="modal-body">
                                <form method="POST" action="">
                                <?php
                                  $id_g = $data['id_g']; 
                                  $query_edit = mysqli_query($koneksi, "SELECT * FROM gejala WHERE id_g='$id_g'");
                                    while ($row = mysqli_fetch_array($query_edit)) {  
                                  ?>

                                    <div class="form-group">
                                      <label class="control-label" for="kd_gejala">Kode pertanyaan</label>
                                      <input type="text" name="kd_gejala" class="form-control" id="kd_gejala" value="<?php echo $data['kd_gejala'] ?>" required="" readonly="">
                                    </div> 

                                    <div class="form-group">
                                      <label class="control-label" for="gejala">Pertanyaan</label>
                                      <input type="text" name="gejala" class="form-control" id="gejala" value="<?php echo $data['gejala'] ?>" required="">
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
                                       
                                    </table> <?php
                                          if (isset($_POST['ubah'])){
                                            $kd_gejala = $_POST['kd_gejala'];
                                            $gejala = $_POST['gejala'];
                                           
                                            
                                          
                                            $ubah = mysqli_query($koneksi,"UPDATE gejala SET gejala='$gejala', kd_gejala='$kd_gejala' WHERE id_g='$id_g' "); 
                                            if($ubah){
                                              ?>
                                              <script type="text/javascript">
                                              alert('Edit Data Berhasil');
                                                document.location.href="data_pertanyaan.php?page=gejala";
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
                                    <h4 class="modal-title">Tambah pertanyaan</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                <form method="POST" action="">
                                  <div class="modal-body">


                                   <?php
                           
                                  $query_edit1 = mysqli_query($koneksi, "SELECT * FROM gejala WHERE id_g=(SELECT MAX(id_g) FROM gejala)");
                                  while ($ok = mysqli_fetch_array($query_edit1)) { 
                                      $kd_ok= $ok['id_g']+1; 
                                  
                                  }
                                  ?>


                                    <div class="form-group">
                                      <label class="control-label" for="kd_gejala">Kode pertanyaan</label>
                                      <input type="text" name="kd_gejala" class="form-control" id="kd_gejala" required="" value="G<?=$kd_ok;?>" readonly="">
                                    </div> 


                                    <div class="form-group">
                                      <label class="control-label" for="gejala">Pertanyaan</label>
                                      <input type="text" name="gejala" class="form-control" id="gejala" required="">
                                    </div>

                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-danger">Reset</button>
                                      <button type="submit" class="btn btn-success" name="simpan">Simpan</button>
                                    </div>

                                  </div>
                                </form>

                                <?php
                                    if (isset($_POST['simpan'])){
                                      $kd_gejala = $_POST['kd_gejala'];
                                      $gejala = $_POST['gejala'];
                                      
                                    
                                      $tambah = mysqli_query($koneksi,"INSERT INTO gejala (kd_gejala, gejala)
                                                VALUES('$kd_gejala','$gejala')"); 
                                      if($tambah){
                                        ?>
                                        <script type="text/javascript">
                                        alert('Input Data Berhasil');
                                          document.location.href="data_pertanyaan.php";
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
