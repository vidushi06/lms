<?php

include "dbcon.php";
if(isset($_POST['submit']))
 $a=$_POST ['d_title'];
 $b=$_POST ['d_description'];
 $filename=$_FILES['d_image']['name'];
 $tmpname=$_FILES['d_image']['tmp_name'];
 $file="upload/".$filename;
			//print_r($file);
 move_uploaded_file($tmpname,$file);
 echo $data = "INSERT INTO course(d_title,d_description,d_image) values ('$a','$b','$file')";

 $v=mysqli_query($con,$data);
 if($v){
	header("Location:course.php");
}
else{
	header("location:course.php");
}
?>
