    <?php include "sidebar.php" ?>
    

    <!-- Page Content -->
    <div id="page-content-wrapper">

    <?php include "header.php" ?>

      <div class="container">
          <div class="row">
            <div class="col-md-3">
              <button data-toggle="modal" data-target="#myModal" class="mt-4 btn btn-primary"> View leaves <i class="fa fa-pause" aria-hidden="true"></i></button>
            </div>
            <div class="col-md-6">
              <h3 class="mt-4"><i class="fa fa-pause" aria-hidden="true"></i> Assign Leave</h3>
              <form method="post" action="leave_assign.php">
                  <div class="form-group">
                     <label>valid from</label>
                     <input type="date" name="valid_from" class="form-control">
                  </div>
            
                  <div class="form-group">
                     <label>valid to</label>
                     <input type="date" name="valid_to" class="form-control">
                  </div>

                  <div class="form-group">
                     <label>Occasion</label>
                     <input type="text" name="occasion" placeholder="occasion" class="form-control">
                  </div>

                  <input type="hidden" name="assign_by" value="<?php echo $_SESSION['admin_email'] ?>">
                  <input type="submit" name="submit" value="Assign leave" class="btn btn-primary"> 
              </form>
              
            </div><!--end of col-->
            <div class="col-md-3"></div>
            
          </div><!--end of row-->
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


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog"  style="overflow-x: auto;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title">Leaves</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
          <p></p>
          <table class="table">
            <tr>
              <th>S no.</th>
              <th>Valid from</th>
              <th>Valid to</th>
              <th>On occasion of</th>
              <!-- <th>assiged by</th> -->
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
              <!-- <td><?php echo $a['assign_by'] ?></td> -->
              <td><?php echo $a['date_time'] ?></td>
            </tr>
          <?php }?>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>








