<!DOCTYPE html>
<?php
		session_start();
		unset($_SESSION['SESS_MEMBER_ID']);
		unset($_SESSION['SESS_FIRST_NAME']);
		unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
  <meta charset="UTF-8">
  
  
  <link rel="shortcut icon" href="images/logo.png" type="image/png">
  <title>NEUB Result</title>
  
  <meta name="description" content="Description of your site goes here">
  <meta name="keywords" content="keyword1, keyword2, keyword3">
  <link href="css/style.css" rel="stylesheet" type="text/css">
 

</head>
<body>
<div class="main-out">
<div class="main">
<div class="page">
<div class="top">
<div class="header">
<div class="header-top">

<h1 style="margin-top:10px;"><span>North East University Bangladesh</span></h1>
<img src="images/logo.png" height="90" width="90" style="margin-left:250px;margin-top:10px;">

</div>
<div class="topmenu">
<ul>
  <li style="margin-left:60px;"><a href="home.php">Home</a></li>
  <li><a href="notice.php">Notice</a></li>
  <li><a href="dept_result.php">Result</a></li>
  <li><a href="login.php">Log In</a></li>

  <li style="margin-left:120px;"><form action="search.php" method="post"><input type="text" name="s_id" autocomplete="off" placeholder="       Enter student ID" style="margin-top:8px;border-radius:20px;">&nbsp&nbsp<input type="submit" name="search" value="Search" style="margin-top:8px;border-radius:10px;width:50px;"></form></li>
</ul>
</div>