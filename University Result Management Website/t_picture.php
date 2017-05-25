<?php include("include/t_header.php"); 
?>

<div class="content" style="margin-top:230px;text-align:left;">
	<h1 style="margin-left:325px;">Change Picture:</h1>
	<h2 style="margin-bottom:70px;"><a href="t_picture.php"><img src="images/teachers/<?php echo $t_arr['picture']; ?>" alt="Teacher_Picture" style="border-radius:30px;height:180px;width:150px;border: 2px solid black;margin-left:320px;"></a>
	<?php
		echo $t_arr['name'];
		
	?>
	</h2>
	
	<form action="t_home.php" ENCTYPE="MULTIPART/FORM-DATA" method="post">
						<font style="margin-left: 325px;">Change Photo: <input type="file" name="photo[0]"></font></br>
						<input type="hidden" name="id" value="<?php echo $t_i; ?>">
						<input type="submit" name="Update" value="Update" style="border-radius:20px;margin-left:540px;background:green;color:white;"/>
	</form>
</div>










<?php include("include/footer.php"); ?>