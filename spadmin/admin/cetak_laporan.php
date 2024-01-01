
<?php 


include 'koneksidb.php'; 


?>


<?php
             
                $no=0;
                $mulai   = $_GET['awal'];
                $selesai = $_GET['akhir'];
              

                    $sql="select * FROM tbobat_keluar INNER JOIN  supplier ON tbobat_keluar.id_supplier = supplier.id_supplier INNER JOIN  data_obat ON tbobat_keluar.id_obat = data_obat.id_obat AND 
                     tbobat_keluar.tgl_keluar BETWEEN '$mulai' AND '$selesai' ORDER BY tbobat_keluar.id_obatkeluar DESC";


                $ress = mysqli_query($kon, $sql);

              ?>


<html>

<head>
  <title>Laporan Transaksi obat Keluar RSU An Ni'mah Wangon</title>







  <div class="box-body">
    <div class="form-panel">
      <table width="100%">



        <html lang="en">

        <head>


          <title><?php echo $pagetitle ?></title>

          <link href="foto/logo.png" rel="icon" type="images/x-icon">



        </head>

<body>
  <section id="header-kop">
    <div class="container-fluid">
      <table class="table border">
        <tbody>


          <tr>
            <left>

            </left>



            <center>

              <b>Laporan Transaksi  Obat Keluar </b> <br>
              RSU An Ni'mah Wangon<br>
             <br>

            </center>


            </td>
          </tr>
        </tbody>
      </table>


      </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Tanggal Cetak  :  <?php
 $tgl=date('d-m-Y');
 echo $tgl;
 ?></b><br> 
          <br>
           <br>

          <table width="20%">

                    
 
  


   


   
  <tr>
    <tr>
    <td width="40%"><b>Dari Tgl</b></td>
    <td width="2%"><b> : </b></td>
    <td width="20%"> <?php echo $mulai;?></td>
   
</tr>


 <tr>
    <tr>
    <td width="40%"><b>Sampai Tgl</b></td>
    <td width="2%"><b> : </b></td>
    <td width="20%"> <?php echo $selesai;?></td>
   

   

</tr>



  </td>
   
  </tr>
 
</table>


      <hr class="line-top" />
    </div>
  </section>
  <section id="body-of-report">
    <div class="container-fluid">

   

      <table border style="width: 100%">
        <thead>
          <tr>




           <th width="1%">No</th>
                     <th><left>no transaksi</left></th>
                        <th><left>tanggal keluar</left></th>
                             <th><left>supllier</left></th>
                         <th><left>nama obat</left></th>
                        <th><left>jumlah keluar</left></th>
                      

          </tr>
        </thead>
     <?php 

                      $i = 0;
                     
                     while($data=mysqli_fetch_array($ress)) { 

                     $i++; 
                      ?>
          <tbody>
            <tr>

              <td><center><?php echo $i; ?></center></td>
                        
                                
                       <td><left><?php echo $data['id_obatkeluar']; ?></left></td>
                      <td><left><?php echo $data['tgl_keluar']; ?></left></td>
                    <td><left><?php echo $data['nama_supplier']; ?></left></td>
                    <td><left><?php echo $data['nama_obat']; ?></left></td>
                    <td><left><?php echo $data['jumlah_keluar']; ?></left></td>
                     

            <tr>












            <?php
          }
            ?>
          </tbody>



      </table>

    </div>
    </div>
    </div>
    </div>

    <script>
      window.print();
    </script>

</body>

</html>