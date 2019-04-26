<?php include 'server.php'; 


	if (isset($_GET['logout']))
	{
		session_destroy();
		unset($_SESSION['username']);
		header("location: universities.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>University Review Portal</title>
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="university.css">
	<script type="text/javascript" src="universities.js"> </script>
</head>


<body>
	<!-- Header -->
	<div class="header">
		<a  class="logo">WELCOME TO UNIVERSITY REVIEW SYSTEM</a>
		<div class="header-right">
			<?php	if (isset($_SESSION['logged'])) : ?>
				<a class="add_university_button" onclick="add_university()"> Add </a>
		    	<a class="logout" href="universities.php?logout='1'"> <?php echo "" . $_SESSION['username'] ?> </a>		
			<?php else :?>
		    	<a class="login" href="login.php"> login </a>
			<?php endif ?>
		</div>
	</div>


	<!-- Add a university PopUp -->
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
					<td><a href = "universities.php" onclick="cancel_add_university()">Cancel</a></td>
					<td><input type="submit" name="confirm_add_university" value = "Add"></td>
				</tr>
			</table>
		</form>
	</div>


	<!-- University List -->
	<div class = "university_container">
		<?php 
			$sql = "SELECT u_id, u_name, u_location FROM universities";
			$result = mysqli_query($conn, $sql);

			echo "<table class='university_table'>";
			while ($university = mysqli_fetch_assoc($result))
			{
				$u_name = $university['u_name'];
				$u_id = $university['u_id'];
				echo "<tr>";
					echo "<td><a class = \"university_details\" href = \"?university_id=$u_id\"  name = \"university_details\">" . $u_name . "</a></td>";
					echo "<td>" . $university['u_location'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
		 ?>
	</div>

	<!-- About University Popup and reviews toggle-->
	<?php
		if (isset($_GET['university_id']))
		{
			if($_GET['university_id'] == 0)
			{
				unset($_SESSION['u_id']);
				echo '<style type="text/css"> #university_review_page {visibility: hidden;} </style>';
			}
			else
			{
				$_SESSION['u_id'] = $_GET['university_id'];
	   			echo '<style type="text/css"> #university_review_page {visibility: visible;} </style>';
			}
		}
		else
		{
			echo '<style type="text/css"> #university_review_page {visibility: hidden;} </style>';
		}
	?>


	<!-- University Pages -->
	<div class = 'university_review_page' id ="university_review_page">
		<!-- Close Popup University -->
		<div class="close_university">
			<a href = "universities.php?university_id=0" class = "cancel_page" name = "cancel_page"> &#10005 </a>
		</div>

		<!-- University Image and Name -->
		<div class="image_university">
			<?php 
				$u_id = $_SESSION['u_id'];
				$sql = "SELECT u_id, u_name, u_location FROM universities WHERE u_id = $u_id";
				$result = mysqli_query($conn, $sql);
				$university = mysqli_fetch_assoc($result);
				$u_name = $university['u_name'];
				$u_location = $university['u_location'];

				echo "<br /><img class = \"university_img\" src=\"img/$u_id.jpg\" alt=\"Image not available\">";
				echo "<h2><center>$u_name</center></h2>";
				echo "<h3 align = 'right'>$u_location</h3>";
			?>
		</div>

		<!-- Reviews and Post Review if logged in -->
		<div class = "reviews">
			<div class="all_comments">
				<h4>Reviews:</h4>
				<?php 
					$table_name = "university" . $_SESSION['u_id'];
					$sql = "SELECT c_id, author, comment FROM $table_name";
					$result = mysqli_query($conn, $sql);

					echo "<table class='reviews_table'>";
					while ($comment_info = mysqli_fetch_assoc($result))
					{
						$author = $comment_info['author'];
						$comment = $comment_info['comment'];
						echo "<tr>";
							echo "<td>" . $author . "</a></td>";
							echo "<td>" . $comment . "</td>";
						echo "</tr>";
					}
					echo "</table>";
				 ?>
				
			</div>

			<div class="post_comment">
				<?php	if (isset($_SESSION['logged'])) : ?>
					<form action="universities.php" method="post">
						<h4>Write a Review:</h4>
						<center>
						<textarea class = "review_box" name="comment" rows="9" cols="140"></textarea>
						<input type="submit" name="add_review" />	
						</center>
					</form>
				<?php else :?>
					<p><center><b><a href="login.php">Login in to write a Review</a></b></center></p>
				<?php endif ?>
			</div>
		</div>
	</div>


</body>
</html>