<?php 
    
    session_start();

    require 'function.php';

    //cek cookie
    if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];

        //ambil username dari id
        $result = mysqli_query($conn, "select * from user where id = '$id'");
        $row = mysqli_fetch_assoc($result);

        //cek cookie dan username
        if ($key === hash('sha256', $row['username'])) {
            $_SESSION['login'] = true;
        }
    }


    if (isset($_SESSION["pelanggan"])) {
        header("Location: beranda.php");
        exit;
    }


    if( isset($_POST["login"]) ) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "select * from pelanggan where email = '$email'");

        //cek username
        if (mysqli_num_rows($result) === 1 ) {
            //cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                //set session 
                $_SESSION["pelanggan"] = $row;

                //cek rememeber me
                if (isset($_POST['remember'])) {
                    //buat cookie
                    setcookie('id', $row['id'], time() + (60 * 60 * 24 * 5), '/');
                    setcookie('key', hash('sha256', $row['email']), time() + (60 * 60 * 24 * 5), '/');
                }

                header("Location: beranda.php");
                exit;
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Masuk</title>
	<link rel="stylesheet" href="../css/style-login.css">
         <!--Icon-->
     <link rel="shortcut icon" href="../assets/logo-store.png">
</head>
<body>
	<div class="container fadeInDown">
		<div class="container-left">
            <img src="../assets/l.jpg" alt="form-login">
            <h1>Hai, Selamat Datang !</h1>
            <p>Temukan dan beli produk yang kamu cari di Healty<strong>Store</strong> !</p>
		</div>
		<div class="container-right">
            <h2>MASUK</h2>
            <form method="post">
                <div class="input">
                    <input type="email" name="email" placeholder="Email">
                </div>		  	
                <div class="input">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <label for="checkbox" ><input type="checkbox" name="remember" id="checkbox">Ingat Saya !</label>

                <button type="submit" name="login">Masuk</button>

                <p>Belum punya akun ? <a href="sign-up.php">Buat Akun</a></p>
            </form>	
		</div>
	</div>
</body>
</html>