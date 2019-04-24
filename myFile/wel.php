<?php 
	session_start();
	if($_SESSION['uname']==true){
			echo "hi hi hi";
	}else
	{
	 header('Location:login.php');
	}


	?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
			<a href="signout.php">Sign Out</a>
</body>
</html>	
