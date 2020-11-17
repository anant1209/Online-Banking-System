<?php

	session_start();

	$con = mysqli_connect('localhost', 'root', '');
	mysqli_select_db($con, 'id15072714_gripdb');



	$sender = $_SESSION['sessionname1'];
	$reciever = $_SESSION['sessionname2'];

	

	$query1 = " SELECT balance from foundationdata where userid = '$sender' ";

	$result1 = mysqli_query($con, $query1);

	$num1 = mysqli_num_rows($result1);

	$row1 = mysqli_fetch_array($result1);

	$val1 = $row1['balance'];

	$query2 = " SELECT balance from foundationdata where userid = '$reciever' ";

	$result2 = mysqli_query($con, $query2);

	$num2 = mysqli_num_rows($result2);

	$row2 = mysqli_fetch_array($result2);

	$val2 = $row2['balance'];

	session_destroy();

	if($val1 > $_POST['amount'])
	{
		$value = NULL;
		$value = $val1 - $_POST['amount'];

		$q11 = "UPDATE foundationdata set balance = '$value' where userid = '$sender'";

		$result3 = mysqli_query($con, $q11);

		$value1 = NULL;
		$value1 = $val2 + $_POST['amount'];

		$q12 = "UPDATE foundationdata set balance = '$value1' where userid = '$reciever'";

		$result4 = mysqli_query($con, $q12);


		$q13 = "INSERT into totaltransaction(senderp, recieverp, amountp)values('$sender', '$reciever', '$_POST[amount]')";

		$result5 = mysqli_query($con, $q13);
		
		$num11 = mysqli_num_rows($result1);

		if ($num11) 
		{
			echo "<script language='javascript' type='text/javascript'>";
			echo "alert('Money Transferred Successfully!!');";
			echo "</script>";

			$URL="alldata.php";
			echo "<script>location.href='$URL'</script>";
		}
		else
		{	echo "<script language='javascript' type='text/javascript'>";
			echo "alert('ERROR Money not transferred!!');";
			echo "</script>";

			$URL="alldata.php";
			echo "<script>location.href='$URL'</script>";
		}
	}
	else
	{	echo "<script language='javascript' type='text/javascript'>";
		echo "alert('Insufficient Balance!!');";
		echo "</script>";

		$URL="alldata.php";
		echo "<script>location.href='$URL'</script>";
	}

?>

