<!DOCTYPE html>
<html>
<head>
	<title>
		"room booking "
	</title>
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container1">
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			
		 <tr>
					  	
					  	<td>
					  		<h3> Room Booking</h3>
					  	</td>
		</tr>
		 <tr>
					  	
					  	<td>
					  		<span>Gender:</span>
					  	</td>
					  	<td>
							<input type="radio" value="male" name="g1">male</input>
						</td>
						<td>
							<input type="radio" value='female' name="g1">female</input>
						</td>
		</tr>
		<tr>
						<td><br><br>
							<span>Roll Number:</span>
						</td>
						<td>
							<input type="text" name="roll">
						</td>
		</tr>
		<tr>
						<td>
							<span>Semester:</span>
						</td>
						<td>
							<input list="l" name="sem">
									<datalist id="l">
		  								<option value="1">1</option>
		  								<option value="2">2</option>
		  								<option value="3">3</option>
		  								<option value="4">4</option>
		  								<option value="5">5</option>
		  								<option value="6">6</option>
		  								<option value="7">7</option>
		  								<option value="8">8</option>
		  								<option value="9">9</option>
		  								<option value="10">10</option>
		  							</datalist>
						</td>
		</tr>
		<tr>
                        <td>
							<span>Choose Your Hostel:</span>
						</td>
						<td>
							<input list="l1" name="hos">
									<datalist id="l1">
		  								<option value="Marutham"> Marutham</option>
		  								<option value="Vaagai">Vaagai</option>
		  								<option value="Mazhilam">Mazhilam</option>
		  							</datalist>
						
						</td>
		</tr>
		 <tr>
						<td>
							<span>Room Number:</span>
						</td>
						<td>
							<input type="text" name="room">
						</td>
		</tr>
		<tr>
						<td></td>

						<td>
							<button class="btn" type="submit" name="Book">Book</button> 
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
  //echo "<script>alert('Connected...');</script>";
   }
  catch(PDOException $vairu){
      echo $vairu->getMessage();
  
  }

if(isset($_POST['Book'])){
	$gen=$_POST['g1'];
	$roll=$_POST['roll'];
	$sem=$_POST['sem'];
	$hos=$_POST['hos'];
	$room=$_POST['room'];
	function book($dbcon,$gen,$roll,$sem,$hos,$room){
		$sql=$dbcon->query("select * from status where roomno='$room' AND blockname='$hos'");
		$count=$sql->rowCount();
		return $count;
	}

	
	$c=book($dbcon,$gen,$roll,$sem,$hos,$room);
		if($c==0){
	
   						$sql=$dbcon->prepare("insert into status(blockname,roomno,rollno,gender,sem) values ('$hos','$room','$roll','$gen','$sem')");
 
 						 $sql->execute();
 						 echo "<script>alert('Booked!!');</script>";
	} 
	else{
		 echo "<script>alert('sorry! room is already booked!!!');</script>";
	}
}

 ?>

