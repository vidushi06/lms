<?php 
include "sidebar.php";
?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
      
      <?php include "header.php" ?>

      <div class="container" style="overflow-y: auto;">
          <h3 class="mt-4"><i class="fa fa-users" aria-hidden="true"></i> Student List</h3>
          <br>
          <table class="table table-bordered" >
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Department</th>
              <th>Phone number</th>
              <th>Send msg</th>
            </tr>
            <?php

                include "dbcon.php";
                $data= "SELECT * from user WHERE role = 'student'";
                $result=mysqli_query($con,$data);
                while($a=mysqli_fetch_array($result)){


             ?>

             <tr>
               <td><?php echo $a['id'] ?></td>
               <td><?php echo $a['name'] ?></td>
               <td><?php echo $a['gender'] ?></td>
               <td><?php echo $a['department'] ?></td>
               <td><?php echo $a['phnum'] ?></td>
               <td><a href="msg.php?id=<?php echo $a['id'] ?>" class="btn btn-info">send msg</a></td>
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