<?php

include('../config/config.php');


//get the id of admin to delete
$id=$_GET['id'];


//create sql quere to delete admin

$sql="DELETE FROM tbl_admin WHERE id=$id";

//excecute query



$res=mysqli_query($conn, $sql);

if($res==true){

	$_SESSION['delete']="Admin Deleted Successfully";
	header("location:".SETURL.'admin/manage-admin.php');

}
else
{
 
	$_SESSION['delete']='Failed To Delete Admin. Try Again Later';
	header("location:".SETURL.'admin/manage-admin.php');

}




?>