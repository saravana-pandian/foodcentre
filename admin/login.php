<?php  include('../config/config.php'); ?>



<!DOCTYPE html>
<html>
<head>
	<title>Login - For Admin</title>
	<link rel="stylesheet" href="../css/admin.css">
</head>
<body>

	<div class="login">
		<h1 class="text-center">Login</h1><br><br><br>

		<?php 

		if (isset($_SESSION['login'])) {
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}
		if (isset($_SESSION['no-login-message'])) {
			echo $_SESSION['no-login-message'];
			unset($_SESSION['no-login-message']);
		}


		 ?>
<br>


		<div class="form-container">

		<form class="text-center" action="" method="POST">
	<b>	Username</b><br>
		<input type="text" name="username"><br><br><br>
		<b>Password</b><br>
		<input type="password" name="password" ><br>

		<input type="submit" name="submit" value="Login" class="btn-1"><br><br>
			
		</form>
	</div>


<br><br><br>

		<p class="text-center"><a >Created By Saravana</a></p>
	</div>

</body>
</html>


<?php 

//check weather button click or not
if (isset($_POST['submit'])) {
	//get login data from login form
	$username=$_POST['username'];
	$password=md5($_POST['password']);

	//sql to check weather the user name and pass match and exits
	$sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
	//excecute query
	$res=mysqli_query($conn, $sql);


	//tocheck weather its exists
	$count=mysqli_num_rows($res);
	if ($count==1) {
		//available login success
		$_SESSION['login']="Login Success";
		$_SESSION['user']=$username;
	//check user is logged or logout is unset it
		//redirect
		header('location:'.SETURL.'admin/');
	}
else {
	//not avaliable login failed
	$_SESSION['login']="<div class='text-center'>! Login Failed !<br></div>";
		//redirect

		header('location:'.SETURL.'admin/login.php');
}
}
 
 ?>