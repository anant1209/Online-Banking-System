<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="style.css">

</head>


<body>
	<div class="container-fluid" id="boxshadow">
		<div>
	
			<div>
				<div class="col-sm-6" style="padding-left: 4%; padding-top: 1%;">
				<h1>The Spark Foundation</h1>
				</div><br>
			</div>

			<div class="col-sm-6">
				<p style="padding-top: 3%;">
				<a href="home.php" style="padding-top: 0%; padding-left: 40%">
					<button class="btn" id="buttontwo1">HOME</button>
				</a>
			

				<a href="https://www.thesparksfoundationsingapore.org/contact-us/">
					<button class="btn" id="buttontwo2">CONTACT US</button>
				</a>

				</p><br>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div>
			<div class="col-sm-6" style="padding-top: 2%; padding-left: 4%;"><h1 class="fontsize5">All Customers Details</h1></div>
		</div>
	</div>

	<div style="padding-left: 4%;"><p style="border:2px solid orange; width: 15%; height: 0px;" ></p></div>

	<?php

		session_start();

		$con = mysqli_connect('localhost', 'root', '');
		mysqli_select_db($con, 'id15072714_gripdb');

		$query = " SELECT senderp, recieverp, amountp from totaltransaction ";

		$result = mysqli_query($con, $query);

		$num = mysqli_num_rows($result);

		if($num > 0)
		{
			while ($fdata = mysqli_fetch_array($result)) 
			{
				?>
					<div style="background-color: white; padding-left: 5%;">
					<br><br>
						<form action="getreciever.php" method="POST">
							<div class="container-fluid" style="width: 70%; background-color: #e6ffff; border-radius: 25px;" id="boxshadow">
								
							<table class="table">
  <thead>
  <tr>
    <th>Sender Account number</th>
    <th>Reciever Account Number</th>
    <th>Amount Transferred</th>
   
    
  </tr>
</thead>

<tbody>
<tr>
    <td><?php echo $fdata['senderp']; ?></td>
    <td><?php echo $fdata['recieverp']; ?></td>
    <td><?php echo $fdata['amountp']; ?></td>
    
	
</tr>
</tbody>

</table>
										
							
								</div>
							</div>
						</form>
					</div><br>

				<?php
			}
		}
?>


</body>
</html>