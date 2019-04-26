<?php
echo "hello WOrld\n<br />";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myURP";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br />");
}
echo "Connected successfully" . "<br />";


// Creating University Review
$sql = "CREATE DATABASE myURP";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully" . "<br />";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br />";
}

// sql to create table
$sql1 = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql1)) {
    echo "Table MyGuests created successfully" . "<br />";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br />";
}


// Insert Values
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully" . "<br />";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br />";
}

// Select data
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>