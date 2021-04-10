<?php
include "dbcon.php";
if(isset($_POST['submit']))
echo $a = $_POST['reply'];
$data = "INSERT INTO msg(reply) values ('$a') WHERE id=$id";

 $v=mysqli_query($con,$data);
 if($v){
  header('location:msg.php');
}



?>