<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head><title>Your Profile</title>
<link href="site.css" rel="stylesheet">
</head>
<body>
<div id=main>
<?php
if(isset($_SESSION['SESS_MEMBER_ID'])){
$host_name="localhost";
$user_name="root";
$pwd="";
$database="user";
$conn=new mysqli($host_name,$user_name,$pwd,$database);
$id=$_SESSION['SESS_MEMBER_ID'];
$sql = "SELECT * FROM profile where mem_id='$id'";
$result=$conn->query($sql);
while($row3 = $result->fetch_assoc())
{ 
$fname=$row3["fname"];
$lname=$row3["lname"];
$email=$row3["email"];
$gender=$row3["gender"];
$contact=$row3["cont_num"];
$age=$row3["age"];
}
$conn->close();
?>
<h1>Your Profile Information </h1>
<div align="right"><h2><a href="index.php">Log Out</a></h2></div>
<table>
  
  <tr>
    <td valign="top">First Name </td>
    <td><?php echo $fname ?></td>
  </tr>
  <tr>
    <td valign="top">Last Name</td>
    <td><?php echo $lname ?></td>
  </tr>
  <tr>
    <td valign="top">Email ID</td>
    <td valign="top"><?php echo $email ?></td>
  </tr>
  <tr>
    <td valign="top">Gender</td>
    <td><?php echo $gender ?></td>
  </tr>
  <tr>
    <td valign="top">Contact No</td>
    <td><?php echo $contact ?></td>
  </tr>
  <tr>
    <td valign="top">Age</td>
    <td><?php echo $age ?></td>
  </tr>
</table>

<br>
<br>
<a  href="upload.php"  id="st-btn">Upload New Compositions</a>
<br>
<br>
<br>
<a  href="previous.php"  id="st-btn">View Previous Work</a>
<p align="center"><a href="login.php"></a></p>
</div>
<div align="right"><h3><a href="pppp.php">Change Password</a></h3></div>
<script src="script.js"></script>
<?php
}
else
{
echo "<h3>You need to be logged in to view your profile.</h3>";
}
?>
</body>
</html>
