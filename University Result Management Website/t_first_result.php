<?php include("include/t_header.php"); ?>

	<div class="content">
	<h1 style="margin-top:180px;">Select Option</h1>
	<form action="t_result.php" method="post">
		<table align="center">
			<tr>
				<td style="text-align:left;"><h2>Course Code:</h2></td><td style="margin-left:20px;"><select name="course_code" style="width:140px;border-radius:20px;">
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
					
					
					</select></td>
			</tr>
			<tr>
				<td style="text-align:left;"><h2>Semester:</h2></td><td style="margin-left:20px;"><select name="semester" style="width:140px;border-radius:20px;">
						<option value="spring">Spring</option>
						<option value="summer">Summer</option>
						<option value="fall">Fall</option>
					</select></td>
			</tr>
			<tr>
				<td style="text-align:left;"><h2>Year:</h2></td><td style="margin-left:20px;">
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
						<option value="2050">2050</option></select></td>
			</tr>
			<tr><td></td><td><input type="submit" name="next" value="Next" style="border-radius:15px;background:blue;color:white;width:60px;margin-left:80px;"></td></tr>
		</table>
		</form>
		<h1 style="margin-top:20px;margin-bottom:0px;margin-right:640px;"> Last five results:</h1>
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
		{	if($c==5) break;
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
				<td><a href="t_res_view_1.php?id=<?php echo $row['id'];?>&ids=<?php echo $row['s_id'];?>">view</a> | <a href="t_first_result.php?action=delete & id=<?php echo $row['id'];?>">Delete</a></td>
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