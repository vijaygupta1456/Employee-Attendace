<?php 

include('dashboard_header.php');
include('config.php');

@session_start();

$email3 = $_SESSION['email'];


$s ="SELECT id,fname,lname,position,image FROM `emp` WHERE email = '$email3'";
$query = mysqli_query($con, $s);
$d = $query->fetch_assoc();
$detail = [];
if(isset($_POST['submit'])){
	$select = $_POST['select'];

	$date=date_create();
    $date = date_format($date,"d/m/Y");
    date_default_timezone_set("Asia/Calcutta");
    $time = date_create();
    $time = date_format($time,"h:i A");

    $sql1 = "INSERT INTO `attendance_histry`(email_id, `date`, type, `time`) VALUES('$email3', '$date', '$select', '$time')";
    $query1 = mysqli_query($con, $sql1);

    if($select ==1){
    	$sel = mysqli_query($con, "SELECT * FROM attendance WHERE `userid` = '$email3' AND `Date` = '$date'");
        if(mysqli_num_rows($sel)>0) {
            exit();
        }
        else{
        	$sel1 = "INSERT INTO `attendance`(userid, `Date`, `in`) VALUES('$email3', '$date', '$time')";
        	$query2 = mysqli_query($con, $sel1);
        }
    }
    else{
    	$sql2 = "UPDATE `attendance` SET `out` = '$time' WHERE `Date` = '$date'";
    	$query3 = mysqli_query($con, $sql2);
    }


}
    $sql3 = "SELECT * FROM `attendance` WHERE `userid` = '$email3'";
    $result = mysqli_query($con, $sql3);

    $num = mysqli_num_rows($result);


    
    if($num > 0){
	   while($row = mysqli_fetch_assoc($result)){
		 array_push($detail, $row);
	   }
    }

    $today = [];
    $date=date_create();
    $date = date_format($date,"d/m/Y");
    $sql4 = "SELECT *, IF(type=1, 'IN', 'OUT') as type FROM `attendance_histry` WHERE `email_id` = '$email3' AND `date` = '$date'";
    $result1 = mysqli_query($con, $sql4);

    $num1 = mysqli_num_rows($result1);

    if($num1 > 0){
	   while($row = mysqli_fetch_assoc($result1)){
		 array_push($today, $row);
	   }
    }

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style type="text/css">
	.gradient-custom-2 {
       background: #22507a;
       background: -webkit-linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1));
       /*background: linear-gradient(to right, rgba(251, 194, 235, 1), rgba(166, 193, 238, 1))*/
    }
    a{
    	text-decoration: none;
    }
    #upload {
      position: relative;
      /*overflow: hidden;*/
    }
    #file {
      position: absolute;
      font-size: 20px;
      opacity: 0;
      right: 0;
      top: 0;
    }
    #link1, #link2, #link3{
    	width: 80px;
    	background: #ededeb;
    	padding: 6px 9px;
    	color: #082540;
    	/*font-weight: bolder;*/
    	font-size: 18px;
    	border-radius: 5px;
    	box-shadow: 6px 6px 29px -4px rgba(0, 0, 0, 0.75);
    	margin: 15px;
    	transition: 0.4s;
    }
    .popup, .popup1, .popup2{
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
    .close, .close1, .close2{
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
    table{
    	margin: 0px 10px;
    }
/*----------dropdown--------------*/

.dropbtn {
  background: #ededeb;
  color: #3a79d6;
  padding: 6px 9px;
  font-size: 18px;
  border: none;
  cursor: pointer;
}

/*.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}*/



.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  right: 0;
  z-index: 1;
}

.dropdown-content a {
  color: #185880;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

</style>

<form>
	<section class="h-100 gradient-custom-2" style="background-color:#22507a;">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col col-lg-9 col-xl-7" style="width: 67.33333333%;">
					<div class="card">
						<div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
							<div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
								<div class="preview">
									<?php 
									$img = 'img/dprofile.webp';
									if($d['image'] != ''){
										$img = 'img/'.$d['image'];
									}
									?>
									<img src="<?php echo $img;?>"
									alt="dprofile.webp" id="img" class="img-fluid img-thumbnail mt-4 mb-2"
									style="width: 150px; z-index: 1">
									</div>
								<div id="upload" class="file btn btn-outline-dark">
							       Edit
							       <input id="file" type="file" name="file"/>
						        </div>
						</div>
						<div class="ms-3" style="margin-top: 130px;">
							<h5><?php echo "$d[fname] $d[lname]"; ?></h5>
							<p><?php echo "$d[position]"; ?></p>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6"></div>
						<div id="link1" class="col-md-2"><a href="#"><b>In/Out</b></a></div>
						<div id="link3" class="col-md-2"><a href="#"><b>Details</b></a></div>
						<div id="link2" class="col-md-2" >
							<div class="dropdown">
                                   <button type="button" onclick="myFunction()" class="dropbtn"><b>More</b></button>
                                   <div id="myDropdown" class="dropdown-content">
                                          <a href="#" id="tdetail">Today's Detail</a>
                                          <a href="edit_user.php">Edit</a>
                                   </div>
                            </div>
						</div>
					</div>
					<br><br>

					
					
					<div class="card-body p-4 text-black">
						<div class="mb-5">
							<p class="lead fw-normal mb-1">About</p>
							<div class="row" id="about" style="background-color: #f8f9fa; padding: 20px 15px;">
								<div class="col-md-3">
									<h5>TOTAL</h5>
									<?php $total = date('d'); ?>
									<p style="margin-left:22px" id="total"><?php echo $total; ?></p>
								</div>
								<div class="col-md-3">
									<h5>PRESENT</h5>
									<p style="margin-left:30px"><?php echo $num; ?></p>
								</div>
								<div class="col-md-3">
									<?php $total = date('d'); ?>
									<?php $absent = $total-$num;?>
									<h5>ABSENT</h5>
									<p style="margin-left:30px"><?php echo $absent; ?></p> 
								</div>
								<div class="col-md-3">
									<h5>RATIO</h5>
									<?php $ratio = $num/$total*100;?>
									<p><?php echo number_format($ratio, 2); ?>%</p>
								</div>
							</div>
						</div>
					</div>

					<div class="card-body p-4 text-black">
						<div class="mb-5">
							<p class="lead fw-normal mb-1">Status</p>
							<div class="row" id="about" style="background-color: #f8f9fa; padding: 20px 228px 20px 27px;">
								
								<table class="table">
									<?php 
									$H = 0; $F = 0; $S = 0; $A = 0;
									if(count($detail) > 0){
	 			                        $sl = 0;
	 			                        foreach ($detail as $dtime) {
	 			                        	$timestamp1 = $dtime['in'];  
                                            $timestamp2 = $dtime['out']; 
    
                                            $num1 = date("H", strtotime($timestamp1)) * 60  + date("i", strtotime($timestamp1));
                                            $num2 = date("H", strtotime($timestamp2)) * 60 + date("i", strtotime($timestamp2));

                                            $dif = abs($num2 - $num1);

                                            if( $dif < 210){
                                            	++ $A;
                                            }
                                            elseif (210 <= $dif AND $dif <= 360) {
                                            	++ $H;
                                            }
                                            elseif (360 < $dif AND $dif < 500) {
                                            	++ $S;
                                            }
                                            elseif (500 <= $dif ) {
                                            	++ $F;
                                            }
                                        }
                                    }
									?>
									<thead>
										<tr>
											<th>Attendance Type</th>
											<th>Percentage</th>
											<th>P/T</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>FULL DAY</td>
											<?php 
											if($num >0){
											  $ratio = $F/$num*100;
											}
											else{
												$ratio = 0;
											}?>
											<td><?php echo number_format($ratio, 2); ?>%</td>
											<td><?php echo $F ?>/<?php echo $num ?></td>
										</tr>
										<tr>
											<td>HALF DAY</td>
											<?php 
                                            if($num >0){
											 $ratio = $H/$num*100;
											}
											else{
												$ratio =0;
											}?>
											<td><?php echo number_format($ratio, 2); ?>%</td>
											<td><?php echo $H ?>/<?php echo $num ?></td>
										</tr>
										<tr>
											<td>SHORT LEAVE</td>
											<?php 
											if ($num >0) {
											  $ratio = $S/$num*100;
											}
											else{
												$ratio = 0;
											}?>
											<td><?php echo number_format($ratio, 2); ?>%</td>
											<td><?php echo $S ?>/<?php echo $num ?></td>
										</tr>
										<tr>
											<td>ABSENT</td>
											<?php 
											if($num >0){
												$ratio = $A/$num*100;
											}
											else{
												$ratio =0;
											}?>
											<td><?php echo number_format($ratio, 2); ?>%</td>
											<td><?php echo $A ?>/<?php echo $num ?></td>
										</tr>
									</tbody>
								</table>

							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
</form>
<div class="popup">
	<form action="dashboard.php" method="POST">
	<div class="popup-content">
		<img src="img/close.png" alt="close" class="close">
		<img src="img/user-trans.jpg" alt="user" width="40px">
		<h4 style="text-align: center; color:blue;">IN/OUT</h4>
        <label class="form-label">Choose option</label><br>
		<select name="select" class="" style="width: 370px; margin:0px 10px">
          <option value="0" disabled>Choose option</option>
          <option value="1">IN</option>
          <option value="0">OUT</option>
        </select>
        <br><br>
        <button type="submit" name="submit" style="margin-left: 310px;">Submit</button>
	</div>
	</form>
</div>

<div class="popup1" >
	<div class="popup-content">
		<img src="img/close.png" alt="close" class="close1">
		<div class="row">		
			<img class="col-md-2" src="img/user-trans.jpg" alt="user" width="40px">
			<h5 class="col-md-6" style="margin-top: 10px; color: #00a6eb"><b><?php echo "$d[fname] $d[lname]"; ?></b></h5>
		</div>
		<h4 style="text-align: center; color:skyblue; font-family: cursive; text-decoration: underline;">Details of IN/OUT</h4>
		<table class="table">
			<thead>
				<tr>
					<th>Sno</th>
					<th>Date</th>
					<th>In</th>
					<th>Out</th>
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
					<td><?php echo $dt['Date']; ?></td>
					<td><?php echo $dt['in']; ?></td>
					<td><?php echo $dt['out']; ?></td>
				</tr>
				<?php 
			         }
		        } ?>

			</tbody>
		</table>
	</div>
</div>

<div class="popup2" >
	<div class="popup-content">
		<img src="img/close.png" alt="close" class="close2">
		<div class="row">		
			<img class="col-md-2" src="img/user-trans.jpg" alt="user" width="40px">
			<h5 class="col-md-6" style="margin-top: 10px; color: #00a6eb"><b><?php echo "$d[fname] $d[lname]"; ?></b></h5>
		</div>
		<h4 style="text-align: center; color:skyblue; font-family: cursive; text-decoration: underline;">Today's IN/OUT</h4>
		<table class="table">
			<thead>
				<tr>
					<th>Sno</th>
					<th>Date</th>
					<th>Type</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
				<?php 
	 		        if(count($today) > 0){
	 			        $sl = 0;
	 			        foreach ($today as $td) {
				?> 
				<tr>
					<td><?php echo ++$sl ; ?></td>
					<td><?php echo $td['date']; ?></td>
					<td><?php echo $td['type']; ?></td>
					<td><?php echo $td['time']; ?></td>
				</tr>
				<?php 
			         }
		        } ?>

			</tbody>
		</table>
	</div>
</div>



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
                    $(".preview img").show(); // Display image element
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

/*----------------About------------------------*/
//total
const d = new Date();
let day = d.getDate()
document.getElementById("total").innerHTML = day; 

//present

/*---------------Link-Bar------------------------*/
 
 // in/out
document.getElementById("link1").addEventListener("click", function(){
	document.querySelector(".popup").style.display = "flex";
}) 

document.querySelector(".close").addEventListener("click", function(){
	document.querySelector(".popup").style.display = "none";
})

//detail
document.getElementById("link3").addEventListener("click", function(){
	document.querySelector(".popup1").style.display = "flex";
}) 

document.querySelector(".close1").addEventListener("click", function(){
	document.querySelector(".popup1").style.display = "none";
})

// More

     //for popup
document.getElementById("tdetail").addEventListener("click", function(){
	document.querySelector(".popup2").style.display = "flex";
}) 

document.querySelector(".close2").addEventListener("click", function(){
	document.querySelector(".popup2").style.display = "none";
})



function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

</script>
