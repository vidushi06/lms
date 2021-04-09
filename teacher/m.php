<?php
include "dbcon.php";
if(isset($_POST['submit']))
echo $a = $_POST['send_to'];
echo $b = $_POST ['send_from'];
echo $c = $_POST['message'];
$data = "INSERT INTO msg(send_to,send_from,message) values ('$a','$b','$c')";

 $v=mysqli_query($con,$data);
 if($v){
  header('location:msg.php');
}



?>