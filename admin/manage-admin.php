<?php include('partial/menu.php') ?>
	<!-----------menu section ends-------->

	<!-----------main section-------->
	<div class="main-content">
		<div class="wrapper">
			<h1>Manage Admin</h1>
			<br>
<?php 
 			if(isset($_SESSION['add']))
 			{
 				echo $_SESSION['add'];
 				unset( $_SESSION['add']);
 			}
 			if (isset($_SESSION['delete']))
 			{
 				echo $_SESSION['delete'];
 				unset($_SESSION['delete']);
 			
 			}
 				if (isset($_SESSION['update']))
 			{
 				echo $_SESSION['update'];
 				unset($_SESSION['update']);
 			}
 				if (isset($_SESSION['user-not-found']))
 			{
 				echo $_SESSION['user-not-found'];
 				unset($_SESSION['user-not-found']);
 			}
 			 			if (isset($_SESSION['pwd-not-match']))
 			{
 				echo $_SESSION['pwd-not-match'];
 				unset($_SESSION['pwd-not-match']);
 			
 			}
 			if (isset($_SESSION['change-pwd-fail']))
 			{
 				echo $_SESSION['change-pwd-fail'];
 				unset($_SESSION['change-pwd-fail']);
 			
 			}
 			if (isset($_SESSION['change-pwd']))
 			{
 				echo $_SESSION['change-pwd'];
 				unset($_SESSION['change-pwd']);
 			
 			}

 		?>
 		<br>
 	<br>
 				
<br>
<a href="add-admin.php" class="btn-primary">Add Admin</a>
<br>
<br>
		<table class="tbl-full">
				<tr>
					<th>S.n.</th>
					<th>Full Name</th>
					<th>UserName</th>
					<th>Actions</th>
				</tr>

				<?php
				$sql="SELECT * FROM tbl_admin";
				$res=mysqli_query($conn, $sql);
				if($res==TRUE){
					$count=mysqli_num_rows($res);
					$sn=1;

					if($count>0)
					{
						while($rows=mysqli_fetch_assoc($res))
						{
							///to get all data 
							$id=$rows['id'];
							$full_name=$rows['full_name'];
							$username=$rows['username'];

							//display value in table
							?>
								<tr>
				      				<td><?php  echo $sn++; ?></td>
									<td><?php  echo $full_name; ?></td>
									<td><?php  echo $username; ?></td>
									<td>
										<a href="<?php echo SETURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
										<a href="<?php echo SETURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
										<a href="<?php echo SETURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
									</td>
				</tr>
							<?php
						}
					}
					else
					{

					}
				}

				?>

			</table>
		</div>
		
	</div>
	<!-----------main section ends-------->

	<!-----------foot section-------->
	
	<?php include('partial/footer.php') ?>