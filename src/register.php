
<?php include "server.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>

	
	<div class="container">
		<form action="register.php" method="post" class="box">
			<h1>Register</h1>

					<input type="text" name="username" placeholder="Username" />
					
					<input type="email" name="email"  placeholder="Email_id" />
				
					<input type="password" name="password_1" placeholder="Password" />
					
					<input type="password" name="password_2" placeholder="Confirm Password" />
				
					<input type="submit" name="register">
					<a href="login.php">Login</a>
		</form>
	</div>
</body>
</html>