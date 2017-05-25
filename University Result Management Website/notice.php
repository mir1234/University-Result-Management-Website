<?php include("include/header.php"); include("include/connection.php");?>





<div class="content">
<h1 style="margin-top:200px;margin-bottom:30px;">Choose Department</h1>
		<style>
		.myButton {
	-moz-box-shadow: 0px 6px 14px 0px #3e7327;
	-webkit-box-shadow: 0px 6px 14px 0px #3e7327;
	box-shadow: 0px 6px 14px 0px #3e7327;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77b55a), color-stop(1, #72b352));
	background:-moz-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-webkit-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-o-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:-ms-linear-gradient(top, #77b55a 5%, #72b352 100%);
	background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77b55a', endColorstr='#72b352',GradientType=0);
	background-color:#77b55a;
	-moz-border-radius:25px;
	-webkit-border-radius:25px;
	border-radius:25px;
	border:3px solid #4b8f29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:27px;
	font-weight:bold;
	padding:11px 19px;
	text-decoration:none;
	text-shadow:0px 1px 0px #5b8a3c;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #72b352), color-stop(1, #77b55a));
	background:-moz-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-webkit-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-o-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:-ms-linear-gradient(top, #72b352 5%, #77b55a 100%);
	background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#72b352', endColorstr='#77b55a',GradientType=0);
	background-color:#72b352;
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
		<a href="dept_notice.php?id=<?php echo $arr['id'];?>" class="myButton" style="margin-bottom:15px;color:white;"><?php echo $arr['title'];?></a> &nbsp&nbsp&nbsp&nbsp <?php }?></div>

		</br></br>


</div>











<?php include("include/footer.php"); ?>