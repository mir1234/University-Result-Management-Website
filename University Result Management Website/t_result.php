<?php include("include/t_header.php"); ?>

	<div class="content">
		<h1 style="margin-top:220px;"> Add Result </h1>
		
		
			<?php
				if(isset($_REQUEST['insert']))
						{
							if(trim($_POST['s_id'])!="" && trim($_POST['marks'])!="")
							{
							
														$fl=0;
														$s="select * from students order by id asc ";
														$r=mysql_query($s);
														while($a=mysql_fetch_array($r))
														{
															if($a['s_id']==trim($_POST['s_id']) && $a['status']=="active")
																$fl=1;
															if($a['s_id']==trim($_POST['s_id']) && $a['status']=="inactive")
																$fl=2;
														}
														if($fl==1)
														{
																			if($_POST['marks']<=39)
																			{
																				$grade="F";
																				$cgpa="0.00";
																			}
																			else if($_POST['marks']>=40 && $_POST['marks']<=44)
																			{
																				$grade="D";
																				$cgpa="2.00";
																			}
																			else if($_POST['marks']>=45 && $_POST['marks']<=49)
																			{
																				$grade="C";
																				$cgpa="2.25";
																			}
																			else if($_POST['marks']>=50 && $_POST['marks']<=54)
																			{
																				$grade="C+";
																				$cgpa="2.50";
																			}
																			else if($_POST['marks']>=55 && $_POST['marks']<=59)
																			{
																				$grade="B-";
																				$cgpa="2.75";
																			}
																			else if($_POST['marks']>=60 && $_POST['marks']<=64)
																			{
																				$grade="B";
																				$cgpa="3.00";
																			}
																			else if($_POST['marks']>=65 && $_POST['marks']<=69)
																			{
																				$grade="B+";
																				$cgpa="3.25";
																			}
																			else if($_POST['marks']>=70 && $_POST['marks']<=74)
																			{
																				$grade="A-";
																				$cgpa="3.50";
																			}
																			else if($_POST['marks']>=75 && $_POST['marks']<=79)
																			{
																				$grade="A";
																				$cgpa="3.75";
																			}
																			else if($_POST['marks']>=80 && $_POST['marks']<=100)
																			{
																				$grade="A+";
																				$cgpa="4.00";
																			}
																			else
																				$grade="invalid";
																			
																			
																			
																			
																			
																			if($grade!="invalid")
																			{
																			
																				
																			
																						$sss=trim($_REQUEST['s_id']);
																						$flag=0;
																						$s="select * from result where s_id='$sss' ";
																						$r=mysql_query($s);
																						while($a=mysql_fetch_array($r))
																						{
																							if($a['semester']==$_POST['semester'] && $a['course_id']==$_POST['course_code'] && $a['year']==$_POST['year'])
																								$flag=1;
																						}
																						if($flag==0)
																						{		
																								$f=0;
																								$ft=0;
																								$course_status="system-error";
																								$s="select * from result where s_id='$sss' ";
																								$r=mysql_query($s);
																								while($a=mysql_fetch_array($r))
																								{
																									if($a['course_id']==$_POST['course_code'] && $a['grade']=="F")
																									{
																										$f=1;
																										$course_status="retake-for-pass";
																									}
																									if($a['course_id']==$_POST['course_code'] && $a['grade']!="F" && $a['grade']!="B" && $a['grade']!="B+" && $a['grade']!="A-" && $a['grade']!="A" && $a['grade']!="A+")
																									{
																										$course_status="retake-for-improve";
																										$f=1;
																									}
																									if($a['course_id']==$_POST['course_code'] && ($a['grade']=="B" || $a['grade']=="B+" || $a['grade']=="A-" || $a['grade']=="A" || $a['grade']=="A+"))
																										$ft=1;
																								}
																								if($f==0)
																									$course_status="newly-taken";
																								if($ft==0)
																								{
																										$sssssid=trim($_POST['s_id']);
																										$s="select * from students where s_id='$sssssid' ";
																										$r=mysql_query($s);
																										$a=mysql_fetch_array($r);
																										$dept_id=$a['dept_id'];
																										//echo $dept_id;
																										$sql="INSERT INTO result (s_id, t_id, course_id, dept_id, marks, grade, cgpa, semester, year, course_status)

																										VALUES

																										(trim('$_POST[s_id]'),'$t_i','$_POST[course_code]','$dept_id',trim('$_POST[marks]'),'$grade','$cgpa', '$_POST[semester]','$_POST[year]','$course_status')";
																								
																										if (!mysql_query($sql,$con))

																										  {

																										  die('Error: ' . mysql_error());

																										  }
																										 $arr='<font color="green"><b> Result successfuly updated.</b></br></font><a href="t_notice.php">****Please give a notice****</a>';
																											echo $arr;
																								}
																								else
																								{
																								$arr='<font color="red"><b> This student not allowed for improve.</b></font>';
																								echo $arr;
																								}
																						}
																						else
																						{
																						$arr='<font color="red"><b> This result already added.</b></font>';
																						echo $arr;
																						}
																				
																							
																							
																							
																							
																							
																							
																							
																							
																			}
																			else
																			{
																				$arr='<font color="red"><b> Invalid marks given.</b></font>';
																				echo $arr;
																			}
														
													}
													else if($fl==2)
													{
														$arr='<font color="purple"><b> This student ID is inactive.</b></font>';
																				echo $arr;
													}
													else
													{
														$arr='<font color="red"><b> Invalid student ID.</b></font>';
																				echo $arr;
													}
							}
							else
							{
								$arr='<font color="red"><b>Fill up correctly.</b></font>';
								echo $arr;
							
							
							}
						
					}
		
		
		
		
		
		
		
			?>
		
		
		
		
		<form action="t_result.php" method="post">
		<table align="center" style="margin-bottom:40px;">
			<tr style="text-align:left;">
				<td>Student ID: </td>
				<td><input type="text" name="s_id" style="border-radius:20px;"  autocomplete="off"></td>
			</tr><tr style="height:5px;"></tr> 
			<tr style="text-align:left;">
				<td>Marks: </td>
				<td><input type="text" name="marks" autocomplete="off" style="border-radius:20px;"></td>
			</tr><tr style="height:5px;"></tr>
			<tr style="text-align:left;">
				<td>Course Code: </td>
				<td style="text-align:center;font-size:18px;"><?php echo '<font color="brown">'; echo $_REQUEST['course_code']; echo '</font';?></td>
			</tr><tr style="height:5px;"></tr>
			<tr style="text-align:left;">
				<td>Semester: </td>
				<td style="text-align:center;font-size:18px;"><?php echo '<font color="brown">'; echo $_REQUEST['semester']; echo "-"; echo$_REQUEST['year']; echo '</font';?></td>
			</tr><tr style="height:5px;"></tr>
			<tr style="height:5px;"></tr>
			<tr><td></td><td><input type="submit" name="insert" value="Add" style="border-radius:15px;background:blue;color:white;width:60px;margin-left:80px;"></td></tr>
		</table>
		<input type="hidden" name="course_code" value="<?php echo $_REQUEST['course_code']; ?>"/>
		<input type="hidden" name="year" value="<?php echo $_REQUEST['year']; ?>"/>
		<input type="hidden" name="semester" value="<?php echo $_REQUEST['semester']; ?>"/>
		
		
	</form>
		
		
		

		<h1 style="margin-top:20px;margin-bottom:0px;margin-right:640px;"> Last two results:</h1>
					<?php  if(isset($_REQUEST['action'])=="delete")
					{
					  $del_sql="delete  from result where id='$_REQUEST[id]'";
					   mysql_query($del_sql);	  
					  $msg='<center><font color="red"><b>Result is succefully deleted.</b></font></center>';
					   echo $msg;
					} ?>
 <table width="850px" style="border: 2px solid gray;margin-bottom:0px;font-size:13px;" align="center" >
		<tr style="background:gray;color:white;height:20px;text-align:center;">
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
		$r_sql="select * from result where t_id='$t_i' order by id desc ";
		$r_res=mysql_query($r_sql);
		$c=0;
		$fl=0;
		while($row = mysql_fetch_array($r_res))
		{	if($c==2) break;
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
				<td><a href="t_res_view.php?id=<?php echo $row['id'];?>&ids=<?php echo $row['s_id'];?>& course_code=<?php echo $_REQUEST['course_code']; ?>&year=<?php echo $_REQUEST['year']; ?>&semester=<?php echo $_REQUEST['semester']; ?>">view</a> | <a href="t_result.php?action=delete & id=<?php echo $row['id']; ?>& course_code=<?php echo $_REQUEST['course_code']; ?>&year=<?php echo $_REQUEST['year']; ?>&semester=<?php echo $_REQUEST['semester']; ?>">Delete</a></td>
			</tr>
			
		<?php
		} //while
		?>
		</table>
	<?php if($fl==0){?>
		<h2>"No result founded"</h2>
		<?php }?>
			<a href="t_added_res.php" style="margin-left:750px;">Other Result >></a>

		
		
	</div>






<?php include("include/footer.php"); ?>