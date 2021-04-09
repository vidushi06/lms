<!---leaves --->
<?php 
include "dbcon.php";
if(isset($_POST['submit'])){
  $a = $_POST['valid_from'];
  $b = $_POST['valid_to'];
  $c = $_POST['occasion'];
  $d = $_POST['assign_by'];
  
  $data = "INSERT INTO leaves (valid_from,valid_to,assign_by,occasion) VALUES ('$a','$b','$d','$c')";
  $e = mysqli_query($con,$data);
  if($e){

    header('Location:leaves.php');

  }
  else{
    echo "<script>alert('someting went wrong!!')</script>";
  }

}


?>
