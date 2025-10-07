<!DOCTYPE html>
<!--
	Class:		cop4433
	Project:	ACE Tutoring Lab
	Author:		Jay King
	Due:		10-3-2025
	Filename:	index.php
-->
<html lang="en">

<?php include '../view/head.php';?>
<body>
<?php include '../view/header.php';?>
<main>
<?php include '../view/commodore.php';?>
<h2>Logging Out</h2>
<p>
Thank you for using the tutoring lab. Have a nice day.
</p>
</main>
<?php include '../view/footer.php';?>
<?php
header("Refresh: 15; url=index.php");
exit();
?>
</body>
</html>