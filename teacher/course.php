<?php 
include "sidebar.php";
?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
    <?php include "header.php" ?>


      <div class="container" style="overflow-y: auto;">
        <h1 class="mt-4"><i class="fa fa-user" aria-hidden="true"></i>Upload Course</h1>
          <!-- Main content -->
        <div class="card">
              <div class="card-header">
                <button class="btn btn-primary mr-auto " data-target="#ac"  data-toggle="modal" style="margin-left: 20px">Add course</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                     include "dbcon.php";
                     $i=1;
                    $data= "SELECT * from course ORDER BY d_id desc" ;
                     $result=mysqli_query($con,$data);
                      while($a=mysqli_fetch_array($result)){
                  ?>

                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $a['d_title'] ?></td>
                     <td><?php echo $a['d_description'] ?></td>
                    <td>

                      <img src="<?php echo $a['d_image'] ?>" style="height: 190px;width: 280px;margin:auto;">
                      <br>
                      <form method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="id" value="<?php echo $a['d_id'] ?>"><br>
                        <input type="file" name="d_image"><br><br>
                        <input type="submit" name="update" value=" image update" class="btn btn-dark">
                      </form>

                      <small>Note: Refresh the page after updation</small>

                    </td>


                    <td>
                      <a href="course_edit.php?id=<?php echo $a['d_id'] ?>" class="btn btn-primary">edit</a>
                      <a href="course_delete.php?id=<?php echo $a['d_id'] ?>" class="btn btn-danger">delete</a>
                    </td>
                    </tr>

                    <?php } ?>
                  
                  </tbody>

                  <tfoot>

                    
                  </tfoot>
                  
                
                   </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div>
      <!--update image--->

<?php 
include "dbcon.php";
if(isset($_POST['update'])){
  $id = $_POST['id'];
  $filename = $_FILES['d_image']['name'];
  $tmpname = $_FILES['d_image']['tmp_name'];

  $file = "upload/" .$filename;
  //print_r($file);
  move_uploaded_file($tmpname, $file);

  $update = "UPDATE course set d_image = '$file' WHERE d_id = $id";
  $result = mysqli_query($con,$update);
  
}


?>

  <!--end of update image--->










<!--pop up-->
<div class="modal fade" id="ac" >
        <div class="modal-dialog"  >
            <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-tittle">Add course</h3>
               <button type="button" class="" data-dismiss="modal">
          <span >&times;</span>
        </button> 
                </div>
              <div class="modal-body">
                 <form method="post" enctype="multipart/form-data" action="course_insert.php">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="d_title" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="d_description" class="form-control"></textarea>
                  </div>
                   <div class="form-group">
                    <label>image</label>
                    <input type="file" name="d_image" class="form-control">
                  </div>
                  <input type="submit" name="submit" class="btn btn-info">
                 </form>  
            </div>
        </div>
</div>
<!--end pop up-->










      
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