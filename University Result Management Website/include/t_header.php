<!DOCTYPE html>
<?php
    require_once('auth.php');
	include("include/connection.php");
	$t_i=$_SESSION['SESS_MEMBER_ID'];
	$t_sql="select * from teachers where id='$t_i' ";			
	$t_re=mysql_query($t_sql);
	$t_arr=mysql_fetch_array($t_re);
						
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
  <li style="margin-left:30px;"><a href="t_home.php">Home</a></li>
  <li><a href="t_first_result.php">Result</a></li>
  <li><a href="t_notice.php">Notice</a></li>
  <li><a href="t_profile.php">Profile</a></li>
  <li><a href="home.php">Log Out</a></li>
   
</ul>
</div>