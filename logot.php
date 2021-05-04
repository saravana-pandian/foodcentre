<?php  include('../config/config.php'); ?>


<?php 
//DEstroy the session and 

session_destroy();



///redirect to login pag
header('location:'.SETURL.'admin/login.php');



 ?>