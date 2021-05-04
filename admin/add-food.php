<?php include('partial/menu.php') ?>



<div class="main-content">
 	<div class="wrapper">
 		<h1>Add Food</h1>
 		<br>
 		<br>
 		<?php 
        	if (isset($_SESSION['upload'])) {
		# code...
		 			echo $_SESSION['upload'];
					unset($_SESSION['upload']);
			}
			?>
 		<form action="" method="POST" enctype="multipart/form-data">
 			<table class="tbl-wid">
 				<tr>
 					<td>Title: </td>
 					<td>
 						<input type="text" name="title" placeholder="Title of the Food">
 					</td>
 				</tr>
 				<tr>
 					<td>Description: </td>
 					<td>
 						<textarea name="description" cols="30" rows="5" placeholder="Description of The Food"></textarea> 
 					</td>
 				</tr>
 				<tr>
 					<td>Price: </td>
 					<td>
 						<input type="number" name="price">
 					</td>
 				</tr>
 				<tr>
 					<td>Select Image</td>
 					<td>
 						<input type="file" name="image">
 					</td>
 				</tr>
 				<tr>
 					<td>Category:</td>
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
 									$id=$row['id'];
 									$title=$row['title'];
 									?>
 									<option value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
 					<td>Featured</td>
 					<td>
 						<input type="radio" name="featured" value="Yes"> Yes
 						<input type="radio" name="featured" value="No"> No
 					</td>
 				</tr>
 				<tr>
 					<td>Active</td>
 					<td>
 						<input type="radio" name="active" value="Yes"> Yes
 						<input type="radio" name="active" value="No"> No
 					</td>
 				</tr>
 				<tr>
 					<td colspan="2">
 						<input type="submit" name="submit" value="Add Food" class="btn-secondary">
 					</td>
 				</tr>
 			</table>
 		</form>

 		<?php 

 		if (isset($_POST['submit'])) {
 			//echo "hello";
 			//addd food in database
 			//1 get data from data base
 			$title=$_POST['title'];
 			$description=$_POST['description'];
 			$price=$_POST['price'];
 			$category=$_POST['category'];
 			//check radio button
 			if (isset($_POST['featured'])) {
 				$featured=$_POST['featured'];
 			}
 			else{
 				$featured="No";
 			}
 			if (isset($_POST['active'])) {
 				$active=$_POST['active'];
 			}
 			else{
 				$active="No";
 			}
 			//upload ima
 			//check wether the image i sclicked or not and upload if its is selected
 			if (isset($_FILES['image']['name'])) {
 				//get the details of selected image
 				$image_name=$_FILES['image']['name'];
 				//check wthr image is selected or not and upload if only
 				if ($image_name!="") {
 					//image is selected
 					//rename image 
 					//create extion of selected image 
 					$ext=end(explode('.', $image_name));
 					//create new image name
 					$image_name="Food-Name-".rand(0000,9999).".".$ext;
 					//upload image
 					//geting source path
 					$src=$_FILES['image']['tmp_name'];
 					//destination to upload
 					$dst="../images/food/".$image_name;
 					//final uplo
 					$upload=move_uploaded_file($src, $dst);

 					//check wthr uploades or not
 					if ($upload==false) {
 						//fail
 						//redirect to food page wid msg
 						$_SESSION['upload']="Failed to Upload Image";
		//redirect page
		                header("location:".SETURL.'admin/add-food.php');
 						//stop proccess
 						die();
 					}
 				}
 			}
 			else{
 				$image_name=""; //set dafault value as blank
 			}
 			//insert into database
 			//create a sql query to save
 			$sql="INSERT INTO tbl_food SET
 			title='$title',
 			description='$description',
 			prize=$price,
 			image_name='$image_name',
 			category_id=$category,
 			featured='$featured',
 			active='$active'
 			";
 			//execuute query
 			$res2=mysqli_query($conn, $sql);
 			if ($res2==true) {
 				//insetred successfully
 				$_SESSION['add']="Food Added Successfully";
				//redirect page
				header("location:".SETURL.'admin/manage-food.php');
 			}
 			else{
 				$_SESSION['fail']="fail to add food";
				//redirect page
				header("location:".SETURL.'admin/manage-food.php');
 			}
 				//redirect with msg to manage-foods
 		}

 		?>


 	</div>
 </div>



<?php include('partial/footer.php') ?>