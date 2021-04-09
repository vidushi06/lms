<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div>
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['tea_email'];   ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#leaves" ><i class="fa fa-sign-out" aria-hidden="true"></i>  Leaves</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>




<!-- leaves Modal -->
  <div class="modal fade" id="leaves" role="dialog"  style="overflow-x: auto;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-primary">
            <h4 class="modal-title text-light">Leaves</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>          
        </div>
        <div class="modal-body">
          <p></p>
          <table class="table table-bordered">
            <tr>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


