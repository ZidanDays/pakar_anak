<?php
   include"koneksi.php";
   $id_g = $_GET['id_g'];
   $sql = mysqli_query($koneksi,"DELETE FROM gejala WHERE id_g='$id_g'");

   if ($sql){
                  ?>
  
   					<script type="text/javascript">
                      alert("Data Berhasil Dihapus");
                      window.location.href="data_gejala.php?page=data_gejala";
                    </script>

                     <?php
                }

?>