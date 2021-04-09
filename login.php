<?php 

session_start();

include "dbcon.php";
if(isset($_POST['submit'])){
  $a = $_POST['email'];
  $b = $_POST['password'];
  $data = "SELECT * FROM user WHERE email = '$a' && password ='$b'";
  $res = mysqli_query($con,$data);

  $result = mysqli_num_rows($res);
  //echo $result;
  $check = mysqli_fetch_array($res);
  //print_r($check);
  if($result==1){

    $role = $check['role'];
    //echo $role;
  
    if($role == 'admin'){
      echo $_SESSION['admin_id'] = $check['id'];
      echo $_SESSION['admin_email'] = $check['email'];

    header('Location:admin/dashboard.php');
  }
    elseif ($role == 'student') {
      echo $_SESSION['stu_id'] = $check['id'];
      echo $_SESSION['stu_email'] = $check['email'];
      header('Location:student/stu_dashboard.php');
    }
    elseif ($role == 'teacher') {
      echo $_SESSION['tea_id'] = $check['id'];
      echo $_SESSION['tea_email'] = $check['email'];
      header('Location:teacher/tea_dashboard.php');
    }
    else{
      header('Location:index.php');
    }
  }
  else{
    header('Location:index.php');
  }

}

?>