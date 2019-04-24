<?php 
			$nameErr =$passErr ="";
			$uname =$pass="";
			function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}
			
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			  if (empty($_POST["name"])) {
			    $nameErr = "Name is required";
			  } else {
			    $uname = test_input($_POST["name"]);
			    }
			 
    	  		if (empty($_POST["password"])) {
			    $passErr = "password is required";
			  } else {
			    $pass= test_input($_POST["password"]);
    			}
    			
    		} ?>
<!DOCTYPE html>
<html>
<head>
<title>user login</title>
 <style>
  				.error{color:red;}
 		 </style>
</head>
<body style="text-align:center;background-color:powderblue;">
	<div style="text-align:left;background:;border: 2px solid black;padding: 15px;margin-right:20%;margin-left:20%;">
				

			<form method="post" action=login.php >
				<table>
					  <tr>
					  	<td></td>
					  	<td></td>
					  	<td>
					  		<h1 text-align=center> LOGIN</h1>
					  	</td>
					  <tr>
					  	<td></td>
					  	<td>
					  		<p>
								<span class="error">* required</span>
							</p>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<span>User Name:</span>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="text" name="name">
						</td>
					
						<td>
							<span class="error">* 
								<?php echo $nameErr;?>
							</span>
						</td>
					</tr>
						
					<tr>
						<td></td>
						<td>
							<span>Password:</span>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="Password" name="password">
						</td>
						<td>
						    <span class="error">
								* <?php echo $passErr; ?>
							</span>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>   
							<input type="submit" name="register" value="Log In">
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>

							<span>Are You New User?</span>
						</td>
						<td>
						    <a href="sign.php" style="text-align: center;text-decoration:none;background:white;border: 1px solid black;padding: 5px;"> sign up </a>
						</td>
					</tr>
						
				</table>
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
	echo "Connected";
	}
	catch(PDOException $vairu){
			echo $vairu->getMessage();
	}
		
	function login($dbcon,$uname,$pwd){
		echo "Connected2...";
		$sql=$dbcon->query("select * from regusers where uname='$uname' AND pass='$pwd'");
		$count=$sql->rowCount();
		echo "Connected3...";
		return $count;
	}

	if(isset($_POST['register'])){
		//$uname=$_POST['name'];
		//$pwd=$_POST['password'];
		$c=login($dbcon,$uname,$pass);
		if($c==1){
			echo "Welcome";
			session_start();
			$_SESSION['uname']=$uname;
			header('Location:wel.php');
			
			?><script type="text/javascript">
				alert('Hey You Logged In....');
				
			</script>
		<?php
	}
	else
	{
	?>
			<script type="text/javascript">
				alert('Ozunga kudra....');
			</script>
	<?php
	}
}
		
?>