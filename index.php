<?php
session_start();
require 'function.php';
//jika session tidak ada
if(!isset($_SESSION['login-session'])){
    header("Location: php/login.php");
    exit;
}

//pageination

$siswa=query("SELECT * FROM siswa LIMIT 0,3");
//search
if(isset($_POST['submit'])){
    $siswa=search($_POST['search']);
}
if(isset($_POST['orderId'])){
    //lanjutkan
    orderBy(orderMethod:'ASC',by:'umur_siswa');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/indexstyle.css">
        <title>Tabel Siswa</title>
        <style>
            .content table tr td{
                background-color: lightblue;
            }
            .content table tr th{
                background-color: lightcoral;
            }
            .search{
            text-align: center;
            }
            input{
                border-radius: 10px;
                width: 250px;
                height: 20px;
            }
            .header h4{
                margin-top: -50px;
                margin-right: 50px;
                float: right;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <a href="index.php"><h2>TabelSiswa<span>.</span>Com</h2></a>
            <h4><a href="php/logout.php">Logout</a></h4>
        </div>
        <!--batas header-->
        <br>
        <div class="search">
            <form action="" method="POST">
                <input type="text" class="search" name="search" autocomplete="off">
                <button type="submit" name="submit">Cari</button>
            </form>
        </div>
        <div class="content">
            <form action="php/tambahdata.php">
                <button type="submit" class="add-button">Tambah Data</button>
            </form>
            <table border="1" cellpadding="5px">
                <tr>
                        <th>Action</th>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                </tr>
                <?php $i=1 ?>
                <?php foreach($siswa as $sw): ?>
                <tr>
                    <td>
                        <a href="php/ubahData.php?id=<?php echo $sw['id'] ?>">Ubah|</a>
                        <a href="php/hapusData.php?id=<?php echo $sw['id']?>">|Hapus</a>
                    </td>
                    <td><?php echo $i ?></td>
                    <td><img src="img/<?php echo $sw['gambar'] ?>" alt="Gambar" style="width: 100px; height:100px;"></td>
                    <td><?php echo $sw['nama_siswa'] ?></td>
                    <td><?php echo $sw['umur_siswa'] ?></td>
                    <td><?php echo $sw['jenis_kelamin'] ?></td>
                    <td><?php echo $sw['tgl_lahir'] ?></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>