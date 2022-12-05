<?php 
include('header.php'); 
include('config.php');

if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pword = $_POST['pword'];
	$nword = $_POST['nword'];

	if($pword != $nword){?>
	<script type="text/javascript">
		window.location.href='adminRegistration.php';
		alert('Confirm password is incorrect!');
	</script>
    <?php  die();}

	$sql = "INSERT INTO emp(fname, lname, email, password, authority ) VALUES('$fname', '$lname', '$email', '$pword', 'admin')";
	$query = mysqli_query($con, $sql);

	if($query){ ?>
	<script type="text/javascript">
		window.location.href='login.php';
		alert('You have sucessfully registered');
	</script>
    <?php } 
    else{
	  echo "You have not  registered<br>";
    }
}

?>

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" method="POST">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Your Fist Name</label>
                      <input type="text" name="fname" id="form3Example1c" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c">Your Last Name</label>
                      <input type="text" name="lname" id="form3Example1c" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example3c">Your Email</label>
                      <input type="email" name="email" id="form3Example3c" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" name="pword" id="form3Example4c" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      <input type="password" name="nword" id="form3Example4cd" class="form-control" />
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>


              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://colorlib.com/etc/regform/colorlib-regform-7/images/signup-image.jpg"
                  class="img-fluid" alt="Sample image">

              </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</body>
</html>