<?php

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'myURP');

// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error() . "<br />");
}
echo "Connected successfully" . "<br />";




// Create User table
$sql = "CREATE TABLE users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table users created successfully" . "<br />";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br />";
}

// //Insert Demo User values
// $sql = "INSERT INTO users (username, email, password) VALUES ('ataago', '1234', 'ataago7@gmail.com')";

// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully" . "<br />";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br />";
// }



// Create University table
$sql = "CREATE TABLE universities (
u_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
u_name VARCHAR(30) NOT NULL,
u_location VARCHAR(30) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Table universities created successfully" . "<br />";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br />";
}


// //Insert University
//$sql = "INSERT INTO universities (u_name, u_location) VALUES ('Dayananda Sagar Institute', 'Bangalore')";
//$sql = "INSERT INTO universities (u_name, u_location) VALUES ('Peoples Educational Society', 'Bangalore')";
//$sql = "INSERT INTO universities (u_name, u_location) VALUES ('Osmania University', 'Hyderabad')";

// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully" . "<br />";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br />";
// }

?>