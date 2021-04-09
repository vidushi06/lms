
<?php include "header.php"; ?>
	<header>
  		<div class="overlay"></div>
 		<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    	<source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
  		</video>
  		<div class="container h-100">
    		<div class="d-flex h-100 text-center align-items-center">
      			<div class="w-100 text-white">
        			<h1 style="letter-spacing: 3px;">Learning Management System</h1><br>
        			<p class="lead mb-0"><a href="login.php" class="btn btn-outline-warning" style="letter-spacing: 3px;font-size:20px;padding: 10px" data-toggle="modal" data-target="#myModal">Login</a></p>
      			</div>
    		</div>
  		</div>
	</header>
</body>
</html>





 <!--login modal-->
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p></p>
          <form method="post" action="login.php">
              <div class="form-group">
                  <input type="text" name="email" placeholder="Enter your email" class="form-control">
              </div>
              <div class="form-group">
                  <input type="password" name="password" placeholder="Enter valid Password" class="form-control">
              </div>
              <div>
                  <input type="submit" name="submit" value="Login" class="btn btn-warning">
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>






<!---registration modal--->
<!--registration button in header section-->
<!--insertion code at the end-->
  <!-- Modal -->
  <div class="modal fade" id="registration" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-warning">
            <h4 class="modal-title">Registration Form</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p></p>
          <form method="POST" onsubmit="return validation()" >
          <div class="form-group">
            <input type="text" id="user" name="name" placeholder="Enter name" class="form-control" required>
            <span id="usernamee" class="text-danger font-weight-bold"></span>
          </div>
          <div class="form-group">
            <input id="mail" type="email" name="email" placeholder="Enter email" class="form-control" required>
            <span id="emaill" class="text-danger font-weight-bold"></span>
          </div>
          <div class="form-group">
            <input class=" radio" type="radio" name="gender" value="female" class="form-control">female
            <input class=" radio" type="radio" name="gender" value="male" class="form-control">male
            <input class=" radio" type="radio" name="gender" value="other" class="form-control">other
          </div>
          <div class="form-group">
            <select class="form-control" name="department">
              <option>Select Department</option>
              <option>cs</option>
              <option>it</option>
              <option>me</option>
              <option>ec</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="role">
              <option>Select Role</option>
              <option>admin</option>
              <option>student</option>
              <option>teacher</option>
              
            </select>
          </div>
          <div class="form-group">
            <input type="text" name="phnum" id="mob" placeholder="Enter employee Phone no." class="form-control" required>
            <span id="mobnum" class="text-danger font-weight-bold"></span>
          </div>
         <!--  <div class="form-group">
            <input type="text" name="password" placeholder="Create a Password" class="form-control">
          </div> -->
          <div class="form-group">
                  <input type="password" id="password" name="password" placeholder="Create a password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" required>  
                  <span id="passwordd" class="text-danger font-weight-bold" ></span>        

                </div>
                <div id="message">
                    <h5>Password must contain the following:</h5>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
          <div>
            <input type="submit" name="submit" value="Register Now" class="btn btn-warning">
          </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


  <!-- registration insert -->

  <?php

include "dbcon.php";
if(isset($_POST['submit'])){
  $a = $_POST['name'];
  $b = $_POST['email'];
  $c = $_POST['gender'];
  $d = $_POST['department'];
  $e = $_POST['role'];
  $f = $_POST['phnum'];
  $h = $_POST['password'];

  $data = "INSERT INTO user(name,email,gender,department,role,phnum,password) VALUES ('$a','$b','$c','$d','$e','$f','$h')";
  $res = mysqli_query($con,$data);
  if($res){
    echo "<Script>alert('registration success!!')</script>";
    
    
  }
  else{
    echo "<Script>alert('Oops!!Try again.')</script>";
  }
  
}

?>

<!--registration form validation script-->
<script type="text/javascript">
 var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
} 
</script>