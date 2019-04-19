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
</head>
<body>




</div>

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
	<h3><center><a href="universities.php">Find University</a></center></h3>
</body>
</html>