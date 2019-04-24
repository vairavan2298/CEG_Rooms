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
					    if (!preg_match("/^[a-zA-Z ]*$/",$uname)) {
		    				  $nameErr = "Only letters and white space allowed"; 
		          		 }
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
<meta name="viewport" content="width=device-width initial-scale=1.0">
		     <style>
		          body,html{
		           /* height: 100%;*/
		            font-family: Arial;
		            margin:0;
		            background: url(3.jpg);
		            background-position: center;
		            background-repeat: no-repeat;
		            background-size: cover;
		            background-attachment: fixed;
		          }
		          *{
		             box-sizing: border-box;
		             -webkit-box-sizing: border-box;
		             -moz-box-sizing: border-box;
		          }
		          h3{
		            font-size: 2em;
		            margin: 0;
		            padding:20px;
		            color:black;
		            text-align: center;
		          }

  				.error{
  					color:red;
  					text-align: right;
  				}
  				 .warp{
			            background:rgb(36, 37, 42,0.4);
			            min-height: 400px;
			         

		          }
		          .container{
		            position: absolute;
		            right: 5px;
		            margin:60px;
		            min-width:350px;
		            max-width: 800px;
		            padding: 16px;
		            background: #fff;
		            border-radius:50px; 

		          }
		          input[type=text],input[type=password]{
		            width: 100%;
		            padding: 13px;
		            margin: 5px 0 22px 0;
		            border: none;
		            background: #f1f1f1;
		            font-size: 16px;
		         }
		          .btn{
		            text-align:center;
		            background:#4caf50;
		            border: none;
		            padding: 13px 20px;
		            text-decoration:none;
		            font-size: 16px;
		            font-weight: bold;
		            color: #fff;
		            width: 100%;
		            border-radius: 50px;
		          }
		          .btn:hover{
		            background: black;
		            color: white;
		           }

 		 </style>
</head>
<body>
	<div class="warp">
			<form method="post" action=login.php >
				<div class="container">
				<table>
					  <tr>
					  	<td></td>
					  	<td>
					  		<h3> LOGIN</h3>
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
					</tr>
					<tr>
						<td></td>
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
					</tr>
					<tr>
						<td></td>
						<td>
						    <span class="error">
								* <?php echo $passErr; ?>
							</span>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>   
							<button type="submit" name="register" class="btn" >Login</button>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>

							<span>Are You New User?</span>
						</td>
						<td>
						    <a class="btn" href="sign.php" > sign up </a>
						</td>
					</tr>
						
				</table>
				</div>
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
		$sql=$dbcon->query("select * from regusers2 where uname='$uname' AND pass='$pwd'");
		$count=$sql->rowCount();
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
				alert('You are a new user SIGN UP first....');
			</script>
	<?php
	}
}
		
?>