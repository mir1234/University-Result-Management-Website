<?php include("include/header.php");
	  include("include/connection.php");?>

	  
	  
<div class="content">
<h1 style="margin-top:200px;margin-bottom:30px;">Choose Department</h1>
		<style>
.myButton {
	-moz-box-shadow: 0px 6px 14px 0px #273173;
	-webkit-box-shadow: 0px 6px 14px 0px #273173;
	box-shadow: 0px 6px 14px 0px #273173;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #6b59b3), color-stop(1, #6952b3));
	background:-moz-linear-gradient(top, #6b59b3 5%, #6952b3 100%);
	background:-webkit-linear-gradient(top, #6b59b3 5%, #6952b3 100%);
	background:-o-linear-gradient(top, #6b59b3 5%, #6952b3 100%);
	background:-ms-linear-gradient(top, #6b59b3 5%, #6952b3 100%);
	background:linear-gradient(to bottom, #6b59b3 5%, #6952b3 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#6b59b3', endColorstr='#6952b3',GradientType=0);
	background-color:#6b59b3;
	-moz-border-radius:25px;
	-webkit-border-radius:25px;
	border-radius:25px;
	border:3px solid #30298f;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:27px;
	font-weight:bold;
	padding:11px 19px;
	text-decoration:none;
	text-shadow:0px 1px 0px #423d8a;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #6952b3), color-stop(1, #6b59b3));
	background:-moz-linear-gradient(top, #6952b3 5%, #6b59b3 100%);
	background:-webkit-linear-gradient(top, #6952b3 5%, #6b59b3 100%);
	background:-o-linear-gradient(top, #6952b3 5%, #6b59b3 100%);
	background:-ms-linear-gradient(top, #6952b3 5%, #6b59b3 100%);
	background:linear-gradient(to bottom, #6952b3 5%, #6b59b3 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#6952b3', endColorstr='#6b59b3',GradientType=0);
	background-color:#6952b3;
}
.myButton:active {
	position:relative;
	top:1px;
}

		</style>
		<div style="width:380px;margin-left:300px;">
		<?php $sql="select * from dept where status='active' order by title asc ";
			$res=mysql_query($sql);
			while($arr=mysql_fetch_array($res))
			{
			?>
		<a href="result.php?id=<?php echo $arr['id'];?>" class="myButton" style="margin-bottom:15px;color:white;"><?php echo $arr['title'];?></a> &nbsp&nbsp&nbsp&nbsp <?php }?></div>

		</br></br>









</div>
<?php include("include/footer.php"); ?>