<?php 
include "sidebar.php";
 ?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
    
      <?php include "header.php" ?>

      <div class="container" style="overflow-y: auto;">
        <h2 class="mt-4">Leaves</h2>
          <table class="table table-stripped">
            <tr class="shadow">
              <th>S no.</th>
              <th>Valid from</th>
              <th>Valid to</th>
              <th>On occasion of</th>
              <th>assign on</th>
            </tr>
            <?php
              include "dbcon.php";
              $i = 1;
              $data = "SELECT * FROM leaves";
              $result= mysqli_query($con,$data);
              while($a = mysqli_fetch_array($result)){

          ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $a['valid_from'] ?></td>
              <td><?php echo $a['valid_to'] ?></td>
              <td><?php echo $a['occasion'] ?></td>
              <td><?php echo $a['date_time'] ?></td>
            </tr>
          <?php }?>
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
