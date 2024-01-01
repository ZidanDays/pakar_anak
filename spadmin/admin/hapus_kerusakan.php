<?php
   include"koneksi.php";
   $id_k = $_GET['id_k'];
   $sql = mysqli_query($koneksi,"DELETE FROM kerusakan WHERE id_k='$id_k'");

   if ($sql){
                  ?>
  
   					<script type="text/javascript">
                      alert("Data Berhasil Dihapus");
                      window.location.href="data_kerusakan.php?page=data_kerusakan";
                    </script>

                     <?php
                }

?>