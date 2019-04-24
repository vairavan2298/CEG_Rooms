<!DOCTYPE html>
<html>
<head>
	<title>
		"Change Room"
	</title>
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			
			
		 <tr>
					  	
					  	<td>
					  		<h3> Change Room </h3>
					  	</td>
		</tr>
			<td>
							<span> Current Room Number:</span>
						</td>
						<td>
							<input type="text" name="room">
						</td>
		 <tr>
		 </tr>
			<td>
							<span> Change to Room Number:</span>
						</td>
						<td>
							<input type="text" name="room">
						</td>
		 <tr>
		 <td></td>

						<td>
							<button class="sinbtn" type="submit" name="change">Change</button> 
						</td>
		</tr>
		</form>
	</div>
</body>
</html>






