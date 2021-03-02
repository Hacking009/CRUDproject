<?php 
session_start();
require '../function.php';
if(isset($_SESSION['login-session'])){
    header("Location:../index.php");
    exit;
}
if(isset($_POST['submit'])){
    if(Register()>0){
        echo "
            <script>
                alert('Register Berhasil');
            </script>
        ";
        $_SESSION['login-session']=true;
        header("Location:../index.php");
        exit;
    }
    // else{
    //     echo "
    //         <script>
    //             alert('Register Gagal');
    //         </script>
    //     ";
    // }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/register.css">
        <title>Register</title>
        <style>
            .form{
                text-align: center;
                margin-top: 60px;
                margin-left: -25px;
            }
            .form a{
                margin: auto;
            }
            .login{
                display: block;
                padding: 10px;
                width: 150px;
                transform: translate(20px,0px);
                background-color: rgb(255, 102, 102);
                color: white;
                border-radius: 10px;
                opacity: 0.5;
                transition: all 0.7s;
            }
            .login:hover{
                opacity: 1;
            }
            .submit{
                margin-top: 20px;
                background-color: rgb(51, 204, 51);
                border: none;
                padding: 10px 55px;
                border-radius: 10px;
                cursor: pointer;
                box-shadow: 0px 7px #009933;
                outline: none;
                position: relative; 
            }
            .submit:active{
                box-shadow: none;
                top: 7px;
            }
            .footer,.login{
                margin-top: 100px;
            }
            #warning{
                margin-left: -5px;
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <a href=""><h2>TabelSiswa<span>.</span>Com</h2></a>
        </div>
        <!--Batas Header-->
        <div class="form">
            <h1 class="h1"><a href="" class="logo"><h2>TabelSiswa<span>.</span>Com</h2></a></h1>
            <form action="" method="POST">
                <ul>
                    <li>
                        <label for="name">Masukan Nama:</label>
                        <input type="text" name="nama" id="name" required autocomplete="off">
                    </li>
                    <li>
                        <label for="username">Masukan Username:</label>
                        <input type="text" name="username" id="username" required autocomplete="off">
                    </li>
                    <li>
                        <label for="password">Masukan Password:</label>
                        <input type="password" name="password_user" id="password" required autocomplete="off">
                    </li>
                    <li>
                        <?php if($bool): ?>
                        <p id="warning">*Maaf Username sudah Dipakai</p>
                        <?php endif; ?>
                        <button type="submit" name="submit" class="submit">Register</button>
                    </li>
                </ul>
            </form>
            <p class="footer">if you have account</p>
            <a href="login.php" class="login">Login</a>
        </div>
    </body>
</html>