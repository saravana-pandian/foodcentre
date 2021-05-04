<?php include('partial/menu.php');?>



<div class="main-content">
 	<div class="wrapper">
 		<h1>Update Category</h1>
 		<br><br>
 		<?php

 		//check wether id is set or not
 		if (isset($_GET['id'])) {
 			//gt id and all details
 			//echo "helloooooooo";
 			$id=$_GET['id'];
 			//create sql to get all other detail
 			$sql="SELECT * FROM tbl_category WHERE id=$id";
 			$res=mysqli_query($conn, $sql);
 			$count=mysqli_num_rows($res);
 			if ($count==1) {
 				//get all data
 				$row=mysqli_fetch_assoc($res);
 				$title=$row['title'];
 				$current_image=$row['image_name'];
 				$featured=$row['featured'];
 				$active=$row['active'];
 			}
 			else{
 				//redirect
 					$_SESSION['no-cat-found']="Category Not Found";
		//redirect page
		header("location:".SETURL.'admin/manage-category.php');
 			}
 		}
 		else{
 			header("location:".SETURL.'admin/manage-category.php');
 		}

 		?>



 		<form action="" method="POST" enctype="multipart/form-data">
 				<table class="tbl-wid">
 					<tr>
 						<td>Title</td>
 						<td>
 							<input type="text" name="title" value="<?php echo $title; ?>">
 						</td>
 					</tr>
 					<tr>
 						<td>Current Image</td>
 						<td>
 							
 							<?php 

 							if ($current_image!="") {
 								?>
 								<img src="<?php echo SETURL; ?>images/category/<?php echo $current_image ?>" width="70px">
 								<?php
 							}
 							else{
 								echo "Image Not Addeed";
 							}

 							 ?>

 						</td>
 					</tr>
 					<tr>
 						<td>New Image</td>
 						<td>
 							<input type="file" name="image">
 						</td>
 					</tr>

 					<tr>
 						<td>Featured</td>
 						<td>
 							<input <?php if ($featured=="Yes") { echo "Checked"; } ?> type="radio" name="featured" value="Yes"> Yes
 							<input <?php if ($featured=="No") { echo "Checked"; } ?> type="radio" name="featured" value="No"> No
 						</td>
 					</tr>
 					<tr>
 						<td>Active</td>
 						<td>
 							<input <?php if ($active=="Yes") { echo "Checked"; } ?> type="radio" name="active" value="Yes"> Yes
 							<input <?php if ($active=="No") { echo "Checked"; } ?> type="radio" name="active" value="No"> No
 						</td>
 					</tr>
 					<tr>
 						<td>
 							<input type="hidden" name="current_image" value="<?php echo $current_image ?>">
 							<input type="hidden" name="id" value="<?php echo $id ?>">
 					    	<input type="submit" name="submit" value="update-category" class="btn-secondary">
 					</td>
 					</tr>


 				</table>
</form>


<?php 

if (isset($_POST['submit'])) {
	//echo "hek";
	//get all value from form 
	$id=$_POST['id'];
	$title=$_POST['title'];
	$current_image=$_POST['current_image'];
	$featured=$_POST['featured'];
	$active=$_POST['active'];

	//updating image if selected
	//check wthr image selectd or not
	if (isset($_FILES['image']['name'])) {
		//get the image details
		$image_name=$_FILES['image']['name'];

		//check wether the image is available
		if ($image_name!="") {
			//image available
			//upload image 
					$ext=end(explode('.',$image_name));
					//rename now
					$image_name="Food_Category_".rand(000, 999).'.'.$ext;


					$source_path=$_FILES['image']['tmp_name'];
					$destination_path="../images/category/".$image_name;

					//upload
					$upload=move_uploaded_file($source_path, $destination_path); 

		if ($upload==false) {
		# code...
		//creeate session
			$_SESSION['upload']="Failed to Upload Image";
		//redirect page
			header("location:".SETURL.'admin/manage-category.php');
			die();
	}
			//remove the current
	if ($current_image!="") {
	
			$remove_path="../images/category/".$current_image;

			$remove=unlink($remove_path);
			//check wether the image is removed or not
			if ($remove==false) {
				$_SESSION['failed-remove']="Failed to remove current image";
				header('location:'.SETURL.'admin/manage-category.php');
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

	//update the data base
	$sql2="UPDATE tbl_category SET title='$title', image_name='$image_name', featured ='$featured', active='$active' WHERE id=$id";
    $res2=mysqli_query($conn, $sql2);
    	//redirect
    if ($res2==true) {
    	$_SESSION['update']="Category updated successfully";
		//redirect page
		header("location:".SETURL.'admin/manage-category.php');
    }
      else{
	    $_SESSION['fail-c']="Failed to Update category";
	 	//redirect page
		header("location:".SETURL.'admin/manage-category.php');
    }
}

 ?>

 	</div></div>


<?php include('partial/footer.php');?>