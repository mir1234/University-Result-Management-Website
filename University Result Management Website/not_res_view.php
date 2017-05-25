<?php include("include/header.php");
	  include("include/connection.php");?>



	<div class="content">
	<h1 style="margin-top:200px;text-align:left;margin-left:60px;">Student Details: </h1>
	<table style="margin-left:260px;">
		<tr height="150">
			<td valign="top"></td>
			<td><?php $sql="select * from result where id='$_REQUEST[id]' ";
					  $res=mysql_query($sql);
					  $arr=mysql_fetch_array($res);
					  $s_sql="select * from students where s_id='$arr[s_id]' ";
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
		<h1 style="margin-top:30px;text-align:left;margin-left:60px;">Result Details: </h1>
		<table style="margin-left:260px;">
			<tr>
			<td style="text-align:left;">
				<table>
					<tr>
						<td> Course Title</td>
					</tr>
					<tr>
						<td> Course Code</td>
					</tr>
					<tr>
						<td> Semester</td>
					</tr>
					<tr>
						<td> Course Status</td>
					</tr>
					<tr>
						<td> Grade</td>
					</tr>
					<tr>
						<td> CGPA</td>
					</tr>
				</table>
			</td><td style="text-align:left;">
				<table>
					<tr>
						<td>: <?php $c_sql="select * from course where course_code='$arr[course_id]' ";
					  $c_res=mysql_query($c_sql);
					  $c_arr=mysql_fetch_array($c_res);
					  echo $c_arr['course_title'];
					  ?>
						</td>
					</tr>
					<tr>
						<td>: <?php echo $c_arr['course_code'];?></td>
					</tr>
					<tr>
						<td>: <?php echo $arr['semester'];echo "-";echo $arr['year'];?></td>
					</tr>
					<tr>
						<td>: <?php echo '<font color="blue">';echo $arr['course_status'];echo "</font>";?></td>
					</tr>
					<tr>
						<td>: <?php if($arr['grade']=="F"){	echo '<font color="red">'; echo $arr['grade'];echo '</font>';}
							else {	echo '<font color="green">';echo $arr['grade']; echo'</font>';}?></td>
					</tr>
					<tr>
						<td>: <?php echo $arr['cgpa'];?></td>
					</tr>
				</table>
				</td>
				<td style="width:90px;"></td>
				<td valign="top" style="text-align:left;">
				<b>Course Instructor:</b> <font color="blue"><?php  $t_sql="select * from teachers where id='$arr[t_id]' ";
					  $t_res=mysql_query($t_sql);
					  $t_arr=mysql_fetch_array($t_res);
					  echo $t_arr['name'];?></font></br></br>
					  <center><img src="images/teachers/<?php echo $t_arr['picture']; ?>" alt="Instructor_Picture" height="90" width="70" style="border-radius:20px;border:2px solid black;"></center>
				</td>
			</tr>
		</table>
		<a href="view_notice.php?t_id=<?php echo $arr['t_id'];?>& semester=<?php echo $arr['semester'];?>& year=<?php echo $arr['year'];?>& dept_id=<?php echo $arr['dept_id'];?>& course_code=<?php echo $arr['course_id'];?>" style="float:left;margin-left:50px;"> << Back</a>
	
	
	

	
	</div>









<?php include("include/footer.php"); ?>