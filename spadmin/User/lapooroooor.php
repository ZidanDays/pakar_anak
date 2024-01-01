
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
            <h1 class="m-0">Laporan Data Transaksi Obat Masuk </h1>
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
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Laporan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                     <form method="get" name="laporan" onSubmit="return valid();"> 
                <div class="card-body">
                  <div class="form-group">
                     <label>Tanggal Awal</label>
                    <input type="date" class="form-control" name="awal" placeholder="From Date(yyyy/mm/dd)"  value="<?php echo $mulai; ?>" required>
                  </div>
                  <div class="form-group">
                     <label>Tanggal Akhir</label>
                    <input type="date" class="form-control" name="akhir" placeholder="To Date(yyyy/mm/dd)" value="<?php echo $selesai; ?>"  required>
                  </div>
                 
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit"  name="submit"  class="btn btn-primary">Lihat Laporan</button>




                </div>


              </form>
            </div>


         



    <?php
              if(isset($_GET['submit'])){
                $no=0;
                $mulai   = $_GET['awal'];
                $selesai = $_GET['akhir'];
              

             


                    $sql="select * FROM tbobat_masuk INNER JOIN  supplier ON tbobat_masuk.id_supplier = supplier.id_supplier INNER JOIN  data_obat ON tbobat_masuk.id_obat = data_obat.id_obat AND 
                     tbobat_masuk.tgl_masuk BETWEEN '$mulai' AND '$selesai' ORDER BY tbobat_masuk.id_obatmasuk DESC";



                $ress = mysqli_query($kon, $sql);
              ?>


        <div class="card">
              <div class="card-header">

         

                <h3 class="card-title">Striped Full Width Table</h3>
              </div>



<div class="card-body p-0">


                <table class="table table-sm">
                  <thead>
                    <tr>
                     <th><center>No </center></th>
                        <th><left>no transaksi</center></th>
                        <th><left>tanggal masuk</center></th>
                             <th><left>supllier</center></th>
                         <th><left>nama obat</center></th>
                        <th><left>jumlah masuk</center></th>
                       
                    </tr>
                  </thead>

                      <?php 

                      $i = 1;
                  
                     while($data=mysqli_fetch_array($ress)) { 

                     
                      ?>



                  <tbody>
                    <tr>
                        <td><center><?php echo $i; ?></center></td>
                        
                      <td><left><?php echo $data['id_obatmasuk']; ?></center></td>
                      <td><left><?php echo $data['tgl_masuk']; ?></center></td>
                    <td><left><?php echo $data['nama_supplier']; ?></center></td>
                    <td><left><?php echo $data['nama_obat']; ?></center></td>
                    <td><left><?php echo $data['jumlah']; ?></center></td>

                    </tr>

                     <?php   
              } 
              ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
 <?php }?>
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
