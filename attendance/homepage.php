<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <meta name="robots" content="noindex, nofollow">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/header.css">
  <style type="text/css">
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
  </head>
<body>
  <header id="header">

    <div class="logo">
      <a href="" rel="home"><img alt="Akonto-logo" src="img/logo.png"><strong>AKONTO<span>PAY</span></strong></a>
    </div>
    <div class="sign" style="margin-left: 1050px;">
      <a href="#" id="link"><strong>Admin-Sign-up</strong></a><b>/</b>
    	<a href="registration.php"><strong>Sign-up</strong></a><b>/</b>
    	<a href="login.php"><strong>Login</strong></a>
    </div>
  </header>

  <section id="sec" class="sec" style="background-color:#22507a; color:#fff">
  	<div class="container">
  		<div class="row">
  			<div class="col-md-5" id="des">
  				<h1>Akontopay- NeoBanking All in one Banking Platform.</h1><br>
  				<p>Gain all the necessary financial insights and tools to create, build and develop your business</p>
          
  			</div>
  			<div class="col-md-7" id="des2">
  			 <img src="https://bootstrapmade.com/demo/templates/Arsha/assets/img/hero-img.png"  alt="">
  			</div>
  		</div>
  	</div>
  </section>
</body>

<div class="popup">
<?php 
if(isset($_POST['submit1'])){
  $pass = $_POST['password'];
  $num1 = '125';
  if( $pass == $num1){
    header('location: adminRegistration.php');
  }
  else{ ?>
    <script>
      alert('Only authorised persons allowed.');
    </script>
  <?php }
}
?>
  <form  method="POST">
  <div class="popup-content">
    <img src="img/close.png" alt="close" class="close">
    <img src="img/user-trans.jpg" alt="user" width="40px"><br><br>
        <label class="form-label">Security code</label><br>
        <input type="Password" name="password">
        <br><br>
        <button type="submit" name="submit1" style="margin-left: 310px;">Submit</button>
  </div>
  </form>
</div>
</html>

<script type="text/javascript">
  document.getElementById("link").addEventListener("click", function(){
  document.querySelector(".popup").style.display = "flex";
}) 

document.querySelector(".close").addEventListener("click", function(){
  document.querySelector(".popup").style.display = "none";
})
</script>