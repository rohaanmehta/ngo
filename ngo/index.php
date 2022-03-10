<?php
 session_start();
$name = $_SESSION['loggedname'];



echo "welcome : ".$name;
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


if (!empty($_SESSION['logindone'])) 
{
	if(	$_SESSION["logindone"] == "yes")
	{
		echo "<a href ='logout.php'>logout</a>";
	}
}
else
{
	  header("Location: login.php");
}

$sqll = "SELECT type FROM registers WHERE username ='$name'";

$result = $conn->query($sqll);

if ($result !== false && $result->num_rows > 0)
{
	 while($row = $result->fetch_assoc())
 	{
	   $type = $row['type'];
	   echo "<br>"."type is :".$type;
	}
}
if (isset($_POST['submit'])) {
    
    $date = $_POST["date"];
    $formnumber = $_POST["formnumber"];
    $nameofvolunteer  = $_POST["nameofvolunteer"];
    $adharnumber  = $_POST["adharnumber"];
    $ismoblinkwithadhar  = $_POST["ismoblinkwithadhar"];
    $adharlinkedmobilenumber  = $_POST["adharlinkedmobilenumber"];
    $personalnumber  = $_POST["personalnumber"];
    $fullname  = $_POST["fullname"];
    $fathername  = $_POST["fathername"];
    $marritalstatus  = $_POST["marritalstatus"];
    $dateofbirth  = $_POST["dateofbirth"];
    $currentaddress  = $_POST["currentaddress"];
    $numberofyearsstaying  = $_POST["numberofyearsstaying"];
    $permanentaddress  = $_POST["permanentaddress"];
    $occupation  = $_POST["occupation"];
    $numberofyearsexpirence  = $_POST["numberofyearsexpirence"];
    $qualification  = $_POST["qualification"];
    $bankaccount  = $_POST["bankaccount"];
    $bankaccountnumber  = $_POST["bankaccountnumber"];
    $ifsccode  = $_POST["ifsccode"];
    $nomineename  = $_POST["nomineename"];
    $nomineedob  = $_POST["nomineedob"];
    $amountreceived  = $_POST["amountreceived"];
    $modeofpayment  = $_POST["modeofpayment"];
    $ammountpending  = $_POST["ammountpending"];
    $formcancelled  = $_POST["formcancelled"];
    $eshrampdfgenerated  = $_POST["eshrampdfgenerated"];
    $healthpdfgenerated  = $_POST["healthpdfgenerated"];
    $eshramprinting  = $_POST["eshramprinting"];
    $eshramdelivered  = $_POST["eshramdelivered"];
    $healthdelivered  = $_POST["healthdelivered"];
    $remarks  = $_POST["remarks"];
    $status = "yettostart";

    $sql = "INSERT INTO allusers ( date,formno,nameofvolunteer,adharno,moblinkwithadhar,adharlinkedmobnumber,personalnumber,fullname,fathername,married,dob,currentaddress,noofyearstay,permanentaddress,occupation,noofyearsexp,qualification,bankaccount,accountnumber,ifsccode,nomineename,nomineedob,amountreceived,modeofpayment,amountpending,formcancelled,eshrampdfgenerated,healthpdfgenerated,eshramprinting,eshramdelivered,healthdelivered,remarks,status)
	VALUES ('$date','$formnumber' , '$nameofvolunteer','$adharnumber' ,'$ismoblinkwithadhar','$adharlinkedmobilenumber','$personalnumber' , '$fullname','$fathername','$marritalstatus' , '$dateofbirth','$currentaddress','$numberofyearsstaying' , '$permanentaddress','$occupation','$numberofyearsexpirence' , '$qualification','$bankaccount'
			,'$bankaccountnumber' , '$ifsccode','$nomineename','$nomineedob' , '$amountreceived','$modeofpayment','$ammountpending' , '$formcancelled','$eshrampdfgenerated','$healthpdfgenerated' , '$eshramprinting','$eshramdelivered','$healthdelivered' , '$remarks','$status')";

if ($conn->query($sql) === TRUE) {
  // echo "New record created successfully";
  // header("Location: index.php?n=Account created");
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
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
	#backend1 , #backend2 ,#backend3,#backend4{
		display: none;
	}
</style>
<body onload="checktype()">
	<div id="backend1">
		<form action='?' method="POST"><br>
		<input type="text" name="date" placeholder="date" class="field"/>	
		<input type="text" name="formnumber" placeholder="form number" class="field"/>	
		<input type="text" name="nameofvolunteer" placeholder="name of volunteer" class="field"/>	
		<input type="text" name="adharnumber" placeholder="adhar number" class="field"/>	
		<input type="text" name="ismoblinkwithadhar" placeholder="is mob link with adhar" class="field"/>	
		<input type="text" name="adharlinkedmobilenumber" placeholder="adhar linked mobile number" class="field"/>	
		<input type="text" name="personalnumber" placeholder="personal number" class="field"/>	
		<input type="text" name="fullname" placeholder="full name" class="field"/>	
		<input type="text" name="fathername" placeholder="father name" class="field"/>	
		<input type="text" name="marritalstatus" placeholder="marrital status" class="field"/>	
		<input type="text" name="dateofbirth" placeholder="date of birth" class="field"/>	
		<input type="text" name="currentaddress" placeholder="current address" class="field"/>	
		<input type="text" name="numberofyearsstaying" placeholder="number of years staying" class="field"/>	
		<input type="text" name="permanentaddress" placeholder="permanent address" class="field"/>	
		<input type="text" name="occupation" placeholder="occupation" class="field"/>	
		<input type="text" name="numberofyearsexpirence" placeholder="number of years expirence" class="field"/>	
		<input type="text" name="qualification" placeholder="qualification" class="field"/>	
		<input type="text" name="bankaccount" placeholder="bank account" class="field"/>	
		<input type="text" name="bankaccountnumber" placeholder="bank account number" class="field"/>	
		<input type="text" name="ifsccode" placeholder="ifsc code" class="field"/>	
		<input type="text" name="nomineename" placeholder="nominee name" class="field"/>	
		<input type="text" name="nomineedob" placeholder="nominee dob" class="field"/>	
		<input type="text" name="amountreceived" placeholder="amount received" class="field"/>	
		<input type="text" name="modeofpayment" placeholder="mode of payment" class="field"/>	
		<input type="text" name="ammountpending" placeholder="ammount pending" class="field"/>	
		<input type="text" name="formcancelled" placeholder="form cancelled" class="field"/>	
		<input type="text" name="eshrampdfgenerated" placeholder="eshram pdf generated" class="field"/>	
		<input type="text" name="healthpdfgenerated" placeholder="health pdf generated" class="field"/>	
		<input type="text" name="eshramprinting" placeholder="eshram printing" class="field"/>	
		<input type="text" name="eshramdelivered" placeholder="eshram delivered" class="field"/>	
		<input type="text" name="healthdelivered" placeholder="health delivered" class="field"/>	
		<input type="text" name="remarks" placeholder="remarks" class="field"/>	<br>
		<input type="submit" name="submit" value="submit">
		</form>
	</div>

	<div id="backend2">
		<?php include('backend2.php')	?>
	</div>

	<div id="backend3">
		<?php include('backend3.php')	?>
	</div>

	<div id="backend4">
		<?php include('backend4.php')	?>
	</div>


	<script type="text/javascript">

		function checktype()
		{
			var x = "<?php echo $type ?>";
			var y = document.getElementById('backend1');
			var z = document.getElementById('backend2');
			var w = document.getElementById('backend3');
			var r = document.getElementById('backend4');

			if(x == "backend1")
			{
				y.style.display = "block";
				console.log(x);				
			}
			if(x == "backend2")
			{
				z.style.display = "block";
				console.log(x);				
			}
			if(x == "backend3")
			{
				w.style.display = "block";
				console.log(x);				
			}
			if(x == "backend4")
			{
				r.style.display = "block";
				console.log(x);				
			}											
		}
		function changestatus(x) 
		{
			console.log(x);
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      // document.getElementById("demo").innerHTML =
		      console.log( this.responseText);
		    }
		  };
		  xhttp.open("GET", "changestatus.php?number="+x, true);
		  xhttp.send();
			$(document).ready(function(){
			setInterval
			$("#backend2").load('backend2.php')
			});	
	    // checktype();	  
		}

		function changestatus2(x) 
		{
			console.log(x);
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      // document.getElementById("demo").innerHTML =
		      console.log( this.responseText);
		    }
		  };
		  xhttp.open("GET", "changestatus2.php?number="+x, true);
		  xhttp.send();

			$(document).ready(function(){
			setInterval
			$("#backend2").load('backend2.php')
			});	
		}	
		function changestatus3(x) 
		{
			console.log(x);
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      // document.getElementById("demo").innerHTML =
		      console.log( this.responseText);
		    }
		  };
		  xhttp.open("GET", "changestatus3.php?number="+x, true);
		  xhttp.send();

			$(document).ready(function(){
			setInterval
			$("#backend3").load('backend3.php')
			});			
		}

		function changestatus4(x) 
		{
			console.log(x);
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      // document.getElementById("demo").innerHTML =
		      console.log( this.responseText);
		    }
		  };
		  xhttp.open("GET", "changestatus4.php?number="+x, true);
		  xhttp.send();

			$(document).ready(function(){
			setInterval
			$("#backend4").load('backend4.php')
			});		
		}						
	</script>
</body>
</html>