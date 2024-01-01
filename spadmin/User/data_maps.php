
<?php 


include 'koneksi.php'; 
include 'template/header.php'; 

include 'template/sidebar.php'; 



?>
 <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Maps</h1>
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
             if(isset($_GET['aksi']) == 'hapus'){
        $id_supplier = $_GET['id_supplier'];
        $cek = mysqli_query($kon, "SELECT * FROM supplier WHERE id_supplier='$id_supplier'");
        if(mysqli_num_rows($cek) == 0){

          
        }else{
          $delete = mysqli_query($kon, "DELETE FROM supplier WHERE id_supplier='$id_supplier'");
          if($delete){
            
              echo "<script>alert('Data Berhasil di hapus gan!'); window.location = 'data_supplier.php'</script>";



          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
          }
        }
      }
      ?>


      <head>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAd3dSy2ivrW8j-Pmz12_bs2rwSaCapCx8&callback=initMap&callback=initialize" async defer></script>

</head>
<body>

  <div id="googleMap" style="width:1200px;height:500px;"></div>
  
</body>
                                    
                                </ol>
                            </nav>
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

<script type="text/javascript">   


  


    var marker;
    function initialize(){

      
        // Variabel untuk menyimpan informasi lokasi
        var infoWindow = new google.maps.InfoWindow;
        //  Variabel berisi properti tipe peta
        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
            
        } 
        // Pembuatan peta
        var peta = new google.maps.Map(document.getElementById('googleMap'), mapOptions);      
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();
        // Pengambilan data dari database MySQL
        <?php
        // Sesuaikan dengan konfigurasi koneksi Anda
            $host     = "localhost";
            $username = "root";
            $password = "";
            $Dbname   = "dbmobil";
            $db       = new mysqli($host,$username,$password,$Dbname);
            
            $query = $db->query("SELECT * FROM bengkel ORDER BY bengkel ASC");
            while ($row = $query->fetch_assoc()) {
                $bengkel = $row["bengkel"];
                $lat  = $row["latitude"];
                $long = $row["longitude"];
                echo "addMarker($lat, $long, '$bengkel');\n";
            }
        ?> 


        // Proses membuat marker 
        function addMarker(lat, lng, info){
            var bengkel = new google.maps.LatLng(lat, lng);
            bounds.extend(bengkel);
            var marker = new google.maps.Marker({
                map: peta,
                position: bengkel
            });       
            peta.fitBounds(bounds);
            bindInfoWindow(marker, peta, infoWindow, info);


         }
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, peta, infoWindow, html){
            google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(peta, marker);
          });



        }
    }
</script>


</body>
</html>
