<!DOCTYPE html>
<html>
<head>
	<title>
		"vacate"
	</title>
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			
			
		 <tr>
					  	
					  	<td>
					  		<h3> Vacate Room </h3>
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
							<span>Block Name:</span>
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
							<span>  Room Number:</span>
						</td>
						<td>
							<input type="text" name="room">
						</td>
		
		 </tr>
		  <tr>
		   </tr>
		 <tr>
		 <td></td>

						<td>
							<button class="sinbtn" type="submit" name="vacate">Vacate</button> 
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
  

if(isset($_POST['vacate'])){

	$hos=$_POST['hos'];
	$room=$_POST['room'];
	$roll=$_POST['roll'];
	try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM status WHERE rollno='$roll' AND blockname='$hos' AND roomno='$room'";

    // use exec() because no results are returned
    $conn->exec($sql);
   
 						 echo "<script>alert('vacated!!');</script>";
	
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

}
?>
