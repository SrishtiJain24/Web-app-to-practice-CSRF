<!DOCTYPE html>
<html>
<head><title>Log In</title>
<link href="site.css" rel="stylesheet">
</head>
<body>
<div id=main>
<h1>Log In</h1>
<form name="loginform" action="login_exec.php">
<table>
  <tr>
    <td colspan="2">
		<!--the code bellow is used to display the message of the input validation-->
		 <?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>',$msg,'</li>'; 
				}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
			}
		?>
	</td>
  </tr>
  <tr>
    <td width="116"><div align="right">E-mail ID</div></td>
    <td width="177"><input name="email" type="text" /></td>
  </tr>
  <tr>
    <td><div align="right">Password</div></td>
    <td><input name="password" type="password" /></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input name="" type="submit" value="login" /></td>
  </tr>
   
</table>
</form>
<footer id="foot01"></footer>
</div>
<script src="script.js"></script>
</body>
</html>