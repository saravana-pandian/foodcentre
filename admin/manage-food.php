<?php include('partial/menu.php') ?>
	<!-----------menu section ends-------->

	<!-----------main section-------->
	<div class="main-content">
		<div class="wrapper">
		 	<h1>Foods Page</h1>
			<br><br>
			<?php 
        		if (isset($_SESSION['upload'])) {
					echo $_SESSION['upload'];
					unset($_SESSION['upload']);
				}
				if (isset($_SESSION['addi'])) {
					echo $_SESSION['addi'];
					unset($_SESSION['addi']);
				}
				if (isset($_SESSION['add'])) {
					echo $_SESSION['add'];
					unset($_SESSION['add']);
				}
				if (isset($_SESSION['remove'])) {
					echo $_SESSION['remove'];
					unset($_SESSION['remove']);
				}
				if (isset($_SESSION['failed-remove'])) {
					echo $_SESSION['failed-remove'];
					unset($_SESSION['failed-remove']);
				}
				if (isset($_SESSION['delete'])) {
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				}
				if (isset($_SESSION['fails'])) {
					echo $_SESSION['fails'];
					unset($_SESSION['fails']);
				}
				if (isset($_SESSION['fail'])) {
	 				echo $_SESSION['fail'];
					unset($_SESSION['fail']);
				}
				if (isset($_SESSION['faili'])) {
	 				echo $_SESSION['faili'];
					unset($_SESSION['faili']);
				}
				?>
				<a href="<?php echo SETURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
				<br><br>
				<table class="tbl-full">
					<tr>
						<th>S.n.</th>
						<th>Title</th>
						<th>Price</th>
						<th>Image</th>
						<th>Featured</th>
						<th>Active</th>
						<th>Actions</th>
					</tr>


				<?php
					$sql="SELECT * FROM tbl_food";
					$res=mysqli_query($conn, $sql);
					$count=mysqli_num_rows($res);
					$sn=1;
					if($count>0)
					{
						while($rows=mysqli_fetch_assoc($res))
						{
							///to get all data 
							$id=$rows['id'];
							$title=$rows['title'];
							$prize=$rows['prize'];
							$image_name=$rows['image_name'];
							$featured=$rows['featured'];
							$active=$rows['active'];

				?>
					<tr>
						<td><?php echo $sn++; ?></td>
						<td><?php echo $title; ?></td>
						<td><?php echo $prize; ?></td>
						<td>
						
				<?php 
						if ($image_name!="") {
				?>

							<img src="../images/food/<?php echo $image_name; ?>" width="70px">
							
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
						<a href="<?php echo SETURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
						<a href="<?php echo SETURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name ?>" class="btn-danger">Delete</a>
						</td>
				</tr>

							<?php




						}
					}
					else{
						?>
						<td colspan='6'><div class='text-centre'>No Category Added</div></td>	
						<?php
					}

					       ?>
							


			
			
			</table>
		</div>
		
	</div>
	<!-----------main section ends-------->

	<!-----------foot section-------->
	<?php include('partial/footer.php')  ?>