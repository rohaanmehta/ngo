
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

$number = $_GET['number'];
$sql = "UPDATE allusers SET status ='printed' WHERE formno = '$number'" ;


if ($conn->query($sql) === TRUE) {
   echo "record updated";
  // header("Location: dashboard.php?n=Password Changed");
} else {
  // echo "Error: go back and try again  " . $sql . "<br>" . $conn->error;
}
			
mysqli_close($conn);
?>

