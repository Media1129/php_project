<!DOCTYPE HTML>  
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>  


<h1>成績登入系統</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  老師名稱: <input type="text" name="teacher">
  <br><br>
  科目名稱: <input type="text" name="subj">
  <br><br>
  系所: <input type="text" name="department">
  <br><br>
  學號: <input type="text" name="studentID">
  <br><br>
  分數: <input type="text" name="grade">
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<form action="test_new.php" method="post"> 
  <input type="submit" name="download" value="download"/> 
</form> 


<?php
$teacher = $subj = $department = $studentID = $grade = "";
//insert data into database
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit']) ) {
  $teacher = test_input($_POST["teacher"]);
  $subj = test_input($_POST["subj"]);
  $department = test_input($_POST["department"]);
  $studentID = test_input($_POST["studentID"]);
  $grade = test_input($_POST["grade"]);

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "testdb";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "INSERT INTO grade_table (teacher, subj, department, studentID, grade)
  VALUES ('$teacher', '$subj', '$department', '$studentID', '$grade')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();

}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>




</body>
</html>