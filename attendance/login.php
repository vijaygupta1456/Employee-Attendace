<?php include('config.php');?>
<?php include('header.php');?>
<style type="text/css">
	body{
		background-color: #22507a;
	}
  .popup{
      background: rgba(0, 0, 0, 0.6);
      width: 100%;
      height: 100%;
      max-height: auto;
      position: absolute;
      top: 0;
      display: none;
      justify-content: center;
      align-items: center;
    }
    .popup-content{
      /*height: 250px;*/
      width: 500px;
      background: #fff;
      padding: 20px;
      border-radius: 5px;
      position: relative;
    }
    .close{
      position: absolute;
      top: -15px;
      right: -15px;
      background: #fff;
      height: 20px;
      width: 20px;
      border-radius: 50%;
      box-shadow: 6px 6px 29px -4px rgba(0, 0, 0, 0.75);
      cursor: pointer;
    }
</style>

<body id="log">
<div class="container" style="background-color:#22507a;">
	<section class="vh-80">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="img/login.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" style="color:#fff"> 
        	<br><br>
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3" >Email address</label>
            <input type="email" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Password</label>
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#" id="link" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="login" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="homepage.php"
                class="link-danger">Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</div>
</body>
<br>
</html>




<?php

if (isset($_POST['login'])) {
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $que = "SELECT * FROM emp WHERE email ='$email' AND password = '$password'";
    $query = mysqli_query($con,$que);
    $row = mysqli_fetch_assoc($query);
    if ($row>0) {
      $_SESSION['email'] = $row['email']; 
      $_SESSION['password'] = $row['password']; 
      $_SESSION['logged_in'] = 'Yes';

      if( $row['authority'] == "user"){
        header('location: dashboard.php');
        }
        else{
          header('location: admin_view.php');
        }
    }else{
      echo "Email or password wrong!";
    } 
  }

?>


