<?php
 session_start();

	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ngo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];

	$sql = "INSERT INTO registers (username,password,type)
	VALUES ('$username','$password' , '$type')";

	if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
  header("Location: login.php");
	} else {
	  echo "Error: go back and try again  " . $sql . "<br>" . $conn->error;
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<style type="text/css">
	.field{
		width: 200px;
		height: 30px;
		border: 1px solid grey;
		border-radius: 4px;
		text-align: left;
		font-size: 16px;
		padding-left: 10px;
		background-color: #f3f3f3;
		outline: none;
		margin-right: 20px;
		margin-bottom: 20px;
	}
</style>
<body>
	<form action="?" method="POST">
		<br><label> Username </label><br>
		<input type="text" name="username" class="field" placeholder="username" required />

		<br><label> Password </label><br>
		<input type="password" name="password" class="field" placeholder="password" required />

		<br><label> Type </label><br>
		<select name="type" required>
			<option value="backend1"> backend1</option>
			<option value="backend2"> backend2</option>
			<option value="backend3"> backend3</option>
			<option value="backend4"> backend4</option>
		</select>
		<br><br><input type="submit" name="submit">
	</form>
</body>
</html>