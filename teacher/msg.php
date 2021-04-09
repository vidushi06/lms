<?php 
include "sidebar.php";
?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
    <?php include "header.php" ?>

      <div class="container">
      <br>  
        <div class="card">
            <div class="card-header">
                
              <h3 class="mt-4 card-title"><i class="fa fa-user" aria-hidden="true"></i>Send msg</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <form method="post" action="m.php">
                    <div class="row">
                      <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" name="message" class="form-control">
                          </div>
                      </div>
                       <div class="col-md-4">
                          <div class="form-group">
                              <input type="hidden" name="send_from" value="<?php echo $_SESSION['tea_email'] ?>">
                               <?php
                                   include 'dbcon.php';
                                   if (isset($_GET['id'])) {
                                      $id = $_GET['id'];
                                      $data = "SELECT * FROM user WHERE id = $id";
                                      $result = mysqli_query($con,$data);
                                      $a = mysqli_fetch_array($result);
                                    }
                                ?>
                              <input type="hidden" name="send_to" value="<?php echo $a['id'] ?>">
                              <button name="submit" class="btn btn-info">send</button>
                            
                          </div>
                        </div>
                      </div>
                </form>   
              </table>
            </div>
              <!-- /.card-body -->
         </div>
            <!-- /.card -->
        <br>

           <div class="card">
              <div class="card-header">
                
                 <h3 class="mt-4 card-title"><i class="fa fa-user" aria-hidden="true"></i>Previous messages</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table class="table table-bordered table-striped">
                    
                   
                         <?php

                            include "dbcon.php"; 
                            $id = $_GET['id'];
                            $data = "SELECT * FROM msg WHERE send_to = $id";
                            $result = mysqli_query($con,$data);
                            while($s = mysqli_fetch_array($result))
                            {
                        ?>
          
          <ul>
            <li><?php echo $s['message']?></li>
          </ul>
          <?php } ?>
                                       
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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


<!--msg insert--->

