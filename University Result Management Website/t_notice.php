<?php include("include/t_header.php"); ?>

<div class="content">
<h1 style="margin-top:220px;text-align:center;"> Add Notice </h1>
<?php
		
				if(isset($_REQUEST['post']))
						{
							if(trim($_REQUEST['topic'])!="")
							{
								$r_s="select * from result order by id asc ";
								$r_r=mysql_query($r_s);
								$fla=0;
								while($r_a=mysql_fetch_array($r_r))
								{
									if($r_a['dept_id']==$_REQUEST['dept_id'] && $r_a['course_id']==$_REQUEST['course_code'] && $r_a['semester']==$_REQUEST['semester'] && $r_a['year']==$_REQUEST['year'])
										$fla=1;
								
								}
								
								if($fla==1)
								{
									$r_s="select * from result order by id asc ";
									$r_r=mysql_query($r_s);
									$fl=0;
									while($r_a=mysql_fetch_array($r_r))
									{
										if($r_a['t_id']==$t_i && $r_a['course_id']==$_REQUEST['course_code'] && $r_a['dept_id']==$_REQUEST['dept_id'] && $r_a['semester']==$_REQUEST['semester'] && $r_a['year']==$_REQUEST['year'])
										$fl=1;
									}
									if($fl==1)
									{
										$r_s="select * from notice order by id asc ";
										$r_r=mysql_query($r_s);
										$fl=0;
										while($r_a=mysql_fetch_array($r_r))
										{
											if($r_a['t_id']==$t_i && $r_a['course_code']==$_REQUEST['course_code'] && $r_a['dept_id']==$_REQUEST['dept_id'] && $r_a['semester']==$_REQUEST['semester'] && $r_a['year']==$_REQUEST['year'])
											$fl=1;
										}
										if($fl==0)
										{
											$sql="INSERT INTO notice (t_id, topic, semester, year, dept_id, course_code, post_time)

																									VALUES

																									( '$t_i', trim('$_POST[topic]'),'$_POST[semester]', '$_POST[year]', '$_POST[dept_id]', '$_POST[course_code]', CURRENT_TIMESTAMP)";
																							
																									if (!mysql_query($sql,$con))

																									  {

																									  die('Error: ' . mysql_error());

																									  }
																									 $arr='<font color="green"><b> Notice successfuly posted.</b></font>';
																										echo $arr;
										}
									else
										{
											$arr='<font color="blue"><b>Sorry you already add a notice for this result.</br>***Or recheck notice fields***</b></font>';
											echo $arr;
									
									
										}
									}
									else
									{
										$arr='<font color="red"><b>You not added this type result</br>Add result and then post a notice.</br>***Or recheck notice fields***</b></font>';
										echo $arr;
								
								
									}
								}
								else
								{
									$msg='<p style="text-align:center;"><font color="red"><b>Sorry no result found in this notice.</b></font></p>';
										echo $msg;
								}
								
								
							}
							else
							{
								$arr='<font color="red"><b>Fill up correctly.</b></font>';
								echo $arr;
							
							
							}
						
						
						
						
						
						
						
						}
				?>


<form action="t_notice.php" method="post">
		<table align="center" style="margin-bottom:20px;">
			<tr style="text-align:left;">
				<td>Notice Topic: </td>
				<td><textarea name="topic" style="border-radius:20px;width:140px;"  autocomplete="off"></textarea></td>
			</tr><tr style="height:5px;"></tr>
			<tr style="text-align:left;">
				<td>Course Code: </td>
				<td>
					<select name="course_code" style="width:140px;border-radius:20px;">
						<?php
								$sql="select * from course where status='active' ";			
								$re=mysql_query($sql);
								while($arr=mysql_fetch_array($re))
								{
								?>
								<option value="<?php echo $arr['course_code']; ?>"><?php echo $arr['course_code']; ?></option>
								<?php
								}
													
						
						
						?>
					
					
					</select>
				
				</td>
			</tr><tr style="height:5px;"></tr>	




			<tr style="text-align:left;">
				<td>Department: </td>
				<td>
					<select name="dept_id" style="width:140px;border-radius:20px;">
						<?php
								$sql="select * from dept where status='active' ";			
								$re=mysql_query($sql);
								while($arr=mysql_fetch_array($re))
								{
								?>
								<option value="<?php echo $arr['id']; ?>"><?php echo $arr['title']; ?></option>
								<?php
								}
													
						
						
						?>
					
					
					</select>
				
				</td>
			</tr><tr style="height:5px;"></tr>



			
			<tr style="text-align:left;">
				<td>Semester: </td>
				<td>
					<select name="semester" style="width:140px;border-radius:20px;">
						<option value="spring">Spring</option>
						<option value="summer">Summer</option>
						<option value="fall">Fall</option>
					</select>
				</td>
			</tr><tr style="height:5px;"></tr>
			<tr style="text-align:left;">
				<td>Year: </td>
				<td>	
					<select name="year" style="width:140px;border-radius:20px;">
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
						<option value="2022">2022</option>
						<option value="2023">2023</option>
						<option value="2024">2024</option>
						<option value="2025">2025</option>
						<option value="2026">2026</option>
						<option value="2027">2027</option>
						<option value="2028">2028</option>
						<option value="2029">2029</option>
						<option value="2030">2030</option>
						<option value="2031">2031</option>
						<option value="2032">2032</option>
						<option value="2033">2033</option>
						<option value="2034">2034</option>
						<option value="2035">2035</option>
						<option value="2036">2036</option>
						<option value="2037">2037</option>
						<option value="2038">2038</option>
						<option value="2039">2039</option>
						<option value="2040">2040</option>
						<option value="2041">2041</option>
						<option value="2042">2042</option>
						<option value="2043">2043</option>
						<option value="2044">2044</option>
						<option value="2045">2045</option>
						<option value="2046">2046</option>
						<option value="2047">2047</option>
						<option value="2048">2048</option>
						<option value="2049">2049</option>
						<option value="2050">2050</option>
				</td>
			</tr>
			<tr style="height:5px;"></tr>
			<tr><td></td><td><input type="submit" name="post" value="Add" style="border-radius:15px;background:blue;color:white;width:60px;margin-left:80px;"></td></tr>
		</table>

	</form>
						<h1 style="margin-top:20px;margin-bottom:0px;margin-right:640px;"> Last two notices:</h1>
						
									<?php  if(isset($_REQUEST['action'])=="delete")
					{
					  $del_sql="delete  from notice where id='$_REQUEST[id]'";
					   mysql_query($del_sql);	  
					  $msg='<center><font color="red"><b>Notice is succefully deleted.</b></font></center>';
					   echo $msg;
					} ?>
 
 <table width="850px" style="border: 2px solid gray;margin-bottom:0px;font-size:13px;" align="center" >
		<tr style="background:gray;color:white;height:20px;text-align:center;">
		<td><b>Topic</b></td>
		<td><b>Course Title</b></td>
		<td><b>Course Code</b></td>
		<td><b>Semester</b></td>
		<td><b>Action</b></td>
		</tr>
		<?php
		//Print the contents
		$r_sql="select * from notice where t_id='$t_i' order by id desc ";
		$r_res=mysql_query($r_sql);
		$c=0;
		$fl=0;
		while($row = mysql_fetch_array($r_res))
		{	if($c==2) break;
		$fl=1;
		$c++;?>
			<tr style="text-align:center;">
				<td><?php echo $row['topic']; ?></td>
				<td><?php $s="select * from course where course_code='$row[course_code]' ";
				$r=mysql_query($s);
				$a=mysql_fetch_array($r);
				echo $a['course_title'];
				?></td>
				<td><?php echo $row['course_code']; ?></td>
				<td><?php echo $row['semester'];echo"-";echo $row['year']; ?></td>
				<td><a href="t_view_notice.php?t_id=<?php echo $t_i;?>& semester=<?php echo $row['semester'];?>& year=<?php echo $row['year'];?>& dept_id=<?php echo $row['dept_id'];?>& course_code=<?php echo $row['course_code'];?>">view</a> | <a href="t_notice.php?action=delete & id=<?php echo $row['id'];?>">Delete</a></td>
			</tr>
			
		<?php
		} //while
		?>
		</table>
	<?php if($fl==0){?>
		<h2>"No notice founded"</h2>
		<?php }?>
			<a href="t_added_notice.php?id=<?php echo $t_i;?>" style="margin-left:750px;">Other Notice >></a>


</div>





<?php include("include/footer.php"); ?>