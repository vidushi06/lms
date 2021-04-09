<?php 

session_start();
if(empty($_SESSION['tea_id']))
{
	header('Location:../index.php');
}


?>