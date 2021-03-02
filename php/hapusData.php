<?php 
require '../function.php';
mysqli_connect("localhost","root","","mydata");
if(hapusData($_GET['id'])>0){
    echo "
    <script>
        alert('Hapus Data Siswa Berhasil');
        document.location.href='../index.php';
    </script>
    "; 
}
else{
    echo "
        <script>
            alert('Hapus Data Siswa Gagal');
            document.location.href='../index.php';
        </script>
        ";
}
?>