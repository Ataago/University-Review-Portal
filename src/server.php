<?php

echo "Server.php included" . "<br />";
session_start();

// Connect to DB
$conn = mysqli_connect('localhost', 'root', '', 'myURP');

// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error() . "<br />");
}

// Validate Login
if(isset($_POST['login']))
{
	$error = 0;

	$username = $_POST['username'];
	$password = $_POST['password_1'];

	
	// Required Fields
	if (empty($username))
	{
		echo "Username is Required" . "<br />";
		$error += 1;
	}
	if (empty($password))
	{
		echo "Password is Required" . "<br />";
		$error += 1;
	}

	// If no Errors
	if (!$error)
	{
		$password = md5($password);
		$sql = "SELECT id, username, password FROM users WHERE username = '$username'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		if ($user)
		{
			if ($user['password'] === $password)
			{
				echo "password Matched" . "<br />";
				$_SESSION['username'] = $username;
				$_SESSION['logged'] = "1";
				header("location: home.php");
			}
			else
			{
				echo "Password is incorrect" . "<br />";
			}
		}
		else
		{
			echo "Enter a valid Username" . "<br />";
		}

	}

}

// Register new User
if (isset($_POST['register']))
{
	$error = 0;

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];

	// Required Fields
	if (empty($username))
	{
		echo "Username is Required" . "<br />";
		$error += 1;
	}
	if (empty($email))
	{
		echo "email is Required" . "<br />";
		$error += 1;
	}
	if (empty($password_1))
	{
		echo "Password is Required" . "<br />";
		$error += 1;
	}

	// If username aldready exists in DB
	$sql = "SELECT id, username, password FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);
	if ($user)
	{
		echo "User Aldready Exists" . "<br />";
		$error += 1;
	}

	// Match Passwords
	if ($password_1 != $password_2)
	{
		echo "Passwords Don't match" . "<br />";
		$error += 1;
	}

	// Registering if No errors
	if (!$error)
	{
		// Hashing Password
		$password_1 = md5($password_1);

		$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email' , '$password_1')";
		if (mysqli_query($conn, $sql)) 
		{
		    echo "New record created successfully" . "<br />";
			header("location: login.php");
		} 
		else 
		{
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br />";
		}
	}

	echo "Errors: " . $error . "<br />";
}


// Add a university 
if (isset($_POST['confirm_add_university']))
{
	$error = 0;

	$u_name = $_POST['u_name'];
	$u_location = $_POST['u_location'];

	// Check if not empty
	if (empty($u_name))
	{
		echo "Enter University Name" . "<br />";
		$error += 1;
	}
	if (empty($u_location))
	{
		echo "Enter University Location" . "<br />";
		$error += 1;
	}

	if (!$error)
	{
		$sql = "INSERT INTO universities (u_name, u_location) VALUES ('$u_name', '$u_location')";
		if (mysqli_query($conn, $sql)) 
		{
		    echo "New record created successfully" . "<br />";
			header("location: universities.php");
		} 
		else 
		{
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br />";
		}
	}
}


mysqli_close($conn);

?>