<?php 
include "sidebar.php";
 ?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
    
      <?php include "header.php" ?>

      <div class="container">
        <h1 class="mt-4"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Welcome Back!!</h1>
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