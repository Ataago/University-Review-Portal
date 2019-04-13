
<?php include "server.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>

	<h1><center>Register</center></h1>

	<form action="register.php" method="post">
		<table>
			<tr>
				<td>Username: </td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>Email: </td>
				<td><input type="email" name="email" /></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password_1" /></td>
			</tr>
			<tr>
				<td>Confirm Password: </td>
				<td><input type="password" name="password_2" /></td>
			</tr>
		</table>

		<input type="submit" name="register">
	</form>
</body>
</html>