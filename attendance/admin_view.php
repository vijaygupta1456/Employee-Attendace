<?php 
include('dashboard_header.php'); 
include('config.php');




@session_start();

$email3 = $_SESSION['email'];


$s ="SELECT id,fname,lname,position,image FROM `emp` WHERE email = '$email3'";
$query = mysqli_query($con, $s);
$d = $query->fetch_assoc();


$sql = "SELECT * FROM emp WHERE `authority` = 'user'";
$query = mysqli_query($con, $sql);

$num = mysqli_num_rows($query);

$detail = [];
if($num > 0){
	while($row = mysqli_fetch_assoc($query)){
	 array_push($detail, $row);
	}
}


$date=date_create();
$date = date_format($date,"d/m/Y");
$sql = "SELECT * FROM attendance WHERE `Date` = '$date'";
$query = mysqli_query($con, $sql);

$num = mysqli_num_rows($query);

$attendance = [];
if($num > 0){
	while($row = mysqli_fetch_assoc($query)){
	 array_push($attendance, $row);
	}
}

?>

<link rel="stylesheet" type="text/css" href="css/admin_view.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>


<div class="container mt-5 mb-5">
            <div class="row no-gutters" style="border: 1px solid;">
                <div class="col-md-4 col-lg-4" id="preview">
                	<?php 
						$img = 'img/dprofile.webp';
						if($d['image'] != ''){
							$img = 'img/'.$d['image'];
						}
					?>
                	<img src="<?php echo $img;?>" alt="https://i.imgur.com/aCwpF7V.jpg" id="img"></div>
                <div class="col-md-8 col-lg-8">
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-dark text-white">
                            <h3 class="display-5"><?= $d['fname']." ".$d['lname'] ?></h3><i class="fa fa-facebook"></i><i class="fa fa-google"></i><i class="fa fa-youtube-play"></i><i class="fa fa-dribbble"></i><i class="fa fa-linkedin"></i></div>
                        <div class="p-3 bg-black text-white">
                            <h6 style="text-align:center;">ADMIN</h6>
                        </div>
                        <div class="d-flex flex-row text-white" style="height: 150px;">
                            <div class="text-center skill-block" style="width:740px; background-color: #526a75;">
                                <h4>Attendance</h4>
                                <h6>View Page</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="background-color: black;">
                	<div id="upload" class="file btn btn-outline-dark">
					    <b>EDIT</b>
						<input id="file" type="file" name="file"/>
					</div>
                </div>
                <div class="card-body p-4 text-black">
					<div class="mb-5">
						<p class="lead fw-normal mb-1" style="font-family: Constantia; font-size: 2pc;">Employee Detail<p>
						<div class="row" id="about" style="background-color: #f8f9fa; padding: 20px 15px;">
							<table>
								<thead>
									<tr>
										<th>Sno</th>
										<th style="width:400px">Name</th>
										<th>Detail</th>
										<th>Attendance</th>
									</tr>
								</thead>
								<tbody>
									<?php 
	 		                        if(count($detail) > 0){
	 			                       $sl = 0;
	 			                       foreach ($detail as $dt) {
				                    ?> 
									<tr>
										<td><?php echo ++$sl ; ?></td>
										<td><?php echo $dt['fname']."   ".$dt['lname']; ?></td>
										<td><button data-info="<?php echo base64_encode(json_encode($dt)); ?>" onclick="userview(this)" data-id="<?php echo $dt['sno']; ?>">Click</button></td>
										
										<td><button data-atten="<?php echo base64_encode(json_encode($dt)); ?>" onclick="attenview(this)" data-id="<?php echo $dt['sno']; ?>">Click</button></td>
									</tr>
									<?php }
								} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
        <div class="card-body p-4 text-black">
					<div class="mb-5">
						<p class="lead fw-normal mb-1" style="font-family: Constantia; font-size: 2pc;">Today's Attendees<p>
						<div class="row" id="about" style="background-color: #f8f9fa; padding: 20px 15px;">
							<table class="table">
								<thead>
									<tr>
										<th>Sno</th>
										<th>Name</th>
										<th>IN</th>
										<th>OUT</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if(count($attendance) > 0){
					                   $sl = 0;
					                   foreach ($attendance as $at) { 
									?>
									<tr>
										<td><?php echo ++$sl ; ?></td>
										<?php $sq = "SELECT fname, lname FROM emp WHERE `email` = '$at[userid]'";
										      $q = mysqli_query($con, $sq);
										      $n = mysqli_num_rows($q);
										      $name = [];
											  if($num > 0){
												while($row = mysqli_fetch_assoc($q)){
												 array_push($name, $row);
												}
											  }
											  if(count($name) >0){
											  	foreach ($name as $n) {
										?>
										<td><?php echo $n['fname'] ." ". $n['lname'] ; ?></td> <?php } } ?>
										<td><?php echo $at['in'] ; ?></td>
										<td><?php echo $at['out'] ; ?></td>
									</tr>
								<?php }
							} ?>
								</tbody>
							</table>
						</div>
					</div>
		</div>
            </div>
        </div>


<div class="popup" style="margin: 543px 0px 0px 1000px; width: 0%;
  height: 0%;">

	<div class="popup-content" style="background: #335d70eb;">
		<img src="img/close.png" alt="close" class="close">
		<div class="row">		
			<img class="col-md-2" src="img/user-trans.jpg" alt="user" width="40px">
			<h5 class="col-md-6" style="margin-top: 10px; color: #00a6eb"><b id="ename"></b></h5>
		</div>
		<h4 style="text-align: center; color:skyblue; font-family: cursive; text-decoration: underline;">Details of  <span id="bename"></span></h4>
		<table class="table">
			<tr>
				<th>ID</th>
				<td id="eid"></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td id="gn"></td>
			</tr>
			<tr>
				<th>Date of Joining</th>
				<td id="doj"></td>
			</tr>
			<tr>
				<th>Date of Birth</th>
				<td id="dob"></td>
			</tr>
			<tr>
				<th>Mobile Number</th>
				<td id="mob"></td>
			</tr>
			<tr>
				<th>Emergency Mobile Number</th>
				<td id="emob"></td>
			</tr>
			<tr>
				<th>Position</th>
				<td id="pos"></td>
			</tr>
		</table>
	</div>
</div>

<div class="popup1" style="margin: 543px 0px 0px 1006px; width: 47%;
  height: 0%;">
	<div class="popup-content" style="background: #335d70eb;">
		<img src="img/close.png" alt="close" class="close1">
		<div class="row">		
			<img class="col-md-2" src="img/user-trans.jpg" alt="user" width="40px">
			<h5 class="col-md-6" style="margin-top: 10px; color: #00a6eb"><b id="aname"></b></h5>
		</div>
		<h4 style="text-align: center; color:skyblue; font-family: cursive; text-decoration: underline;">Attendance Sheet </h4>
		<script type="text/javascript">
			var email1 = 'abhiraj@gmail.com';
		</script>
		<?php 
		$y = "<script>document.write(email1)</script>";
         ?>

		<?php 
		$sql1 = "SELECT * FROM attendance WHERE userid = '$y'";
		$query1 = mysqli_query($con, $sql1);
		$num1 = mysqli_num_rows($query1);
		$atten = [];
		if($num1 > 0){
			while($row = mysqli_fetch_assoc($query1)){
			 array_push($atten, $row);
			}
		}
		?>
		<table class="table">
			<thead>
				<tr>
					<th>Sno</th>
					<th>Date</th>
					<th>IN</th>
					<th>OUT</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(count($atten) > 0){
                   $sl1 = 0;
                   foreach ($atten as $at) { 
				?>
				<tr>
					<td><?php echo ++$sl1 ; ?></td>
					<td><?php echo $at['Date'];?></td>
					<td><?php echo $at['in'];?></td>
					<td><?php echo $at['out'];?></td>
				</tr>
			</tbody>
		<?php }
	}
	?>
		</table>

    </div>
</div>


<script type="text/javascript">

//image upload



//detail
// document.getElementById("detail").addEventListener("click", function(){
// document.querySelector(".popup").style.display = "flex";
// }) 

document.querySelector(".close").addEventListener("click", function(){
document.querySelector(".popup").style.display = "none";
})

//attendance
// document.getElementById("atten").addEventListener("click", function(){
// document.querySelector(".popup1").style.display = "flex";
// }) 

document.querySelector(".close1").addEventListener("click", function(){
document.querySelector(".popup1").style.display = "none";
})

function userview(thisobj) {

	if($(thisobj).attr('data-info') != ''){
		var jdata = JSON.parse(atob($(thisobj).attr('data-info')));

		$('#eid, #gn, #doj, #dob, #mob, #emob, #pos').html('');
		
		$('#eid').html(jdata.id);
		$('#ename,#bename').html(jdata.fname +' '+ jdata.lname);
		$('#gn').html(jdata.gender);
		$('#doj').html(jdata.doj);
		$('#dob').html(jdata.dob);
		$('#mob').html(jdata.mobile);
		$('#emob').html(jdata.emobile);
		$('#pos').html(jdata.position);
		// console.log(json_data);
		$(".popup").show();
	}
}

// atten

function attenview(thisobj){

	if($(thisobj).attr('data-atten') != ''){
		var adata = JSON.parse(atob($(thisobj).attr('data-atten')));

		$( '#aname').html('');

		$('#aname').html(adata.fname +' '+ adata.lname);
		$(".popup1").show();
	}
}
</script>

<script type="text/javascript">
	$(document).ready(function(){

    $("#file").change(function(){

        var fd = new FormData();
        var files = $('#file')[0].files;
        
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);

           $.ajax({
              url: 'upload.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                    $("#img").attr("src",response); 
                    $("#preview img").show(); // Display image element
                 }else{
                    alert('file not uploaded');
                 }
                 location.reload();
              },
           });
        }else{
           alert("Please select a file.");
        }
    });
});
</script>

