<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE grade_table (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
teacher VARCHAR(30) NOT NULL,
subj VARCHAR(30) NOT NULL,
department VARCHAR(50),
studentID VARCHAR(50),
grade VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>