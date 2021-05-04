<?php include('partial/menu.php');?>

<?php 

if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$sql2="SELECT * FROM tbl_food WHERE id=$id";
	$res2=mysqli_query($conn, $sql2);
	$row2=mysqli_fetch_assoc($res2);
	$title=$row2['title'];
	$description=$row2['description'];
	$prize=$row2['prize'];
	$current_image=$row2['image_name'];
	$current_category=$row2['category_id'];
	$featured=$row2['featured'];
	$active=$row2['active'];
	
}
else{
	header('location:'.SETURL.'admin/manage-food.php');
}

 ?>

<div class="main-content">
 	<div class="wrapper">
 		<h1>Update Category</h1>
 		<br><br>
 	
		<form action="" method="POST" enctype="multipart/form-data">
			<table class="tbl-wid">
				<tr>
					<td>Title</td>
					<td>
						<input type="text" name="title" value="<?php echo $title; ?>">
					</td>
				</tr>
				<tr>
					<td>Description: </td>
					<td>
						<textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
					</td>
				</tr>
				<tr>
					<td>Price: </td>
					<td>
						<input type="number" name="prize" value="<?php echo $prize; ?>">
					</td>
				</tr>
				<tr>
					<td>Current Image: </td>
					<td>
						<?php 

 							if ($current_image!="") {
 								?>
 								<img src="<?php echo SETURL; ?>images/food/<?php echo $current_image ?>" width="70px">
 								<?php
 							}
 							else{
 								echo "Image Not Addeed";
 							}

 							 ?>

					</td>
				</tr>
				<tr>
					<td>Select New Image: </td>
					<td>
						<input type="file" name="image">
					</td>
				</tr>
				<tr>
					<td>Category: </td>
					<td>
						<select name="category">
							<?php 

 							//create php code to display category frmom database
 							//1.create sql to get all active categiory from database
 							$sql2="SELECT * FROM tbl_category WHERE active='Yes'";
 							//execute query
 							$res=mysqli_query($conn, $sql2);
 							//count rows
 							$count=mysqli_num_rows($res);
 							//if count is great than zero we have actagory
 							if ($count>0) {
 								while ($row=mysqli_fetch_assoc($res)) {
 									$category_id=$row['id'];
 									$category_title=$row['title'];
 									?>
 									<option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
 									<?php
 								}
 							}
 							else{
 								?>
 								<option value="0">No Category Found</option>
 								<?php
 							}
 							//2.display on dropdown

 							 ?>
							
						</select>
					</td>
				</tr>
				<tr>
					<td>Features: </td>
					<td>
						<input <?php if ($featured=="Yes") { echo "Checked"; } ?> type="radio" name="featured" value="Yes"> Yes
						<input <?php if ($featured=="No") { echo "Checked"; } ?> type="radio" name="featured" value="No"> No
					</td>
				</tr>
				<tr>
					<td>Active: </td>
					<td>
						<input <?php if ($active=="Yes") { echo "Checked"; } ?> type="radio" name="active" value="Yes"> Yes
						<input <?php if ($active=="No") { echo "Checked"; } ?> type="radio" name="active" value="No"> No
					</td>
				</tr>
				<tr>
					<td>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						<input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
						<input type="submit" name="submit" value="Update Food" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>
		<?php

		//check wthr click or not btn
		if (isset($_POST['submit'])) {
			
			//get all data from form
			$id=$_POST['id'];
			$title=$_POST['title'];
			$description=$_POST['description'];
			$prize=$_POST['prize'];
			$current_image=$_POST['current_image'];
			$category=$_POST['category'];

			$featured=$_POST['featured'];
			$active=$_POST['active'];

			//upload image if selected

			//remove image if u[loaded and curent img is exit
	if (isset($_FILES['image']['name'])) {
		//get the image details
		$image_name=$_FILES['image']['name'];

		//check wether the image is available
		if ($image_name!="") {
			//image available
			//upload image 
					$ext=end(explode('.',$image_name));
					//rename now
					$image_name="Food-Name-".rand(000, 999).'.'.$ext;


					$source_path=$_FILES['image']['tmp_name'];
					$destination_path="../images/food/".$image_name;

					//upload
					$upload=move_uploaded_file($source_path, $destination_path); 

		if ($upload==false) {
		# code...
		//creeate session
			$_SESSION['upload']="Failed to Upload Image";
		//redirect page
			header("location:".SETURL.'admin/manage-food.php');
			die();
	}
			//remove the current
	if ($current_image!="") {
	
			$remove_path="../images/food/".$current_image;

			$remove=unlink($remove_path);
			//check wether the image is removed or not
			if ($remove==false) {
				$_SESSION['failed-remove']="Failed to remove current image";
				header('location:'.SETURL.'admin/manage-foodw.php');
				die();
				# code...
			}
		}
	}
	else{
		$image_name=$current_image;
	}
		}
		else{
			$image_name=$current_image;
		}
	

			//update food in data base
		$sql3="UPDATE tbl_food SET
 			title='$title',
 			description='$description',
 			prize=$prize,
 			image_name='$image_name',
 			category_id=$category,
 			featured='$featured',
 			active='$active'
 			WHERE id=$id
 			";
 			$res3=mysqli_query($conn, $sql3);
			//redi]
 				
 			if ($res3==true) {
 				//insetred successfully
 				$_SESSION['addi']="Food update Successfully";
				//redirect page
				header("location:".SETURL.'admin/manage-food.php');
 			}
 			else{
 				$_SESSION['faili']="fail to update food";
				//redirect page
				header("location:".SETURL.'admin/manage-food.php');
 			}
		}

		?>

 		</div>
 	</div>


<?php include('partial/footer.php');?>