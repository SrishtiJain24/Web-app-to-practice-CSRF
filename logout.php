<html>
<head><title>Log Out Successfull</title>
<link href="site.css" rel="stylesheet">
<body>
<div id=main>
<?php
session_start();
unset($_SESSION['SESS_MEMBER_ID']);
unset($_SESSION['SESS_FIRST_NAME']);
unset($_SESSION['SESS_LAST_NAME']);
//session_destroy();
?>
<h1><p align="center"><a href='login.php'>Main Menu</a></p></h1>
<footer id="foot01"></footer>
</div>
<script src="script.js"></script>
</body>
</html>
