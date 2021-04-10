<?php
 include "dbcon.php";
 if(isset($_GET['id'])){
 	$id=$_GET['id'];
 	$delete="DELETE from course where d_id =$id";
 	$result=mysqli_query($con,$delete);
 

 	if($result){
 		header("Location:course.php");
 	}
 }
?>