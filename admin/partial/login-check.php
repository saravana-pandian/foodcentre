<?php 


//autherization or access control
//cehck weather user ism loggef or not 
	if (!isset($_SESSION['user'])) {  
	    ////if user session is not set
		//user is not lgged in
			$_SESSION['no-login-message']="<div class='text-center'>! Login access denied !<br></div>";
			header('location:'.SETURL.'admin/login.php');
		//redirect to login page
	}

 ?>
