<?php 
//include 'filelogic.php';
include "sidebar.php";
?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
    	
      <?php include "header.php" ?>
      
      <div class="container">

           <h3 class="text-center mt-4"><i class="fa fa-file-text" aria-hidden="true"></i> Course</h3>
          <br><br>
          <?php


          include "dbcon.php";
          $data= "SELECT * from course ORDER BY d_id desc" ;
                $result=mysqli_query($con,$data);
                while($a=mysqli_fetch_array($result)){

          ?>
          <div class="item mb-5">
            <div class="media">
              <!-- <img class="mr-3 img-fluid post-thumb  d-md-flex" src="teacher/upload/<?php echo $a['d_image'] ?>" alt="image"> -->
              <div class="media-body">
                 <h3 class="title mb-1"><a href="#"><?php echo $a['d_title'] ?></a></h3>
                 <div class="meta mb-1">Created at : <span class="date"><?php echo $a['date_time']  ?></span></div>
                 <div class="intro"><?php echo substr($a['d_description'],0,400);?></div>
                 <div class="intro"></div>
                 <a class="more-link" href="course_details.php?id=<?php echo $a['d_id'] ?>" style="color: #1762dd">view more &rarr;</a>
              </div><!--//media-body-->
            </div><!--//media-->
          </div><!--//item-->
            <?php  } ?>
          <a class="nav-link-next nav-item nav-link rounded" href="#"  style="background-color: #1762dd;color: white">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
        </nav>
        
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