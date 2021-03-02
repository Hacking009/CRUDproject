<?php
$bool=false;
$conn=mysqli_connect("localhost","root","","mydata");

function query($query){
    global $conn;
    $data=[];
    $result=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($result)){
        $data[]=$row;
    }
    return $data;
}

function tambahData($tipeArray){
    global $conn;
    $gambar=upload();
    if(!$gambar){
        return false;
    }
    $nama=htmlspecialchars($tipeArray['nama']);
    $jenisKelamin=htmlspecialchars(strtolower($tipeArray['jenis_kelamin']));
    $umur=htmlspecialchars($tipeArray['umur_siswa']);
    $tglLahir=htmlspecialchars($tipeArray['tgl_lahir']);
    $query="INSERT INTO siswa VALUES(
        '','$nama','$tglLahir','$umur','$gambar','$jenisKelamin'
        )";
    mysqli_query($conn,$query);

    //mengembalikan nilai 1 atau -1 ini cocok untuk kondisi 
    //berhasil atau tidak
    return mysqli_affected_rows($conn);

}

function hapusData($idData){
    global $conn;
    $id=$idData;
    $query="DELETE FROM siswa WHERE id='$id'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function ubahData($id,$tipeArray){
    global $conn;
    $gambar=upload();
    if(!$gambar){
        return false;
    }
    $nama=htmlspecialchars($tipeArray['nama_siswa']);
    $jenisKelamin=htmlspecialchars(strtolower($tipeArray['jenis_kelamin']));
    $umur=htmlspecialchars($tipeArray['umur_siswa']);
    $tglLahir=htmlspecialchars($tipeArray['tgl_lahir']);
    $query="UPDATE siswa SET nama_siswa='$nama',jenis_kelamin='$jenisKelamin'
    ,umur_siswa='$umur',tgl_lahir='$tglLahir',gambar='$gambar' WHERE id='$id'";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function Search($keyword){
    global $conn;
    $query="SELECT * FROM siswa WHERE nama_siswa LIKE '%$keyword%' OR 
    jenis_kelamin LIKE '%$keyword%' OR tgl_lahir LIKE '%$keyword%' 
    OR umur_siswa LIKE '%$keyword%'";
    mysqli_query($conn,$query);

    //timpa arguments function query diatas
    return query($query);
}

function upload(){
    $nama_gambar=$_FILES['gambar']['name'];
    $tmp_gambar=$_FILES['gambar']['tmp_name'];

    $ekstensiValid=['jpg','jpeg','png'];
    $nama_gambar_baru=explode('.',$nama_gambar);
    $nama_gambar_baru=strtolower(end($nama_gambar_baru));
    if(!in_array($nama_gambar_baru,$ekstensiValid)){
        echo "
            <script>
                alert('Yang Anda Upload Bukan Gambar');
            </script>
        ";
        return false;
    }
    $dirUpload='../img/';

    $upload_gambar=move_uploaded_file($tmp_gambar,$dirUpload.$nama_gambar);
    if($upload_gambar){
        echo "
            <script>
                alert('Upload Gambar Berhasil');
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Upload Gambar Gagal');
            </script>
        ";
        return false;
    }

    return $nama_gambar;
}

function Register(){
    global $bool;
    global $conn;
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password_user'];

    //periksa username agar tidak sama dengan yang ada didatabase
    $query="SELECT * FROM user_data WHERE username='$username'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        // echo "
        // <script>
        //     alert('Maaf Username Sudah ada');
        // </script>
        // ";
        $bool=true;
        return false;

    }
    //enkripsi password
    $password_new=password_hash($password,PASSWORD_DEFAULT);

    $query="INSERT INTO user_data VALUES('','$nama','$username','$password_new')";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function Login(){
    global $conn;
    $username=$_POST['username'];
    $password=$_POST['password_user'];

    $query="SELECT * FROM user_data WHERE username='$username'";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)===1){
        $data=mysqli_fetch_assoc($result);
        if(!password_verify($password,$data['password_user'])){
            echo "
            <script>
            alert('Password Anda salah');
            </script>
            ";
            return false;
        }else{
            $_SESSION['login-session']=true;
            if(isset($_POST['remember'])){
                setcookie('login','true');
            }
        }
        header("Location:../index.php");
        exit;
    }else{
        echo "
            <script>
                alert('Akun Anda Belum Terdaftar');
            </script>
        ";
    }
}

function orderBy($by,$orderMethod){
    global $conn;
    $query="SELECT * FROM siswa ORDER BY $by $orderMethod";
    mysqli_query($conn,$query);
    return query($query);
    //perbaiki method ini
}
?>