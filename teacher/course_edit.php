    <?php

include "dbcon.php";
if(isset($_GET['id']))
{
  $id=$_GET['id'];
  $data="SELECT * from course where d_id=$id";
  $result=mysqli_query($con,$data);
  $x=mysqli_fetch_array($result);
}

//update
if(isset($_POST['submit']))
{
  $a=$_POST['d_title'];
  $b=$_POST['d_description'];
  

  $data="UPDATE course SET d_title ='$a', d_description = '$b' where d_id=$id";
  $update=mysqli_query($con,$data);

  if ($update) {
    header("Location:course.php");
  }
}

?>



    <?php include "sidebar.php"; ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <?php include "header.php" ?>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6"> 
              <h1 class="mt-4">Edit assignment</h1>
              <form method="POST" style="padding: 20px">
          <div class="form-group">
            <input type="text" name="d_title" value="<?php echo $x['d_title'] ?>" class="form-control">
          </div>
          <div class="form-group">
            
              <textarea type="text" name="d_description" class="form-control"><?php echo $x['d_description'] ?></textarea>
            
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
