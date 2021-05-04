<?php include ('partial/menu.php'); ?>


	<div class="main-content">
		<div class="wrapper">
			<h1>Update Admin</h1>
			<br><br>

			<?php 

			//get the id of selected admin
			$id=$_GET['id'];
			//create sql query 
			$sql="SELECT * FROM tbl_admin 	where id=$id";

			$res=mysqli_query($conn, $sql);
			//check whether is working
			if ($res==true) {
				$count=mysqli_num_rows($res);
				if ($count==1) {
					# code...
					//echo "Admin Available";
					$row=mysqli_fetch_assoc($res);
					$full_name=$row['full_name'];
					$username=$row['username'];


				}
				else{
					header("location:".SETURL.'admin/manage-admin.php');
				}


			}




			?>

			<form action="" method="POST">
				<table class="tbl-wid">
 				<tr>
 					<td>Full Name:</td>
 					<td><input type="text" name="full_name" value="<?php echo $full_name ?>"></td>
 				</tr>
 				<tr>
 					<td>UserName</td>
 					<td>
 						<input type="text" name="username" value="<?php echo $username ?>">
 					</td>
 				</tr>
 				<tr>
 					<td colspan="2">
 						<input type="hidden" name="id" value="<?php echo $id ?>">
 						<input type="submit" name="submit" value="Update Admin" class="btn-secondary">
 					</td>
 					
 				</tr>
 			</table>
			</form>
		</div>
	</div>

<?php   

		//check weather sumbit buttopn is clocl
		if (isset($_POST['submit'])) {
			//echo "buttopn";
			//	get value from form to update
	
		 $id=$_POST['id'];
		 $full_name=$_POST['full_name'];
		 $username=$_POST['username'];

//create sql query
		 $sql="UPDATE tbl_admin SET full_name='$full_name', username='$username' WHERE id='$id'";

		 $res=mysqli_query($conn, $sql);

		 if ($res==true) {

		 	$_SESSION['update']="Admin Updated Successfully";
		 	header("location:".SETURL.'admin/manage-admin.php');
		 	# code...
		 }
		 else{
		 		$_SESSION['update']="Admin Not Updated Successfully";
		 	header("location:".SETURL.'admin/manage-admin.php');
		 	# code...
		 }




		}
?>
<?php include ('partial/footer.php'); ?>