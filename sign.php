<?php 
      $nameErr = $emailErr = $passErr ="";
      $name = $email = $password ="";
      function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
          $nameErr = "Name is required";
        } else
         {
              $uname = test_input($_POST["name"]);
             if (!preg_match("/^[a-zA-Z ]*$/",$uname)) {
      $nameErr = "Only letters and white space allowed"; 
          
        
          }
        }
        
        if (empty($_POST["e-mail"])) {
          $emailErr = "Email is required";
        } 
        else {
          $email = test_input($_POST["e-mail"]);
          // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format"; 
          }
        }
          if (empty($_POST["password"])) {
          $passErr = "password is required";
        } else {
          $pass= test_input($_POST["password"]);
          }
          if (empty($_POST["pswd"])) {
          $passErr = "password is required";
        } 
          else {
          $pass2= test_input($_POST["pswd"]);

          }
        
        $mno=$_POST['Mobile_no:'];
      }
       
         ?>

<!DOCTYPE html>
<html>
<head>
      <title>Sign Up</title>
      <meta name="viewport" content="width=device-width initial-scale=1.0">
	  <link rel="stylesheet" href="style.css">	     
</head>
<body>
<div class=wrap>
        
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" >
          <div class="container">
          <table>
             
               
               
                  <h3 style="text-align=center">SIGN UP</h3>
                
              
          
              <tr>
                <td></td>
                <td>
                  <span class="error">*-Required</span>
                </td>
              </tr>
          
              <tr>
                <td>
                  <span>
                    User Name:
                  </span>
                </td> 
                
                <td>
                  <input type="text" placeholder="Enter your name" name="name">
                </td>
               </tr>
               <tr>
               <td></td>
                <td>  
                  <span class="error">
                      *<?php echo $nameErr;?>
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <span>
                      E-mail:
                  </span>
                </td>
                <td>
                  <input type="e-mail" placeholder="enter your email" name="e-mail">
                </td>
               </tr>
               <tr>
               		<td></td>
                	<td>
                  	<span class="error">
                       *<?php echo $emailErr; ?>
                  	</span>
                	</td>   
              </tr>
              <tr>
		                <td>  
		                  <span>
		                      Mobile Number
		                  </span>
		                </td> 
		                <td>
		                        <input type="text" placeholder="enter your mobile number" name="Mobile_no:"><br>
		                </td>
		      </tr> 
		              <tr>
		                <td>
		                  password:
		                </td>
                         <td>
		                        <input type="password" placeholder="enter the password" name="password">
		                </td>
		       <tr>
		       			<td></td>
		                <td>
		                  <span class="error">
		                    *<?php echo $passErr; ?>
		                  </span>
		                </td>   
                </tr>   
          
              <tr>
		                <td>                  
		                    re-enter password: 
		                </td>
		                <td>
		                  <input type="password" placeholder="re-enter the same pssword" name="pswd"><br>
		                </td> 
              </tr> 
              <tr>
                    <td></td>
                    <td>
                      <span class="error">
                        *<?php echo $pswdErr; ?>
                      </span>
                    </td>  
              </tr>   
              <tr>
                <td></td>
                <td>  
                  <input class="sinbtn" type="submit"  name="register" value="SIGN UP"></input>
                </td> 
              </tr>     
              <tr>
                
                <td></td>
                <td>  
                  <p>already have and account? <a class="sinbtn" href="login.php">
         log in </a> </p>
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
  echo "<script>alert('Connected...');</script>";
   }
  catch(PDOException $vairu){
      echo $vairu->getMessage();
  }

if(isset($_POST['register'])){
  $sql=$dbcon->prepare("insert into regusers2(uname,email,mno,pass) values ('$uname','$email','$mno','$pass')");
 // $valu=array($uname,$email,$mno,$pass);
  $sql->execute();
  echo "<script>alert('Updated');</script>";
}
 
  
  ?>