
<?php 


include 'koneksidb.php'; 




?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">


<form action="">
<div class="container">

<div class="panel panel-default">
<div class="panel-body">
  <div class="form-group">
    <label>Cari Nama Ibu Kota Provinsi:</label>
    <div>
 <select name="ibukota" class="selectpicker form-control" data-live-search="true">
   <?php 
                    $query2="select * from data_obat order by id_obat";
                    $tampil=mysqli_query($kon, $query2) or die(mysqli_error());
                    while($data1=mysqli_fetch_array($tampil))
                    {
                    ?>
                              
                                  
              
              <option value="<?php echo $data1['id_obat'];?>"><?php echo $data1['nama_obat'];?></option>
                <?php

                 } 

                 ?>
 </select>
 </div>
  </div>
</div>
</div>


</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>