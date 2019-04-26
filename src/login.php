
<?php include "server.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="login.css">

</head>
<body>	

	<div class="container">
		<form  calaction="login.php" method="post" class="box">
			<h1>Login</h1>
			<input type="text" name="username" placeholder="Username" />
			<input type="password" name="password_1" placeholder="Password" />	
			<input type="submit" name="login">
			<a href="register.php">Register</a>
		</form>
	</div>
</body>
</html>