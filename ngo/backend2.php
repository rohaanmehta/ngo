		<?php
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

			$yet = "yettostart";
			$sql2 = "SELECT  * FROM allusers WHERE status ='$yet'";

			$result2 = $conn->query($sql2);

			if ($result2 !== false && $result2->num_rows > 0)
			{
				 while($row = $result2->fetch_assoc())
			 	{
			 		$number = $row['formno'];

				   echo "<br>".$row['date'].$row['formno'].$row['nameofvolunteer'].$row['adharno'].$row['moblinkwithadhar'].$row['adharlinkedmobnumber'].$row['personalnumber'].$row['fullname'].
				   $row['fathername'].$row['married'].$row['dob'].$row['currentaddress'].$row['noofyearstay'].$row['permanentaddress'].$row['occupation'].$row['noofyearsexp'].$row['formno'].
				   $row['qualification'].$row['bankaccount'].$row['accountnumber'].$row['ifsccode'].$row['nomineename'].$row['nomineedob'].$row['amountreceived'].$row['modeofpayment'].
				   $row['amountpending'].$row['formcancelled'].$row['eshrampdfgenerated'].$row['healthpdfgenerated'].$row['eshramprinting'].$row['eshramdelivered'].$row['healthdelivered'].
				   $row['remarks'].$row['status']."<input type='button' value='Completed' onclick='changestatus($number)' >  
				   <input type='button' value='Work in Progress' onclick='changestatus2($number)' >  ";
				}
			}
		?>