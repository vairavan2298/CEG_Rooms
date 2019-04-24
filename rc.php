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
		<tr>
						<td>
							<span>Roll Number:</span>
						</td>
						<td>
							<input type="text" name="roll">
						</td>
		 
		 </tr>
		 <tr>
	
						<td>
							<span> Current Block Name:</span>
						</td>
						<td>
							<input list="l1" name="cuhos">
									<datalist id="l1">
		  								<option value="Marutham"> Marutham</option>
		  								<option value="Vaagai">Vaagai</option>
		  								<option value="Mazhilam">Mazhilam</option>
		  							</datalist>
						</td>
		
		 </tr>

		 <tr>
	
			<td>
							<span> Current Room Number:</span>
						</td>
						<td>
							<input type="text" name="curoom">
						</td>
		
		 </tr>
		  <tr>
	
						<td>
							<span> Change To Block Name:</span>
						</td>
						<td>
							<input list="l3" name="chhos">
									<datalist id="l3">
		  								<option value="Marutham"> Marutham</option>
		  								<option value="Vaagai">Vaagai</option>
		  								<option value="Mazhilam">Mazhilam</option>
		  							</datalist>
						</td>
		
		 </tr>
		 <tr>
			<td>
							<span> Change To Room Number:</span>
						</td>
						<td>
							<input type="text" name="chroom">
						</td>
		 </tr>
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
<?php
  $dbname='mydb';
  $host='localhost';
  $username='root';
  $password='1234';
  try{
  $dbcon=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
  echo "<script>alert('Connected...');</script>";
   }
  catch(PDOException $vairu){
      echo $vairu->getMessage();
  }

  function isRoomAvailable($dbcon,$nhos,$nroom){
		$sql=$dbcon->query("select roomno from status where roomno='$nroom' AND blockname='$nhos' ");
		$count=$sql->rowCount();
		return ($count==0) ? true: false;
	}
  

if(isset($_POST['change'])){
	
	$hos=$_POST['cuhos'];
	$room=$_POST['curoom'];
	$roll=$_POST['roll'];
	$nhos=$_POST['chhos'];
	$nroom=$_POST['chroom'];

	$isVacant = isRoomAvailable($dbcon,$nhos,$nroom);

	
	if($isVacant){
		echo "udating room";
		 //  $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		  //  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql=$dbcon->query( "UPDATE status SET roomno='$nroom',blockname='$nhos' WHERE rollno='$roll' AND roomno='$room' AND blockname='$hos'");
		   
		echo "<script>alert('Changed!!');</script>";
		    
			/*catch(PDOException $e)
			    {
			    echo $sql . "<br>" . $e->getMessage();
			    }*/
	
	} else {	
	 	echo "<script>alert('sorry!!');</script>";		
	}	
		
}



?>






