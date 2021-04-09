<?php 
include "sidebar.php";
?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
    	
      <?php include "header.php" ?>
      <div class="container" >
        <h3 class="text-center mt-4"><i class="fa fa-file-text" aria-hidden="true"></i> Mark Student Attandance</h3>
        <button class="btn btn-info" data-toggle="modal" data-target="#attandance">View marked attandances</button>
        <div class="row">
            <h4 class="mt-4"><i class="fa fa-list" aria-hidden="true"></i> Student List</h4>
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">NAME</th>
                  </tr>
                </thead>

                <form method="post">
                  <tbody>
                      <?php
                        include "dbcon.php";
                         $q = "SELECT * FROM user where role = 'student' ORDER BY name";
                         $res = mysqli_query($con,$q); 
                        while($a=mysqli_fetch_array($res)) 
                          {
                      ?>
                      <tr> 
                        <td>
                          <input type="checkbox" name="id[]" value="<?php echo $a['id']?>">
                               <?php echo $a['name'];?>   
                        </td>
                      </tr>
                     <?php } ?>  
                  </tbody>
              </table><br>
              
                  
                    <input type="text" name="subject" class="form-control" placeholder="Enter Subject"><br>
                    <input type="date" name="atandance_date" class="form-control" placeholder="Enter Date">
                  
              
              <br>

          
              <input type="hidden" name="assign_by" value="<?php echo $_SESSION['tea_email'] ?>">
              <br>
              <input type="submit" name="submit" value="submit" class="btn btn-primary"> 
   
     
          
          </div> 

      </form>
          
      </div>


    </div>
    <!-- /#page-content-wrapper -->

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


<!--php  code-->
<!-- leaves Modal -->
  <div class="modal fade" id="attandance" role="dialog"  style="overflow-x: auto;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title text-light">Leaves</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
          <p></p>
          <table class="table">
            <tr>
              <th>S no.</th>
              <th>Date</th>
              <th>Edit</th>
            </tr>
            <?php
              include "dbcon.php";
              $i = 1;
              $data = "SELECT * FROM attandance WHere Subject = 'english' ORDER BY 'date_time'";
              $result= mysqli_query($con,$data);
              while($a = mysqli_fetch_array($result)){

          ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $a['date_time'] ?></td>
              <td><button class="btn btn-info">Edit</button></td>
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


