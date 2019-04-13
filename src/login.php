
<?php include "server.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<h1><center>Login</center></h1>

	<form action="login.php" method="post">
		<table>
			<tr>
				<td>Username: </td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password_1" /></td>
			</tr>
			<tr>
				<td><input type="submit" name="login"></td>
				<td><a href="register.php">Register</a></td>
			</tr>
		</table>
	</form>
</body>
</html>