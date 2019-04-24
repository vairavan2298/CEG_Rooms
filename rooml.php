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
        } else {
          $uname = test_input($_POST["name"]);
          }
        
        if (empty($_POST["e-mail"])) {
          $emailErr = "Email is required";
        } else {
          $email = test_input($_POST["e-mail"]);
          }
          if (empty($_POST["password"])) {
          $passErr = "password is required";
        } else {
          $pass= test_input($_POST["password"]);
          }
          if (empty($_POST["pswd"])) {
          $passErr = "password is required";
        } else {
          $pass2= test_input($_POST["pswd"]);
          }
        } ?>

<!DOCTYPE html>
<html>
<head>
      <title>Sign Up</title>
      <meta name="viewport" content="width=device-width initial-scale=1.0">
     <style>
          body,html{
            height: 100%;
            font-family: Arial;
            margin:0;
            background: url(a.jpeg);
          }
          *{
             box-sizing: border-box;
             -webkit-box-sizing: border-box;
             -moz-box-sizing: border-box;
          }
          h1{
            font-size: 3em;
            margin: 0;
            padding:20px;
            color:red;
            text-align: center;
          }
          .warp{
            background: url(b.jpg);
            min-height: 450px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

          }
          .container{
            position: absolute;
            right: 5px;
            margin:20px;
            max-width: 800px;
            padding: 16px;
            background: #fff;
            border-radius:10px; 

          }
          input[type=text],input[type=e-mail],input[type=text],input[type=password],input[type=password]{
            width: 100%;
            padding: 13px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
            font-size: 10px;

          }
          .error{color:blue;}
          .sinbtn{
            text-align:left;
            background:#4caf50;
            border: none;
            padding: 13px 20px;
            text-decoration:none;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            width: 50%;
          }
          .sinbtn:hover{
            background: black;
            color: white;
          }
     </style>
</head>
<body>
<div class=wrap>
        
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" novalidate>
          <div class="container">
          <table>
              <tr>
                <td></td>
                <td>
                  <h1 text-align=center> SIGN UP</h1>
                </td>
              </tr>
          
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
                  <input type="text" placeholder="enter your name" name="name">
                </td>
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
                  <input type="text" placeholder="enter your mobile number" name="Mobile_no"><br>
                </td>
              </tr> 
              <tr>
                <td>
                  password:
                </td>
                <td>
                  <input type="password" placeholder="enter the password"name="password">
                </td>
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
                  <input type="password" placeholder="re-enter the same pssword"name="pswd"><br>
                </td> 
              </tr> 
              <tr>
                <td></td>
                <td>  
                  <input type="submit"  name="register" value="SIGN UP">
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
  //echo "Connected";
  }
  catch(PDOException $vairu){
      echo $vairu->getMessage();
  }
  function regUsers($dbcon,$uname,$email,$mno,$pass){
    $sql=$dbcon->prepare("insert into regusers(uname,email,mno,pass) values (?,?,?,?) ");
    $values=array($uname,$email,$mno,$pass);
    $sql->execute($values);
    //echo "Updated";
  }
  if(isset($_POST['register'])){
    /*$uname=$_POST['name'];
    $email=$_POST['e-mail'];
    $mno=$_POST['Mobile_no'];    
    $pass=$_POST['password'];
    $pass2=$_POST['pswd'];*/
    $mno=$_POST['Mobile_no'];
    if($pass!=$pass2){
      ?>
      <script type="text/javascript">
        alert('Password doesn\'t match');
      </script>
      <?php
    }
    else{
      regUsers($dbcon,$uname,$email,$mno,$pass);
    }
  }


  ?>