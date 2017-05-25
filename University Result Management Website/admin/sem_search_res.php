<?php include("../include/ad_log_header.php"); 
	  
	  
	  $sql="select * from result order by id asc ";
	  $result=mysql_query($sql);
	 
	  
	  
	  
	  
	  
	  
	  
	  $fl=0;
	  
	  ?>
	  <div class="content">

	  <h1 style="margin-top:200px;"> Result of semester: ( <?php echo $_REQUEST['semester'];	echo "-"; echo $_REQUEST['year'];?> )</h1>
 
 
 <table width="950px" style="border: 2px solid gray;font-size:13px;" align="center" >
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
		
		while($row = mysql_fetch_array($result))
		{   if($row['s_id']==$_REQUEST['s_id'] && $row['semester']==$_REQUEST['semester'] && $row['year']==$_REQUEST['year']){$fl=1;?>
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
				<td><a href="sem_sea_res_view.php?id=<?php echo $row['id'];?>&ids=<?php echo $_REQUEST['s_id'];?>">view</a> </td>
			</tr>
			
		<?php
		}} //while
		?>
		</table>
		<?php if($fl==0){?>
		<h2>"No result founded"</h2>
		<?php }?>
	</br>
	<center><font size="3">*** Total CGPA of this semester: <?php   
			
		$sql="select * from result order by id asc ";
	  $result=mysql_query($sql);
		$fls=0;
		$to=0;
		$cre=0;
		while($row = mysql_fetch_array($result))
		{ 
			if($row['s_id']==$_REQUEST['s_id'] && $row['semester']==$_REQUEST['semester'] && $row['year']==$_REQUEST['year']){$fls=1;
					
				$s="select * from course where course_code='$row[course_id]' ";
				$r=mysql_query($s);
				$a=mysql_fetch_array($r);
					$poi=$a['credit']*$row['cgpa'];
					$cre=$cre+$a['credit'];
					$to=$to+$poi;
				}
		}
		if($fls==1)
		{	echo '<font color="blue">'; echo ($to/$cre);echo "</font> (out of 4.00) ***";
		}
		else
		{
			echo '<font color="blue">'; echo "null";echo "</font> (out of 4.00) ***";	
		}

	?></font></center>
	</br>
	<a href="sem_search.php?s_id=<?php echo $_REQUEST['s_id'];?>& year=<?php echo $_REQUEST['year'];?>" style="float:left;margin-left:50px;"> << Back</a>
	</br></br>
	
</div> 


 
 
 
 
<?php include("../include/footer.php"); ?>