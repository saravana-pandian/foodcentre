<?php include ('partial/menu.php'); ?>


	<div class="main-content">
		<div class="wrapper">
			<br>
			<h1>Change Password</h1>
			<br><br>
			<?php 

			if (isset($_GET['id'])) {
				$id=$_GET['id'];
			}

			 ?>


			<form action="" method="POST">
				<table class="tbl-wid">
					<tr>
						<td>Old Password: </td>
						<td>
							<input type="password" name="current_password" placeholder="Old Password">
						</td>
					</tr>
					<tr>
						<td>New Password:</td>
						<td>
							<input type="password" name="new_password" placeholder="New password">
						</td>
					</tr>
					<tr>
						<td>Confirm Passsword:</td>
						<td>
							<input type="password" name="confirm_password" placeholder="confirm Password">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="hidden" name="id" value="<?php echo $id ?>">
							<input type="submit" class="btn-secondary" name="submit" value="Change Password">

						</td>
					</tr>
				



				</table>
			</form>




</div></div>
<br><br>







<br><br>
<?php 

	if (isset($_POST['submit'])) {
		# code...
	//	echo "success";
		// get data from form
		$id=$_POST['id'];
		$current_password=md5($_POST['current_password']);
		$new_password=md5($_POST['new_password']);
		$confirm_password=md5($_POST['confirm_password']);
		// check weather user id and currend id password existd
		$sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
		//check wheatehr the new pass and confrm pass is match
		$res=mysqli_query($conn, $sql);
		if ($res==true) {
			# code...
			$count=mysqli_num_rows($res);
			if ($count==1) {
				# code...
				//echo "user found";

				if ($new_password==$confirm_password) {
					# code...
					$sql2="UPDATE tbl_admin SET password='$new_password' WHERE id=$id"; 
					//eccute query
					$res2=mysqli_query($conn, $sql2);
					$_SESSION['change-pwd']="password changed successfully";
				    header("location:".SETURL.'admin/manage-admin.php');
				}
				else{
				$_SESSION['pwd-not-match']="new password not match to confirm pwd";
				header("location:".SETURL.'admin/manage-admin.php');

				}













			}
			else{
				//not exists
				$_SESSION['user-not-found']="user not found";
				header("location:".SETURL.'admin/manage-admin.php');

			}
		}
		//chamge pass if above is true


	}

 ?>





<?php include ('partial/footer.php'); ?>