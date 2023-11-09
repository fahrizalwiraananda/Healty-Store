<?php 

session_start();
//skrip koneksi
$koneksi = new mysqli("localhost","root","","health_store");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin || Login</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <br /><br />
                <h1 style="color:#4b7bec;"> Halo Admin</h1>
            </div>
            <div class="col-md-12">
                <h3><i class="fa fa-home"></i> Welcome to Healthy Store</h3>
                <br>
            </div>
        </div>
         <div class="row ">
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background: #4b7bec;">
                        <strong>  Enter Details To Login </strong>  
                            </div>
                            <div class="panel-body" style="background: #DCDCDC;">
                                <form role="form" method="POST">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                            <input type="text" class="form-control" name="user" placeholder="Your Username ">
                                        </div>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  name="pass" placeholder="Your Password">
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label> <br>
                                            <!-- <span class="pull-right">
                                                   <a href="#" >Forget password ? </a> 
                                            </span> -->
                                        </div>
                                     <br>
                                    <button class="btn btn-primary" name="login">Login</button>
                                    <hr />
                                    <!-- Not register ? <a href="registeration.php" >click here </a> 
                                    </form> -->
                                    <?php 
                                    if (isset($_POST['login'])) {
                                        $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[user]' AND password='$_POST[pass]'");
                                        $yangcocok = $ambil->num_rows;
                                        if ($yangcocok==1) {
                                            $_SESSION['admin'] = $ambil->fetch_assoc();
                                            echo "<div class='alert alert-info'>Login sukses</div>";
                                            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                        }
                                        else{
                                            echo "<div class='alert alert-danger'>Login gagal</div>";
                                            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                        }
                                    }

                                     ?>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->

    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
