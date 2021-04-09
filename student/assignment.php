<?php 
include "sidebar.php";
?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
    	
      <?php include "header.php" ?>
      
      <div class="container">

           <h3 class="text-center mt-4"><i class="fa fa-paper-plane" aria-hidden="true"></i> Assignments</h3>
          <br><br>
          <?php

          include "dbcon.php";
          $data= "SELECT * from assignment_list ORDER BY b_id desc" ;
                $result=mysqli_query($con,$data);
                while($a=mysqli_fetch_array($result)){

          ?>
          <div class="item mb-5">
            <div class="media">
              <!-- <img class="mr-3 img-fluid post-thumb  d-md-flex" src="yeacher/<?php echo $a['image'] ?>" alt="image"> -->
              <div class="media-body">
                <h3 class="title mb-1"><a href="#"><?php echo $a['title'] ?></a></h3>
                <div class="meta mb-1">Created at : <span class="date"><?php echo $a['created_at']  ?></span></div>
                <div class="intro"><?php echo substr($a['description'],0,400);?></div>
                <div class="intro"><?php echo substr($a['description'],0,400);?></div>
                <a class="more-link" href="#" style="color: #1762dd" data-toggle="modal" data-target="#">add submission &rarr;</a>
              </div><!--//media-body-->
            </div><!--//media-->
          </div><!--//item-->
            <?php  } ?>
          <a class="nav-link-next nav-item nav-link rounded" href="#"  style="background-color: #1762dd;color: white">Next<i class="arrow-next fas fa-long-arrow-alt-right"></i></a>
        </nav>
        
        </div>



  </div>
  <!-- /#wrapper -->


<!--php code-->
<?php
include "dbcon.php";
if(isset($_POST['submit'])){
  $a = $_POST['id'];
  // print_r($a);
  $b = $_POST['assign_by'];
  $c = $_POST['subject'];
  $d = $_POST['atandance_date'];
  foreach ($a as $stu) {
     // print_r($stu);
  $data = "INSERT INTO attandance(stud_id,marked_by,subject,atandance_date) values ('$stu','$b','$c','$d')";
  $res = mysqli_query($con,$data);
  if($res){
    echo "<script>alert('sucessfully submitted!!')</script>";
   }
  else{
    echo "<script>alert('someting went wrong!!')</script>";
  }

  }
}

?>



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