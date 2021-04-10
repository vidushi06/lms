<?php 
include "sidebar.php";
?>


    <!-- Page Content -->
    <div id="page-content-wrapper">
    	
      <?php include "header.php" ?>
      <div class="container" >
        <h3 class="text-center mt-4"><i class="fa fa-paper-plane" aria-hidden="true"></i> Assignments</h3>
        
          <!-- Main content -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Assignment</h3>
                <button class="btn btn-primary mr-auto " data-target="#aa"  data-toggle="modal" style="margin-left: 20px">Add Assignment</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>File</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                     include "dbcon.php";
                     $i=1;
                    $data= "SELECT * from assignment_list ORDER BY b_id desc" ;
                     $result=mysqli_query($con,$data);
                      while($a=mysqli_fetch_array($result)){
                  ?>

                    <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $a['title'] ?></td>
                     <td><?php echo $a['description'] ?></td>
                    <td>

                      <?php echo $a['filee'] ?>
                      <br>
                      <form method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="id" value="<?php echo $a['b_id'] ?>"><br>
                        <input type="file" name="image"><br><br>
                        <input type="submit" name="update" value="update" class="btn btn-dark">
                      </form>

                      <small>Note: Refresh the page after updation</small>

                    </td>


                    <td>
                      <a href="assignment_edit.php?id=<?php echo $a['b_id'] ?>" class="btn btn-primary">edit</a>
                      <a href="assignment_delete.php?id=<?php echo $a['b_id'] ?>" class="btn btn-danger">delete</a>
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
            <?php 
include "dbcon.php";
if(isset($_POST['update'])){
  $id = $_POST['id'];
  $filename = $_FILES['image']['name'];
  $tmpname = $_FILES['image']['tmp_name'];

  $file = "upload/" .$filename;
  //print_r($file);
  move_uploaded_file($tmpname, $file);

  $update = "UPDATE assignment_list set image = '$file' WHERE b_id = $id";
  $result = mysqli_query($con,$update);
  
}


?>

  <!--end of update image--->











<!--pop up-->
<div class="modal fade" id="aa" >
        <div class="modal-dialog"  >
            <div class="modal-content">
              <div class="modal-header">
              <h3 class="modal-tittle">Add Assignment</h3>
               <button type="button" class="" data-dismiss="modal">
          <span >&times;</span>
        </button> 
                </div>
              <div class="modal-body">
                 <form method="post" enctype="multipart/form-data" action="assignment_insert.php">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" name="description" class="form-control"></textarea>
                  </div>
                   <div class="form-group">
                    <label>Add file</label>
                    <input type="file" name="filee" class="form-control">
                  </div>
                  <input type="submit" name="submit" class="btn btn-info">
                 </form>  
            </div>
        </div>
</div>
<!--end pop up-->










          
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