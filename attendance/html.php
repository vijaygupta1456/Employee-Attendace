<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CHECK</title>
</head>
<style type="text/css">
	html {
	background: #e67e22;
}
* {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}
.hair {
	width: 40px;
    height: 30px;
    top: -78px;
    left: -37px;
    border-radius: 50%;
    border: 8px solid #323232;
    border-color: #323232 transparent transparent transparent;
    -webkit-transform: translateX(0%) rotate(-32deg);
}
.hair div {
    width: 40px;
    height: 30px;
    top: 3px;
    left: 9px;
    border-radius: 50%;
    border: 8px solid #323232;
    border-color: #323232 transparent transparent transparent;
    -webkit-transform: translateX(0%) rotate(66deg);
}
.head {
	width: 100px;
	height: 150px;
	background: #f1c40f;
	border-radius: 50px 50px 35px 35px;
}
.right-hand {
    border-radius: 35%;
    top: 58%;
    left: 65%;
    width: 30px;
    height: 50px;
    border: 8px solid #f1c40f;
    border-color: #f1c40f #f1c40f transparent transparent;
    -webkit-transform: translateX(0%) rotate(0deg);
}
.wrist {
    width: 12.5px;
    height: 5px;
    background: #323232;
    left: 115%;
    top: 80%;
    border-radius: 25px;
}
.finger-1 {
    width: 12px;
    height: 20px;
    background: #323232;
    left: 129%;
    top: 105%;
    border-radius: 0px 50px 50px 50px;
}
.finger-2 {
    width: 8px;
    height: 20px;
    background: #323232;
    left: 99%;
    top: 105%;
    border-radius: 50px 0px 60px 60px;
}
.finger-3 {
    width: 10px;
    height: 12px;
    background: #323232;
    left: 73%;
    top: 87%;
    border-radius: 50%;
    -webkit-transform: translateX(0%) rotate(30deg);
}
.left-hand {
    border-radius: 35%;
    top: 58%;
    left: -11%;
    width: 30px;
    height: 50px;
    border: 8px solid #f1c40f;
    border-color: #f1c40f transparent transparent #f1c40f ;
    -webkit-transform: translateX(0%) rotate(0deg);
}
.left-wrist {
    width: 12.5px;
    height: 5px;
    background: #323232;
    left: -10%;
    top: 80%;
    border-radius: 25px;
}
.left-finger-1 {
    width: 12px;
    height: 20px;
    background: #323232;
    left: -17%;
    top: 105%;
    border-radius: 50px 0px 50px 50px;
}
.left-finger-2 {
    width: 8px;
    height: 20px;
    background: #323232;
    left: 11%;
    top: 105%;
    border-radius: 0px 50px 60px 60px;
}
.left-finger-3 {
    width: 10px;
    height: 12px;
    background: #323232;
    left: 3%;
    top: 87%;
    border-radius: 50%;
    -webkit-transform: translateX(0%) rotate(-5deg);
}
.glasses {
	width: 104%;
	height: 17px;
	background: #323232;
	top: 35%;
	border-radius: 3px;
}
.eye {
	width: 7px;
	height: 7px;
	background: #323232;
	border-radius: 50%;
	box-shadow: 0 0 0 5px #8f4b2c,
				0 0 0 15px #fff,
				0 0 0 20px #8c8c8c;
}
.eye div {
    width: 36px;
    height: 15px;
    background: #f1c40f;
    margin: -12px 0px 0px 0px;
    border-radius: 50px 50px 0 0;
}
.smile {
	background: #f1c40f;
	border-radius: 50%;
	top: 58%;
	width: 40px;
    height: 40px;
    border: 3px solid #eaad08;
    border-color: #eaad08 transparent transparent transparent;
    -webkit-transform: translateX(-50%) rotate(0deg);
}
.clothe {
	width: 100%;
	height: 35px;
	background: #2980b9;
	border-radius: 0px 0px 35px 35px;
	top: 88.5%;
}
.line-right {
    width: 40px;
    height: 8px;
    background: #2980b9;
    top: -66%;
    left: 89%;
    border-radius: 25px;
    -webkit-transform: translateX(-50%) rotate(-42deg);
}
.line-left {
    width: 40px;
    height: 8px;
    background: #2980b9;
    top: -66%;
    left: 10%;
    border-radius: 25px;
    -webkit-transform: translateX(-50%) rotate(42deg);
}
.pocket {
	width: 60px;
	height: 20px;
	background: #2980b9;
	top: -1%;
}
.pocket-1 {
	width: 23px;
	height: 20px;
	background: #1e628f;
	z-index: 9;
	border-radius: 0px 0px 35px 35px;
	top: 20%;
}
.right-leg, .left-leg {
	width: 10px;
	height: 30px;
	background: #2980b9;
	top: 100%;
	left: 60%;
}
.knee {
	width: 10px;
	height: 20px;
	background: #2980b9;
	top: 30%;
	left: 57%;
	-webkit-transform: rotate(20deg);
}
.foot {
	width: 26px;
	height: 8px;
	background: #323232;
	top: 90%;
	left: 13px;
	border-radius: 0px 10px 0px 0px
}
.left-leg {
	width: 10px;
	height: 30px;
	background: #2980b9;
	top: 100%;
	left: 43%;
}
.left-knee {
	width: 10px;
	height: 20px;
	background: #2980b9;
	top: 30%;
	left: -6px;
	-webkit-transform: rotate(-20deg);
}
.left-foot {
	width: 26px;
	height: 8px;
	background: #323232;
	top: 90%;
	left: -3px;
	border-radius: 10px 0px 0px 0px;
}
</style>
<body>
	<!-- <div contenteditable="true">
		This text can be edited by user.
	</div>
	<p contenteditable="true" spellcheck="true">hello boys how are you? dfdj dds</p>
	<a href="admin_view.php" download="profile">download</a>
	<p hidden>THis paragraph should be hidden.</p>
	<input type="file" multiple name="upload" id="upload">
	<a href="https://youtu.be/6sa0Uiqo7rs">video</a>
	<video  controls poster="img/pro_pic.jpg">
		<source src="https://youtu.be/6sa0Uiqo7rs" type="video/WebM">
			
	</video>



<script type="text/javascript">

	var x = '123uh';
	
	
</script> -->
<?php 
// $y = "<script>document.write(x)</script>";
// echo $y ;
?>



<div class="container">
	<div class="hair">
		<div></div>
	</div>
	<div class="head">
	<div class="right-hand">
		<div class="wrist"></div>
		<div class="finger-1"></div>
		<div class="finger-2"></div>
		<div class="finger-3"></div>
	</div>
	<div class="left-hand">
		<div class="left-wrist"></div>
		<div class="left-finger-1"></div>
		<div class="left-finger-2"></div>
		<div class="left-finger-3"></div>
	</div>
		<div class="glasses">
			<div class="eye">
				<div></div>
			</div>
		</div>
		<div class="smile"></div>
		<div class="clothe">
			<div class="line-right"></div>
			<div class="line-left"></div>
			<div class="pocket"></div>
			<div class="pocket-1"></div>
		</div>
		<div class="right-leg">
			<div class="knee"></div>
			<div class="foot"></div>
		</div>
		<div class="left-leg">
			<div class="left-knee"></div>
			<div class="left-foot"></div>
		</div>
	</div>
</div>
</body>
</html>
