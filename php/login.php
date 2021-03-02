<?php
session_start();
require '../function.php';
if(isset($_SESSION['login-session'])){
    header("Location:../index.php");
    exit;
}
if(isset($_POST['submit'])){
    Login();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/login.css">
        <title>Login</title>
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
                        <label for="username">Masukan Username:</label>
                        <input type="text" name="username" id="username" required autocomplete="off">
                    </li>
                    <li>
                        <label for="password">Masukan Password:</label>
                        <input type="password" name="password_user" id="password" required autocomplete="off">
                    </li>
                    <li>
                        <label for="remember">Ingat Saya</label>
                        <input type="checkbox" name="remember" id="remember">
                    </li>
                    <li>
                        <button type="submit" name="submit" class="submit">Login</button>
                    </li>
                </ul>
            </form>
            <p class="footer">if you Dont have account</p>
            <a href="register.php" class="login">Register</a>
        </div>
    </body>
</html>