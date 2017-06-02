<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>
<link href="site.css" rel="stylesheet">

</head>
 
<body>
<div id=main>
  <h1><div align="center">  <b> SCRIBBLER'S CAFE </b>  </div></h1>
  <br><br><br>
	<fieldset>
		<legend><div align="center"> <h3><b> CHANGE PASSWORD </b> </h3></div></legend>
		
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<dl>
			<dt>
				New Password
			</dt>
				<dd>
					<input type="password" name="new_pass" placeholder="New Password..." value=""  required />
				</dd>
		</dl>
		<dl>
			<dt>
				Retype New Password
			</dt>
				<dd>
					<input type="password" name="re_pass" placeholder="Retype New Password..." value="" required />
				</dd>
		</dl>
 
		<p align="center">
			<input type="submit" class="btn" value="Reset Password" name="re_password" />
		</p>
	</form>
	</fieldset>
<?php 
		$servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "user";

		$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_GET['re_password'])){	
		$new_pass=$repass=$id="";
		$id=$_SESSION['SESS_MEMBER_ID'];
		$new_pass=$_GET['new_pass'];
		$re_pass=$_GET['re_pass'];
		{
		if($new_pass==$re_pass){
			$sql = "UPDATE profile SET password='$new_pass' WHERE mem_id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Updated Successfully!";
echo "<div align='center'><h2><a href='logout.php'>Log Out</a></h2></div>";

}                    
}      
else {
    echo "Error updating password: " . $conn->error;
} 
}

$conn->close(); }
?>
<footer id="foot01"></footer>
</div>	
<script src="script.js"></script>
</body>
</html>