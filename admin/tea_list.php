    <?php include "sidebar.php" ?>
    

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <?php include "header.php" ?>

      <div class="container-fluid">
        <h3 class="mt-4"><i class="fas fa-chalkboard-teacher"></i> Teachers Details</h3>
        <div style="overflow-x:auto;">
          <table class="table">
            <tr class="shadow">
              <th>S no.</th>
              <th>Name</th>
              <th>Gender</th>
              <th>Department</th>
              <th>Phone number</th>
              <th>Email</th>
              <th>Password</th>
              <th>Action</th>
            </tr>
            <?php

                include "dbcon.php";
                $i=1;
                $data= "SELECT * from user WHERE role = 'teacher' ORDER BY name ";
                $result=mysqli_query($con,$data);
                while($a=mysqli_fetch_array($result)){


             ?>

             <tr>
              <td><?php echo $i++; ?></td>
               <td><?php echo $a['name'] ?></td>
               <td><?php echo $a['gender'] ?></td>
               <td><?php echo $a['department'] ?></td>
               <td><?php echo $a['phnum'] ?></td>
               <td><?php echo $a['email'] ?></td>
               <td><?php echo $a['password'] ?></td>
               <td>
                 <a class="btn btn-success pull-right" href="tea_edit.php?id=<?php echo $a['id'] ?>">Edit</a>
                 <a class="btn btn-danger" href="tea_delete.php?id=<?php echo $a['id'] ?>">delete</a>
               </td>
             </tr>

            <?php } ?>
             
          </table>
        </div>
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
