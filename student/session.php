<?php 

session_start();
if(empty($_SESSION['stu_id']))
{
	header('Location:../index.php');
}


?>