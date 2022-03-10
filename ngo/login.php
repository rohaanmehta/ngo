<?php
 session_start();
 if (!empty($_SESSION['logindone'])) 
{
	if(	$_SESSION["logindone"] == "yes")
	{
		$name = $_SESSION['loggedname'];
		echo "welcome : ".$name;
		// $islogin = "yes";
	}

}
	else
	{
		$islogin = "no";
	}		

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
	$email = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT username,password FROM registers WHERE username ='$email' AND password='$password'";
	$result = $conn->query($sql);

	if ($result !== false && $result->num_rows > 0)
	{
		// echo "logged in ";
		 session_start();
		 $_SESSION["loggedname"] = "$email";
	 	 $_SESSION["logindone"] = "yes";
	  	header("Location: index.php");
	 	 echo "welcome ".$email;
	}
	else
	{
		 echo "wrong id password";	
		// echo $email; echo $password;
		$_SESSION["logindone"] = "no";
		$_SESSION["loggedname"] ="";
		// session_destroy();   
	  	// header("Location: index.php?n=Wrong password");
	}
}

if (!empty($_SESSION['logindone'])) 
{
	if(	$_SESSION["logindone"] == "yes")
	{
		echo "<a href ='logout.php'>logout</a>";
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
	#login
	{
		display: none;
	}
</style>
<body onload="checkthis()">
	<div id="login">
		<form action="?" method="POST">
			<label> Login Here</label><br><br>
			<input type="text" class="field" placeholder="username"name="username"/>
			<input type="password" class="field" placeholder="username"name="password"/>
			<input type="submit" name="submit">
		</form>
	</div>
<script type="text/javascript">
	function checkthis()
	{
		var x = "<?php echo $islogin ?>";
		var y = document.getElementById('login');
		if(x == "no")
		{
			y.style.display = "block";
		}
		else
		{
			y.style.display = "none";			
		}
	}
</script>
</body>
</html>