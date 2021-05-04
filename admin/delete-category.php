<?php 
 include ('../config/config.php');

 if (isset($_GET['id']) AND isset($_GET['image_name'])) {
 	  //get value and delete
 	//echo "get value and delete";
 	$id=$_GET['id'];
 	$image_name=$_GET['image_name'];
 	//remove physical ifle s available
 	if ($image_name!="") {
 		//image is availabe so remove it
 		$path="../images/category/".$image_name;
 		//remove
 		$remove=unlink($path);
 		if ($remove==false) {
 			//add an error msg
 	          $_SESSION['remove']="<div class='text-centre'>Failed to remove category</div>";
	          header("location:".SETURL.'admin/manage-category.php');
            	die();
 		}
 	}
 	//delete data from data base
 	$sql="DELETE FROM tbl_category WHERE id=$id";
 	$res=mysqli_query($conn, $sql);
 	//check wthr its deleted ir not
 	if ($res==true) {
 		$_SESSION['delete']="Category Deleted Successfully";
	    header("location:".SETURL.'admin/manage-category.php');
 	}
 	else{
    	$_SESSION['fail']="Category Not Deleted ";
	    header("location:".SETURL.'admin/manage-category.php');
 	}
 	//rediect to catagor page
 }
 else{
 	//redirect t0
   header("location:".SETURL.'admin/manage-category.php');
 }

?>