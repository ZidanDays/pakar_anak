<?php
   include"koneksi.php";
   $id_b = $_GET['id_b'];
   $sql = mysqli_query($koneksi,"DELETE FROM bengkel WHERE id_b='$id_b'");

   if ($sql){
                  ?>
  
   					<script type="text/javascript">
                      alert("Data Berhasil Dihapus");
                      window.location.href="data_bengkel.php?page=data_bengkel";
                    </script>

                     <?php
                }

?>