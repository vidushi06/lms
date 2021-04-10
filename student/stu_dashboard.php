<?php 
include "sidebar.php";
 ?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
    
      <?php include "header.php" ?>

      <div class="container">
        <h1 class="mt-4"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Welcome Back!!</h1>
        <br><br>
        <table class="table">

          <?php


              include "dbcon.php";
              $id= $_SESSION['stu_id'];
              $data= "SELECT * from user WHERE role = 'student' && id = $id";
              $result=mysqli_query($con,$data);
              while($a=mysqli_fetch_array($result)){


          ?>

          <tr>
            <th>Id</th>
            <td><?php echo $a['id'] ?></td>
          </tr>
          <tr>
            <th>Name</th>
            <td><?php echo $a['name'] ?></td>
          </tr>

          <tr>
            <th>Email</th>
            <td><?php echo $a['email'] ?></td>
          </tr>

          <tr>
          
          <th>Phone Number</th>
            <td><?php echo $a['phnum']  ?></td>
          </tr>

          <th>Password</th>
            <td><?php echo $a['password']  ?></td>
          </tr>

          <tr>
            <th>Action</th>
            <td>
              <a class="btn btn-success" href="stu_edit.php?id=<?php echo $a['id'] ?>">Edit</a>
            </td>
          </tr>

          <?php } ?>
          
        </table>
      </div>
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