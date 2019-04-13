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
</head>
<body>

	<h1>Welcome</h1>

	<?php	if (isset($_SESSION['logged'])) : ?>
		<h1><?php echo "  " . $_SESSION['username'] ?></h1>
		<button><a href="home.php?logout='1'">logout</a></button>
	<?php else :?>
		<button><a href="login.php">login</a></button>
	<?php endif ?>

	<h3><center><a href="universities.php">Find University</a></center></h3>
</body>
</html>