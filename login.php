<?php 
session_start();
include "koneksi.php";

if( isset($_SESSION["id_admin"])){
    header("Location: dashboard.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel='shortcut icon' href="dist/img/ivantory.png">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="dist/css/login.css">

    <title>Login Admin</title>
</head>
<body>
    <div class="box">
        <h2>Login Admin</h2>
        <?php 
            if(isset($_POST['login'])){
                $ambil  = $conn->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password = md5('$_POST[pass]') ");
                $abc    = $ambil->num_rows;

            if ($abc==1){
                $_SESSION['id_admin']=$ambil->fetch_assoc();
                echo "<div class='alert alert-success'>Login Sukses</div>";
                echo "<meta http-equiv='refresh' content='1;url=dashboard.php' >";
            }else{
                echo "<div class='alert alert-danger'>Username Atau Password Salah</div>";
            }
        } 
        ?>
        <form method="post">
            <div class="inputBox">
                <input type="text" name="user" required="required" autocomplete="off" />
                <label>Username</label>
            </div>
            <div class="inputBox">
                <input type="password" name="pass" required="required" />
                <label>Password</label>
            </div>
            <input type="submit" name="login" value="Masuk">
        </form>  
        <br />
        <br />
        <div class="footer">
            <a href="index.php"><h4>Halaman Utama</h4></a>
        </div>   
    </div>
        
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>