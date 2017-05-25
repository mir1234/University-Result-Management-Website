<?php include("../include/ad_log_header.php"); ?>


	<div class="content">
	<h1 style="margin-top:180px;margin-right:700px;">Change Status</h1>
	<?php
		if(isset($_REQUEST['change']))
			{
				$sql="UPDATE dept set
						status='$_REQUEST[status]'
						where id='$_REQUEST[id]' ";
				mysql_query($sql);
				$msg='<font color="green" style="margin-right:700px;"><b>Status successfully changed.</b></font>';
					echo $msg;
			
			}
			
	?>
	<form action="dept_view.php" method="post">
			<font style="margin-right:700px;">
			<?php 
				$sql="select * from dept where id='$_REQUEST[id]' ";
				$res=mysql_query($sql);
				$arr=mysql_fetch_array($res);
			?>
			Status: 
			<select name="status"   style="border-radius:20px;width:70px;">
				<?php if($arr['status']=="active") { ?>
					<option value="active">Active</option>
				<option value="inactive">Inactive</option>
				<?php } else { ?>
					<option value="inactive">Inactive</option>
					<option value="active">Active</option>
					<?php } ?>
			</select>
			<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>"> 
			<input type="submit" name="change" value="Change" style="width:60px;border-radius:20px;background:blue;color:white;border:2px solid gray;">
			<button style="border-radius:20px;width:80px;background:black;color:white;"> <?php echo $arr['title']; ?></button></font>
	</form>
	
	
	<h1 style="margin-top:30px;color:brown;margin-bottom:70px;"><u> Select any item </u></h1>
	
	<a href="student.php?id=<?php echo $_REQUEST['id']; ?>"><button style="background:purple;color:white;width:130px;height:70px;border:2px solid black;border-radius:20px;font-size:26px;margin-right:40px;box-shadow: 0px 6px 25px 0px red;margin-bottom:150px;">Students</button></a>
	<a href="course.php?id=<?php echo $_REQUEST['id']; ?>"><button style="background:purple;color:white;width:130px;height:70px;border:2px solid black;border-radius:20px;font-size:26px;margin-right:40px;box-shadow: 0px 6px 25px 0px red;margin-bottom:150px;">Courses</button></a>
	<a href="result.php?id=<?php echo $_REQUEST['id']; ?>"><button style="background:purple;color:white;width:130px;height:70px;border:2px solid black;border-radius:20px;font-size:26px;margin-right:40px;box-shadow: 0px 6px 25px 0px red;margin-bottom:150px;">Results</button></a>
	<a href="notice.php?id=<?php echo $_REQUEST['id']; ?>"><button style="background:purple;color:white;width:130px;height:70px;border:2px solid black;border-radius:20px;font-size:26px;margin-right:40px;box-shadow: 0px 6px 25px 0px red;margin-bottom:150px;">Notices</button></a>
	
	</div>









<?php include("../include/footer.php"); ?>