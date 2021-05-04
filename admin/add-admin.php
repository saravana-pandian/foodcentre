<?php  include('partial/menu.php') ?>

<div class="main-content">
 	<div class="wrapper">
 		<h1>Add Admin</h1>
 		<br>
 		<br>
<?php 
	if (isset($_SESSION['add'])) {
		# code...
		echo $_SESSION['add'];
		unset($_SESSION['add']);
	}

 ?>
<br>
<br>
 		<form action="" method="POST">
 			
 			<table class="tbl-wid">
 				<tr>
 					<td>FullName</td>
 					<td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
 				</tr>
 				<tr>
 					<td>UserName</td>
 					<td>
 						<input type="text" name="username" placeholder="Your UserName">
 					</td>
 				</tr>
 				<tr>
 					<td>Password</td>
 					<td>
 						<input type="Password" name="password" placeholder="Your Password">
 					</td>
 				</tr>
 				<tr>
 					<td colspan="2">
 						<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
 					</td>
 				</tr>
 			</table>

 		</form>


 	</div>
</div>











<?php include('partial/footer.php') ?>


<?php 
//prooccess value in form and save it in  database

//check weather the submit button is Clicked or not
if (isset($_POST['submit'])) {
	# code...//button clicked
	//echo "clicked";
	$full_name=$_POST['full_name'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);//password encrypt md5

	//sql query to save data to data base
	$sql="INSERT INTO tbl_admin SET
		full_name='$full_name',
		username='$username',
		password='$password'
	";
	
	//excecuting code to save the data
	$res=mysqli_query($conn, $sql) or die(mysqli_error());
	//check wether it is inserted
	if ($res==TRUE) {
		# code...
		//creeate session
		$_SESSION['add']="Admin Added Successfully";
		//redirect page
		header("location:".SETURL.'admin/manage-admin.php');
	}
	else{
		$_SESSION['add']="Failed to Add Admin";
		//redirect page
		header("location:".SETURL.'admin/add-admin.php');
	}
}


?>