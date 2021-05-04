<?php include('partial/menu.php') ?>
	<!-----------menu section ends-------->

	<!-----------main section-------->
	<div class="main-content">
		<div class="wrapper">
		<h1>Category Page</h1>
			<br>
			<?php 
	if (isset($_SESSION['add'])) {
		# code...
		echo $_SESSION['add'];
		unset($_SESSION['add']);
	}
	if (isset($_SESSION['remove'])) {
		# code...
		echo $_SESSION['remove'];
		unset($_SESSION['remove']);
	}
	if (isset($_SESSION['delete'])) {
		# code...
		echo $_SESSION['delete'];
		unset($_SESSION['delete']);
	}
	if (isset($_SESSION['fail'])) {
		# code...
		echo $_SESSION['fail'];
		unset($_SESSION['fail']);
	}
	if (isset($_SESSION['no-cat-found'])) {
		# code...
		echo $_SESSION['no-cat-found'];
		unset($_SESSION['no-cat-found']);
	}
	if (isset($_SESSION['fail-c'])) {
		# code...
		echo $_SESSION['fail-c'];
		unset($_SESSION['fail-c']);
	}
	if (isset($_SESSION['update'])) {
		# code...
		echo $_SESSION['update'];
		unset($_SESSION['update']);
	}
	if (isset($_SESSION['upload'])) {
		# code...
		echo $_SESSION['upload'];
		unset($_SESSION['upload']);
	}
		if (isset($_SESSION['failed-remove'])) {
		# code...
		echo $_SESSION['failed-remove'];
		unset($_SESSION['failed-remove']);
	}
 ?>
 <br><br>
<a href="add-category.php" class="btn-primary">Add category</a>
<br>
<br>
			<table class="tbl-full">
				<tr>
					<th>S.n.</th>
					<th>Title</th>
					<th>Image</th>
					<th>Featured</th>
					<th>Active</th>
					<th>Action</th>
				</tr>

				<?php 
				//get data
				$sql="SELECT * FROM tbl_category";
				//execute query
				$res=mysqli_query($conn, $sql);
				//count rows
				$count=mysqli_num_rows($res);
				//create serrial numbr and assign value
				$sn=1;
				//check wthr we have data in data base
				if ($count>0) {
					//we have data in sql
					//get data and display
					while ($row=mysqli_fetch_assoc($res)) {
						$id=$row['id'];
						$title=$row['title'];
						$image_name=$row['image_name'];
						$featured=$row['featured'];
						$active=$row['active'];
						?>


				<tr>
					<td><?php echo $sn++; ?></td>
					<td><?php echo $title; ?></td>

					<td>
						<?php 

						if ($image_name!="") {
							?>

							<img src="../images/category/<?php echo $image_name; ?>" width="70px">
							
							<?php
						}
						else{
							//display the message
							echo "<div class='text-centre'>Image Not Added</div>";
						}

						 ?>		
					</td>

					<td><?php echo $featured; ?></td>
					<td><?php echo $active; ?></td>
					<td>
						<a href="<?php echo SETURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
						<a href="<?php echo SETURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name ?>" class="btn-danger">Delete</a>
					</td>
				</tr>



						<?php
					}
				}
				else{
					//we dont have data
					//display msg insert table
					?>
					
					<tr>
						<td colspan="6"><div class="text-centre">No Category Added</div></td>	
					</tr>

					<?php
				}

				 ?>

						</table>
		</div>
		
	</div>
	<!-----------main section ends-------->

	<!-----------foot section-------->
	<?php include('partial/footer.php')  ?>