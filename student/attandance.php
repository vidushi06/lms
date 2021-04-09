<?php 
include "sidebar.php";
 ?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
    
      <?php include "header.php" ?>

      <div class="container">
        <h2 class="mt-4">Attandance</h2>
      
        <table class="table">
            <tr class="shadow">
                <th>S no.</th>
                <td>Date</td>
                <td>Subject</td>
            </tr>
            <?php

              include "dbcon.php";

              $i = 1;
              $a= $_SESSION['stu_id'];
              $data = "SELECT * FROM attandance WHERE stud_id = '$a' ORDER BY date_time";
              $result= mysqli_query($con,$data);
              while($b = mysqli_fetch_array($result)){
            ?>

            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $b['date_time']; ?></td>
                <td><?php echo $b['subject']; ?></td>
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
