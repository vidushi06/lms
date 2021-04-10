<?php 
//include 'filelogic.php';
include "sidebar.php";
?>

    <!-- Page Content -->
    <div id="page-content-wrapper">
    	
      <?php include "header.php" ?>
      
      <div class="container">

           <h3 class="text-center mt-4"><i class="fa fa-file-text" aria-hidden="true"></i> Detailed Course</h3>
          <br><br>
          <article class="blog-post px-3 py-5 p-md-5">
    <div class="container">
      <?php
include "dbcon.php";
if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $data = "SELECT * from course where d_id =$id";
  $res = mysqli_query($con,$data);
  $a = mysqli_fetch_array($res);

}

?>
      <header class="blog-post-header">
        <h2 class="title mb-2"><?php  echo $a['d_title'] ?></h2>
      </header>
          
      <div class="blog-post-body">
        <figure class="blog-banner">
            <!-- <a href="#"><img class="img-fluid" src="teacher/<?php echo $a['d_image'] ?>" alt="image" style="width: 100%"></a> -->
            <br>
          
        </figure>
        <p><?php echo $a['d_description'] ?></p>
      </div>
    </div>
  </article>
      </div>
    



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