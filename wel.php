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
<html>
<head>
	<title> student's query</title>
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	  <link rel="stylesheet" href="style.css">	
	  <style>
	  			
	  </style>
</head>
<body>
					 <a  style="margin-left:80%" class="sinbtn" href="signout.php">Sign Out</a>
					
			<div class="optbtn" >

					<div class="mycol" >
					
						<a href="book.php" >
								<span style="font-size: 120px;text-align: center; ">

								<i class="fas fa-person-booth"></i>
								</span>
						</a>
						<span style="color: black">Book</span>
					</div>
					<div  class="mycol" ">
					
						<a href="rc.php">
							<span style="font-size: 120px;text-align: center; ">

									<i class="fas fa-exchange-alt"></i>
							</span>
						</a>
						<span style="color: black">Change</span>
					</div>
					<div  class="mycol">

						<a href="vacate.php">
								<span style="font-size: 120px;text-align: center; ">
										<i class="fab fa-vimeo-v"></i>
								</span>
						</a>
						<span style="color:black">Vacate</span>
					</div>
					<div  class="mycol">

						<a href="complaint.php">
					
								<span style="font-size: 120px;text-align: center; ">
									<i class="fas fa-phone"></i>
								</span>
						</a>
						<span style="color: black;font-style: bold">Complaints</span>
					</div>
					
			</div>

		
		 
			    
</body>
</html>	
