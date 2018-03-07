<?php
   $conn = mysqli_connect("localhost","id4266396_abhay","94060","id4266396_price");
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
      
   if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$_SESSION['login'] = ((isset($_SESSION['login'])) ? $_SESSION['login'] : 0);


if(isset($_GET['submit'])){
$loginname = $_GET['uname'];
$loginpsw = $_GET['psw'];
if($loginname == 'username'){
   if($loginpsw == 'password')
   {
   $_SESSION['login']++;
   header("Location: https://abhaykrrathore619.000webhostapp.com/login2.php");   
   }
   else{
	   echo "Password is incorrect!";
   }
}
else{
	echo "Wrong username!";
}
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<style>
form {
    border: 3px solid #f1f1f1;
	padding : 20px;
	width : 30%;
}
input[type=text], input[type=password] {
    width: 60%;
    padding: 12px 20px;
    margin: 10px 10px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 7px 0;
    border: none;
    cursor: pointer;
    width: 70%;	
}
button:hover {
    opacity: 0.8;
}
</style>
<body>
<br/><br/><br/><br/><br/>
<center>
<h2>Login Form</h2>
<form action="<?= ($_SERVER['PHP_SELF'])?>" method="GET">
  <center><div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" id="id01" name="uname" required><br/>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="id02" name="psw" required><br/>
        
    <input type="submit" name="submit" value="Submit">
  </center>
  </div>
</form>
</center>
</body>
</html>
