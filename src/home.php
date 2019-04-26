<?php
	session_start();


	if (isset($_GET['logout']))
	{
		session_destroy();
		unset($_SESSION['username']);
		header("location: home.php");
	}
?>



<DOCTYPE html>
<html>
<head>
	<title>University Review System</title>
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="home1.css">
	<link rel="stylesheet" href="home_HOW.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<style type="text/css">
	.find_button{
			display: block;
			margin: 50px;
			text-align: center;
			border: 2px solid #2ecc71;
			padding: 14px 40px;
			color: coral;
			border-radius: 24px;
		    text-decoration: none;
	}	
	.find_button:hover{
		background: black;
		cursor: pointer;
	}
	
	</style>

</head>
<body>



	<div class="header">
		<a  class="logo">WELCOME TO UNIVERSITY REVIEW SYSTEM</a>

		<?php	if (isset($_SESSION['logged'])) : ?>

			<div class="header-right">
			    <a class="logout" href="home.php?logout='1'"> <?php echo "" . $_SESSION['username'] ?> </a>
			</div>
		
		<?php else :?>
	
			<div class="header-right">
			    <a class="login" href="login.php"> login </a>
			</div>
		
		<?php endif ?>
	</div>

	<div class="image_slidshow">
		<slider>
			<slide>
				<h5><a href="universities.php" class="find_button">Find University</a></h5>
			</slide>
			<slide>
				<h5><a href="universities.php" class="find_button">Find University</a></h5>
			</slide>
			<slide>
				<h5><a href="universities.php" class="find_button">Find University</a></h5>
			</slide>
			<slide>
				<h5><a href="universities.php" class="find_button">Find University</a></h5>
			</slide>
		</slider>	
	</div>

	<div class="HowItWorks">
		<div class="text">
			<p>How URP Works?</p>
		</div>
		<div class="icons">
			<div class="icon1"><i class="fas fa-chalkboard-teacher" style="font-size:150px"></i>
			<p>Create an Account</p></div>
			<div class="icon2"><i class="far fa-clone" style="font-size:150px"></i>
			<p>Check or Provide College Review</p></div>
			<div class="icon3"><i class="far fa-check-circle" style="font-size:150px"></i>
			<p>Select Your Future College</p></div>
		</div>	
	</div>

</body>
</html>