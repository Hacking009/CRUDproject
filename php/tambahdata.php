<?php 
require '../function.php';
if(isset($_POST['submit'])){
    if(tambahData(tipeArray:$_POST)>0){
        echo "
        <script>
            alert('Tambah Data Siswa Berhasil');
            document.location.href='../index.php';
        </script>
        ";
    }
    else{
        echo "
        <script>
            alert('Tambah Data Siswa Gagal');
        </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/tambahdata.css">
        <title>Tambah Siswa</title>
        <style>
            .back{
                color: salmon;
                margin-left: 20px;
            }
        </style>
    </head>
    <body>
        <div class="header">
        <a href="../index.php"><h2>TabelSiswa<span>.</span>Com</h2></a>
        </div>
        <div class="content">
            <form action="" method="POST" enctype="multipart/form-data">
                <ul>
                    <li>
                        <label for="nama">Masukan nama Siswa:</label>
                        <input type="text" name="nama" id="nama" autocomplete="off">
                    </li>
                    <li>
                        <label for="jenisKelamin">Masukan Jenis Kelamin Siswa:</label>
                        <input type="text" name="jenis_kelamin" id="jenisKelamin" autocomplete="off">
                    </li>
                    <li>
                        <label for="umur">Masukan Umur Siswa:</label>
                        <input type="text" name="umur_siswa" id="umur" autocomplete="off">
                    </li>
                    <li>
                        <label for="tglLahir">Masukan Tanggal Lahir Siswa:</label>
                        <input type="text" name="tgl_lahir" id="tglLahir" autocomplete="off">
                    </li>
                    <li>
                        <label for="gambar">Pilih Gambar</label>
                        <input type="file" name="gambar" class="gambar"> 
                    </li>
                    <li>
                        <button type="submit" name="submit">Tambah Data</button>
                    </li>
                </ul>
            </form>
            <a href="../index.php" class="back">Kembali</a>
        </div>
    </body>
</html>