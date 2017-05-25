<?php include("include/header.php");include("include/connection.php"); ?>

<style>
	
	.button {
   border: 1px solid #0a3c59;
   background: #3e779d;
   background: -webkit-gradient(linear, left top, left bottom, from(#65a9d7), to(#3e779d));
   background: -webkit-linear-gradient(top, #65a9d7, #3e779d);
   background: -moz-linear-gradient(top, #65a9d7, #3e779d);
   background: -ms-linear-gradient(top, #65a9d7, #3e779d);
   background: -o-linear-gradient(top, #65a9d7, #3e779d);
   background-image: -ms-linear-gradient(top, #65a9d7 0%, #3e779d 100%);
   padding: 6px 12px;
   -webkit-border-radius: 6px;
   -moz-border-radius: 6px;
   border-radius: 6px;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   box-shadow: rgba(255,255,255,0.4) 0 1px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   text-shadow: #7ea4bd 0 1px 0;
   color: #080808;
   font-size: 20px;
   font-family: helvetica, serif;
   text-decoration: none;
   vertical-align: middle;
   
   }
.button:hover {
   border: 1px solid #0a3c59;
   text-shadow: #1e4158 0 1px 0;
   background: #3e779d;
   background: -webkit-gradient(linear, left top, left bottom, from(#65a9d7), to(#3e779d));
   background: -webkit-linear-gradient(top, #65a9d7, #3e779d);
   background: -moz-linear-gradient(top, #65a9d7, #3e779d);
   background: -ms-linear-gradient(top, #65a9d7, #3e779d);
   background: -o-linear-gradient(top, #65a9d7, #3e779d);
   background-image: -ms-linear-gradient(top, #65a9d7 0%, #3e779d 100%);
   
   color: #fff;
   }
.button:active {
   text-shadow: #1e4158 0 1px 0;
   border: 1px solid #0a3c59;
   
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#3e779d));
   background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
   background: -moz-linear-gradient(top, #3e779d, #65a9d7);
   background: -ms-linear-gradient(top, #3e779d, #65a9d7);
   background: -o-linear-gradient(top, #3e779d, #65a9d7);
   background-image: -ms-linear-gradient(top, #3e779d 0%, #65a9d7 100%);
   color: #fff;
   }


</style>
<div class="content">
<div style="width:200px;float:left;margin-top:40px;border-right:2px solid black;">
<h1>Select Semester:</h1>
	<?php          $fl=0;
			$r_sql="select * from result where s_id='$_REQUEST[s_id]' ";
			$r_res=mysql_query($r_sql);
			while($r_arr=mysql_fetch_array($r_res))
			{
				if($r_arr['year']==$_REQUEST['year'] && $r_arr['semester']=="spring")
					$fl=1;
			}
			if($fl==1)
			{             ?>
	<a href='sem_search_res.php?s_id=<?php echo $_REQUEST['s_id'];?>& year=<?php echo $_REQUEST['year']?>& semester=spring ' class='button' style="margin-left:80px;">&nbsp Spring&nbsp </a></br></br></br></br></br></br>
	<?php } 
			$fl=0;
			$r_sql="select * from result where s_id='$_REQUEST[s_id]' ";
			$r_res=mysql_query($r_sql);
			while($r_arr=mysql_fetch_array($r_res))
			{
				if($r_arr['year']==$_REQUEST['year'] && $r_arr['semester']=="summer")
					$fl=1;
			}
			if($fl==1)
			{             ?>
	<a href='sem_search_res.php?s_id=<?php echo $_REQUEST['s_id'];?>& year=<?php echo $_REQUEST['year']?>& semester=summer ' class='button' style="margin-left:80px;">Summer</a></br></br></br></br></br></br>
	<?php } 
			$fl=0;
			$r_sql="select * from result where s_id='$_REQUEST[s_id]' ";
			$r_res=mysql_query($r_sql);
			while($r_arr=mysql_fetch_array($r_res))
			{
				if($r_arr['year']==$_REQUEST['year'] && $r_arr['semester']=="fall")
					$fl=1;
			}
			if($fl==1)
			{             ?>
	<a href='sem_search_res.php?s_id=<?php echo $_REQUEST['s_id'];?>& year=<?php echo $_REQUEST['year']?>& semester=fall ' class='button' style="margin-left:80px;">&nbsp&nbsp&nbsp Fall&nbsp&nbsp&nbsp </a></br></br></br></br></br></br>
	<?php } ?></br></br></br>
	<a href="search.php?s_id=<?php echo $_REQUEST['s_id']?>" style="float:left;margin-left:50px;"> << Back</a>
</div>

<div style="border:0px solid black;width:750px;float:left;">

		<h1 style="margin-top:50px;text-align:left;margin-left:100px;">Student Details: </h1>
	<table style="margin-left:120px;border:1px solid black;border-radius:15px;font-size:15px;">
		<tr height="150">
			<td valign="top"></td>
			<td><?php include("include/connection.php");
					  $s_sql="select * from students where s_id='$_REQUEST[s_id]' ";
					  $s_res=mysql_query($s_sql);
					  $s_arr=mysql_fetch_array($s_res);
				?>
				<img src="images/students/<?php echo $s_arr['picture']; ?>" alt="Student_Picture" height="145" width="120" style="border-radius:20px;border:2px solid black;"></td>
				<td style="width:20px;"></td>
				<td valign="top" style="text-align:left;">
					<table>
					<tr>
						<td> Name</td>
					</tr>
					<tr>
						<td> Father Name</td>
					</tr>
					<tr>
						<td> Mother Name</td>
					</tr>
					<tr>
						<td> Student ID</td>
					</tr>
					<tr>
						<td> Department</td>
					</tr>
					<tr>
						<td> Session</td>
					</tr>
					</table>
				</td>
				
				<td valign="top" style="text-align:left;">
					<table>
					<tr>
						<td>: <?php echo $s_arr['name']; ?></td>
					</tr>
					<tr>
						<td>: <?php echo $s_arr['f_name']; ?></td>
					</tr>
					<tr>
						<td>: <?php echo $s_arr['m_name']; ?></td>
					</tr>
					<tr>
						<td>: <?php echo $s_arr['s_id']; ?></td>
					</tr>
					<tr>
						<td>: <?php $d_sql="select * from dept where id='$s_arr[dept_id]' ";
					  $d_res=mysql_query($d_sql);
					  $d_arr=mysql_fetch_array($d_res);
					  echo $d_arr['title'];
					  ?>
					  </td>
					</tr>
					<tr>
						<td>: <?php echo $s_arr['admission_semester'];echo "-"; echo  $s_arr['admission_year'];?></td>
					</tr>
					</table>
				</td>
		</tr>
		</table>
		<h1 style="margin-top:50px;float:left;margin-left:30px;margin-bottom:0px;"> Last three results:</h1>
 
 
 <table width="740px" style="border: 2px solid gray;margin-bottom:20px;font-size:11px;" align="center" >
		<tr style="background:gray;color:white;height:30px;text-align:center;">
		<td><b>Student ID</b></td>
		<td><b>Student Name</b></td>
		<td><b>Course Title</b></td>
		<td><b>Course Code</b></td>
		<td><b>Semester</b></td>
		<td><b>Grade</b></td>
		<td><b>Action</b></td>
		</tr>
		<?php
		//Print the contents
		$r_sql="select * from result where s_id='$_REQUEST[s_id]' AND status='active' order by id desc ";
		$r_res=mysql_query($r_sql);
		$c=0;
		$fl=0;
		while($row = mysql_fetch_array($r_res))
		{	if($c==3) break;
		$fl=1;
		$c++;?>
			<tr style="text-align:center;">
				<td><?php echo $row['s_id']; ?></td>
				<td><?php $s="select * from students where s_id='$row[s_id]' ";
				$r=mysql_query($s);
				$a=mysql_fetch_array($r);
				echo $a['name'];
				?></td>
				<td><?php $s="select * from course where course_code='$row[course_id]' ";
				$r=mysql_query($s);
				$a=mysql_fetch_array($r);
				echo $a['course_title'];
				?></td>
				<td><?php echo $row['course_id']; ?></td>
				<td><?php echo $row['semester'];echo"-";echo $row['year']; ?></td>
				<td><?php if($row['grade']=="F"){	echo '<font color="red">'; echo $row['grade'];echo '</font>';}
							else {	echo '<font color="green">';echo $row['grade']; echo'</font>';}?></td>
				<td><a href="sea_res_view.php?id=<?php echo $row['id'];?>&ids=<?php echo $_REQUEST['s_id'];?>">view</a> </td>
			</tr>
			
		<?php
		} //while
		?>
		</table>
		<?php if($fl==0){?>
		<h2>"No result founded"</h2>
		<?php }?>
	
</div>








</div>




<?php include("include/footer.php"); ?>