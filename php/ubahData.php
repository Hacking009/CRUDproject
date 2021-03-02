<?php 
require '../function.php';
mysqli_connect("localhost","root","","mydata");
$id=$_GET['id'];
$sw=query("SELECT * FROM siswa WHERE id='$id'")[0];
if(isset($_POST['submit'])){
    if(ubahData(id:$id,tipeArray:$_POST)){
        echo "
        <script>
            alert('Ubah Data Berhasil');
        </script>
        ";
    }
    else{
        echo "
        <script>
            alert('Ubah Data Siswa Gagal');
        </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/tambahdata.css">
        <title>Ubah Siswa</title>
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
                        <input type="text" name="nama_siswa" id="nama" value="<?php echo $sw['nama_siswa']?>" autocomplete="off">
                    </li>
                    <li>
                        <label for="jenisKelamin">Masukan Jenis Kelamin Siswa:</label>
                        <input type="text" name="jenis_kelamin" id="jenisKelamin" value="<?php echo $sw['jenis_kelamin']?>" autocomplete="off">
                    </li>
                    <li>
                        <label for="umur">Masukan Umur Siswa:</label>
                        <input type="text" name="umur_siswa" id="umur" value="<?php echo $sw['umur_siswa']?>" autocomplete="off">
                    </li>
                    <li>
                        <label for="tglLahir">Masukan Tanggal Lahir Siswa:</label>
                        <input type="text" name="tgl_lahir" id="tglLahir" value="<?php echo $sw['tgl_lahir']?>" autocomplete="off">
                    </li>
                    <li>
                        <label for="gambar">Pilih Gambar</label>
                        <input type="file" name="gambar" class="gambar" value="<?php echo $sw['gambar'] ?>"> 
                    </li>
                    <li>
                        <button type="submit" name="submit">Ubah Data</button>
                    </li>
                </ul>
            </form>
        </div>
        <a href="../index.php" style="color: blue; margin-left:10px;">Kembali Ke Tabel</a>
    </body>
</html>