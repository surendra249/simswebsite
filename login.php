<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('db.php');
$error='';
session_start();
if(isset($_POST['submit'])){
	$username=$_POST['login_name'];
	$password= md5($_POST['password']);
	$email=$_POST['login_name'];
	$sql="SELECT * FROM admin_user WHERE (username = '$username' OR email = '$email') AND password = '$password'";
	$result=mysqli_query($con,$sql);
	$count=mysqli_num_rows($result);
	if($count>0){
		$row=mysqli_fetch_assoc($result);
        $_SESSION['submit']=$username; // hold the user name in session and can be used when need to display in other page.
		$_SESSION['ROLE']=$row['role'];
		$_SESSION['Status']=$row['Status'];// hold the status in session
		$_SESSION['role']=$row['role'];		// hold the role in session
        $uip=$_SERVER['REMOTE_ADDR'];// hold the ipaddress in session
		$_SESSION['IS_LOGIN']='yes';
		if($row['Status']=='Blocked'){
			header("refresh:1;url=logout.php");
			echo 'user was blocked';
			die();
		}
		if($row['role']==1){
			mysqli_query($con,"insert into userlog(Role,username,userIp) values('".$_SESSION['role']."','".$_SESSION['submit']."','$uip')");
			header('location:pages/index.php');
			die();
		}if($row['role']==2){
			mysqli_query($con,"insert into userlog(Role,username,userIp) values('".$_SESSION['role']."','".$_SESSION['submit']."','$uip')");
			header('location:pages/news.php');
			die();
		}
	}
	else{
		
		$_SESSION['submit']=false;
        header("refresh:2;url=login.php");
		$error='Please enter correct login details';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Login</title>
      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin.css" rel="stylesheet">
   </head>
   <body class="bg-dark">
      <div class="container">
         <div class="card card-login mx-auto mt150">
            <div class="card-header">Login</div>
            <div class="card-body">
               <form method="post">
                  <div class="form-group">
                     <div class="form-label-group">
                        <input type="login_name" name="login_name" class="form-control"  required="required">
                        <label for="login_name">Username or Email</label>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="form-label-group">
                        <input type="password" name="password" class="form-control"  required="required">
                        <label for="inputPassword">Password</label>
                     </div>
                  </div>
				  <div class="form-group">
				  <div class="form-label-group">
					<a class="d-block small" href="pages/pass_reset.php?id=?">Forgot Password?</a>
				</div>
				</div>
                  <input type="submit" name="submit" class="btn btn-primary btn-block">
				  <?php echo $error?>
				  <p></p>
 <form>
  
			</div>
		</div>
	  </div>
						<!-- Bootstrap core JavaScript-->
						<script src="vendor/jquery/jquery.min.js"></script>
						<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
						<!-- Core plugin JavaScript-->
						<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
   </body>
</html>	

