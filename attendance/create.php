/<?php 
 include('config.php');

 if(isset($_POST['submit'])){

 	$id = $_POST['id'];
 	$fname = $_POST['fname'];
 	$lname = $_POST['lname'];
 	$gender = $_POST['gender'];
 	$doj = $_POST['doj'];
 	$dob = $_POST['dob'];
 	$email = $_POST['email'];
 	$password = $_POST['password'];
 	$newpassword = $_POST['newpassword'];
 	$mobile = $_POST['mobile'];
 	$emobile = $_POST['emobile'];
 	$position = $_POST['position'];

 	if($password != $newpassword){?>
	<script type="text/javascript">
		window.location.href='registration.php';
		alert('Confirm password is incorrect!');
	</script>
    <?php  die();} 

 	$sql = "INSERT INTO `emp`(id, fname, lname, gender, doj, dob, email, password, mobile, emobile, position, authority) VALUES('$id', '$fname', '$lname', '$gender', '$doj', '$dob', '$email', '$password', '$mobile', '$emobile', '$position', 'user')";

 	echo $query = mysqli_query($con, $sql);


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