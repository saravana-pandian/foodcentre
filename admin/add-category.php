<?php include('partial/menu.php'); ?>


<div class="main-content">
 	<div class="wrapper">
 		<h1>Add Category</h1>
 		<br><br>
 		<?php 
	if (isset($_SESSION['add'])) {
		# code...
		echo $_SESSION['add'];
		unset($_SESSION['add']);
	}
		if (isset($_SESSION['upload'])) {
		# code...
		echo $_SESSION['upload'];
		unset($_SESSION['upload']);
	}

 ?>

 		<form action="" method="POST" enctype="multipart/form-data">

 			<table class="tbl-wid">
 				<tr>
 					<td>Title</td>
 					<td>
 						<input type="text" name="title" placeholder="Category Title">
 					</td>
 				</tr>
 				<tr>
 					<td>Select Image: </td>
 					<td>
 						<input type="file" name="image">
 					</td>
 				</tr>
 				<tr>
 					<td>Featured</td>
 					<td>
 						<input type="radio" name="featured" value="Yes"> Yes
 						<input type="radio" name="featured" value="No"> No
 					</td>
 				</tr>
 				<tr>
 					<td>Active: </td>
 					<td>
 					<input type="radio" name="active" value="Yes"> Yes
 						<input type="radio" name="active" value="No"> No 
 					</td>
 				</tr>
 				<tr>
 					<td colspan="2">
 						<input type="submit" name="submit" value="Add Category" class="btn-secondary">
 					</td>
 				</tr>
 			</table>
 			
 		</form>
<?php 

	//wethr btn is wrk or not
	if (isset($_POST['submit'])) {
		//echo "clicked";
		//get value from form
		$title=$_POST['title'];

		//for radio input type check wthr radio butom is select or not
		if (isset($_POST['featured'])) {
			$featured=$_POST['featured'];
		}
		else
		{
			//set default value
			$featured="No";
		}

		if (isset($_POST['active'])) {
			$active=$_POST['active'];
		}
		else {
			$active="No";	
				}

				//print_r($_FILES['image']);
				//die();
				if (isset($_FILES['image']['name'])) {
					//upload imagre
					//to upload image we need image name and inmage source pass and desition path
					$image_name=$_FILES['image']['name'];
					//renaming image 
					//get extion of the image 
					if ($image_name!="") {
						# code...

					



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
		header("location:".SETURL.'admin/add-category.php');
		die();
	}


}



				}
				else{
					//dont upload image
					$image_name=""; 
				}


				$sql="INSERT INTO tbl_category SET title='$title', image_name='$image_name', featured='$featured', active='$active'";

				//execute the query
				$res=mysqli_query($conn, $sql);

				//
	if ($res==TRUE) {
		# code...
		//creeate session
		$_SESSION['add']="Category Added Successfully";
		//redirect page
		header("location:".SETURL.'admin/manage-category.php');
	}
	else{
		$_SESSION['add']="Failed to Add Category";
		//redirect page
		header("location:".SETURL.'admin/add-category.php');
	}	


	}

 ?>



 	</div>
 </div>






<?php include('partial/footer.php'); ?>