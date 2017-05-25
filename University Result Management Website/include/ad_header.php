<!DOCTYPE html>
<?php
	include("../include/connection.php");
	
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
  <link href="../css/style.css" rel="stylesheet" type="text/css">
 

</head>
<body>
<div class="main-out">
<div class="main">
<div class="page">
<div class="top">
<div class="header">
<div class="header-top">

<h1 style="margin-top:10px;"><span>North East University Bangladesh</span></h1>
<img src="../images/logo.png" height="90" width="90" style="margin-left:250px;margin-top:10px;">

</div>
<div class="topmenu">
</div>