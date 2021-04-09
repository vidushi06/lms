<?php

include "dbcon.php";
if(isset($_POST['submit']))
 $a=$_POST ['filee'];
 $b=$_POST ['description'];
 $filename=$_FILES['filee']['name'];
 $tmpname=$_FILES['filee']['tmp_name'];
 $file="upload/".$filename;
			//print_r($file);
 move_uploaded_file($tmpname,$file);
 $data = "INSERT INTO assignment_list(title,description,filee) values ('$a','$b','$file')";

 $v=mysqli_query($con,$data);
 if($v){
	header("Location:assignment.php");
}
?>
