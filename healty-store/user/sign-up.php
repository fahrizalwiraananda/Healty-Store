<?php 

    require 'function.php';

    if( isset($_POST["registrasi"]) ) {

        if(registrasi($_POST) > 0 ) {
            echo"<script>
                    alert('Selamat ! Anda berhasil menambahkan user baru');
                </script>";
                echo"<script>
                alert('location='sign-in.php';');
            </script>";
        } else {

            echo mysqli_error($conn);

        }
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Daftar</title>
	<link rel="stylesheet" href="../css/style-login.css">
         <!--Icon-->
     <link rel="shortcut icon" href="../assets/logo-store.png">
</head>
<body>
	<div class="container fadeInDown">
		<div class="container-left">
            <img src="../assets/l.jpg" alt="form-login">
            <h1>Ayo Daftar !</h1>
            <p>Temukan dan beli produk yang kamu cari di Healty<strong>Store</strong> !</p>
		</div>
		<div class="container-right">
            <h2>Buat Akun</h2>
            <form action="" method="post">
                <div class="input">
                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                </div>	
                <div class="input">
                    <input type="text" name="telepon" placeholder="Telepon" required>
                </div>		  	
                <div class="input">
                    <input type="email" name="email" placeholder="Email" required>
                </div>                
                <div class="input">
                    <input type="password" name="password" placeholder="Password" required> 
                </div>		  	
                <div class="input">
                    <input type="password" name="password2" placeholder="Re-Password" required>
                </div>

                <div id="term">
                    <label for="checkbox" class="check"><input type="checkbox" name="" id="checkbox" required>Saya Setuju dengan <span>Syarat dan Ketentuan</span></label>
                </div>

                <button type="submit" name="registrasi">Daftar</button>

                <p>Punya akun ? <a href="sign-in.php">Masuk</a></p>
            </form>	
		
		</div>
	</div> 
</body>
</html>