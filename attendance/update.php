<?php 
include('config.php');

if(isset($_POST['submit'])){
    $id = $_POST['id'];
 	$fname = $_POST['fname'];
 	$lname = $_POST['lname'];
 	$gender = $_POST['gender'];
 	$doj = $_POST['doj'];
 	$dob = $_POST['dob'];
 	$email = $_POST['emp_id'];
 	$password = $_POST['password'];
 	$mobile = $_POST['mobile'];
 	$emobile = $_POST['emobile'];
 	$position = $_POST['position'];

echo $sql = "UPDATE emp SET id = '$id', fname = '$fname', lname = '$lname', gender = '$gender', doj = '$doj', dob = '$dob', email = '$email', password = '$password', mobile = '$mobile', emobile = '$emobile', position = '$position' WHERE email = '$email'";
// exit();
$query = mysqli_query($con, $sql);
if($query){ ?>
	<script type="text/javascript">
		window.location.href='dashboard.php';
		alert('update has successful');
	</script>
<?php }
else{
	echo 'not saved!';
}
}
?>