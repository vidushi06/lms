    <?php

include "dbcon.php";
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $data="SELECT * from user where id=$id";
  $result=mysqli_query($con,$data);
  $x=mysqli_fetch_array($result);
}

//update
if(isset($_POST['submit']))
{
  $a=$_POST['name'];
  $b=$_POST['gender'];
  $c=$_POST['phnum'];
  $d=$_POST['email'];
  $f=$_POST['password'];
  

  $data="UPDATE user SET name='$a', gender = '$b', phnum = '$c', email = '$d',password = '$f' where id=$id";
  $update=mysqli_query($con,$data);

  if ($update) {
    header("Location:stud_list.php");
  }
}

?>



    <?php include "sidebar.php" ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div>
          <h2>Ems Admin dashboard</h2>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6"> 
              <h1 class="mt-4">Admin Edit</h1>
              <form method="POST" style="padding: 20px">
          <div class="form-group">
            <input type="text" name="name" value="<?php echo $x['name'] ?>" class="form-control">
          </div>
          <div class="form-group">
            <input type="email" name="email" placeholder="Enter employee email" class="form-control" value="<?php echo $x['email'] ?>">
          </div>
          <div class="form-group">
            <input class=" radio" type="radio" name="gender" value="female" class="form-control"

            <?php
             if($x['gender']=='female'){
              echo "checked";
             }
            ?>

            >female
            <input class=" radio" type="radio" name="gender" value="male" class="form-control"

            <?php
             if($x['gender']=='male'){
              echo "checked";
             }
            ?>

            >male
            <input class=" radio" type="radio" name="gender" value="other" class="form-control"

            <?php
             if($x['gender']=='other'){
              echo "checked";
             }
            ?>

            >other
          </div>
          <div class="form-group">
            <input type="text" name="phnum" placeholder="Enter employee Phone no." class="form-control" value="<?php echo $x['phnum'] ?>">
          </div>
          <div class="form-group">
            <input type="text" name="password" placeholder="Create a Password" class="form-control" value="<?php echo $x['password'] ?>">
          </div>
          <div>
            <input type="submit" name="submit" value="Update" class="btn btn-primary">
          </div>
        </form>
          </div>
          <div class="col-md-3"></div>
    
        </div><!--end of row-->
      </div><!--end of container-->

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
