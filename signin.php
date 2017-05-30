<!DOCTYPE html>
<html>
<head>
<title>Sign In</title>
<link href="site.css" rel="stylesheet">
</head>
<body>

<div id=main>
<h1>Sign In</h1>
<div align="right"><h2><a href="login.php">Log In</a></h2></div>
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
<tr>
   <td valign="top">First Name</td>
   <td><input type="text" name="fname"></td>
</tr>
<tr>  
   <td valign="top">Last Name</td>
   <td><input type="text" name="lname"></td>
</tr>
<tr>   
   <td valign="top">E-mail</td>
   <td><input type="text" name="email"></td>
</tr>
<tr>   	
   <td valign="top">Password</td>
   <td><input type="password" name="password"></td>
</tr>
<tr>
  <td valign="top">Gender</td>
  <td><input type="radio" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="female"> Female</td>
</tr>
<tr>   
   <td valign="top">Contact Number</td>
   <td><input type="text" pattern="[0-9]*" name="cno"></td>
</tr>
<tr>   
   <td valign="top">Age</td>
   <td><input type="number" min="5" max="100" name="age"></td>
</tr>
</table>
   <input type="submit" name="submit" value="Submit">
</form>
<?php
$host_name="localhost";
$user_name="root";
$pwd="";
$database="user";
 $fname=$lname=$email=$password=$gender=$cno=$age="";
if (isset($_GET['submit'])) {
   $fname =$_GET["fname"];
   $lname =$_GET["lname"];
   $email =$_GET["email"];
   $password =$_GET["password"];
   $gender=$_GET["gender"];
   $cno=$_GET["cno"];
   $age=$_GET["age"]; 

	$conn=new mysqli($host_name,$user_name,$pwd,$database);
	if($conn->connect_error)
	{
	die("Connection failed: " . $conn->connect_error);
	}
	$sql = "INSERT INTO profile(fname, lname, email, password, gender, cont_num, age)VALUES('$fname', '$lname', '$email', '$password', '$gender', '$cno', '$age')";
  	if(empty($_GET["email"]))
	echo "E-mail ID required.";
	else {
	if($conn->query($sql)==TRUE)
	{
	echo "$fname your registration is successful."; 
	}
	else
	{
	echo "E-mail ID already exist.";
	$conn->close();
	}
	}
}
?>
<footer id="foot01"></footer>
</div>
<script src="script.js"></script>
</body>
</html>
