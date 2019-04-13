<?php

include 'server.php';

// Connect to DB
$conn = mysqli_connect('localhost', 'root', '', 'myURP');

// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error() . "<br />");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>University Review Portal</title>
	<style type="text/css">
		.add_university
		{
			position: absolute;
			top: 0px;
			left: 0px;
			visibility: hidden;
			padding: 10px;
			background: grey;
		}
		.university_container
		{
			position: absolute;
			top: 1px;
			padding: 100px;
			z-index: -1;
		}
		.university_table
		{
			width: 100%;
			border: 1px;
			border-style: solid;
		}
	</style>

	<script type="text/javascript">
		function add_university()
		{
			document.getElementById('add_university').style.visibility = 'visible';
		}
		function cancel_add_university()
		{
			document.getElementById('add_university').style.visibility = 'hidden';
		}
	</script>
</head>


<body>
	<div class = "menu">
		<input type="text" name="searchBox">
		<input type="submit" name="search" value="Search">
		<input type="submit" name="add" value="Add" onclick="add_university()">
	</div>

	<div class = "add_university" id = "add_university">
		<form action = "universities.php" method="post">
			<table>
				<tr>
					<td>University Name: </td>
					<td><input type="text" name="u_name" required></td>
				</tr>
				<tr>
					<td>University Location: </td>
					<td><input type="text" name="u_location" required></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="confirm_add_university" value = "Add">
						<button><a href = "universities.php" onclick="cancel_add_university()">cancel</a></button></td>
				</tr>
			</table>
		</form>
	</div>

	<div class = "university_container">
		<?php 
			$sql = "SELECT u_id, u_name, u_location FROM universities";
			$result = mysqli_query($conn, $sql);

			echo "<table class='university_table'>";
			while ($university = mysqli_fetch_assoc($result))
			{
				echo "<tr>";
					echo "<td>" . $university['u_name'] . "</td>";
					echo "<td>" . $university['u_location'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		 ?>
	</div>
</body>
</html>