<?php include("../include/ad_log_header.php"); ?>


	<div class="content">
		<h1 style="margin-top:200px;margin-bottom:10px;">Recently added notices</h1>
		<?php 
				$sql="select * from dept where id='$_REQUEST[id]' ";
				$res=mysql_query($sql);
				$arr=mysql_fetch_array($res);
			?>
			<p style="color:blue;margin-top:0px;margin-right:500px;">Dept. Status:
			<button style="border-radius:20px;width:80px;background:purple;color:white;"> <?php echo $arr['status']; ?></button>
			<button style="border-radius:20px;width:80px;background:black;color:white;"> <?php echo $arr['title']; ?></button>
			<a href="dept_view.php?id=<?php echo $_REQUEST['id']; ?>"><button style="border-radius:20px;width:80px;background:blue;color:white;">Back</button></a>
		</p>
		<?php
		//Update Query
		if(isset($_REQUEST['edit']))
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
					$sql="UPDATE notice set
							topic=trim('$_REQUEST[topic]'),
							course_code='$_REQUEST[course_code]',
							status='$_REQUEST[status]',
							semester='$_REQUEST[semester]',
							year='$_REQUEST[year]',
							dept_id='$_REQUEST[dept_id]'
							where id='$_REQUEST[n_id]' ";
					mysql_query($sql);
					$msg='<p style="text-align:center;"><font color="green"><b>Information successfully updated.</b></font></p>';
						echo $msg;
				}
				if($fla==0)
				{
					$msg='<p style="text-align:center;"><font color="red"><b>Sorry no result found in this notice.</b></font></p>';
						echo $msg;
				}
		}
		
		
		if(isset($_REQUEST['paging']))
        {
                $page = $_REQUEST['paging'];
        }

        $listing_per_page = 10;

        if(isset($_REQUEST['paging']))
                $page = $_REQUEST['paging'];
        else
                $page = 1;

        //$sql = "SELECT * from student_info $where $s1 $and $s2";
        $sql = "SELECT * from notice where dept_id='$_REQUEST[id]' ";
        //echo $sql;
        $result=mysql_query($sql);
        $total = mysql_num_rows($result);
        //echo $total;
        $tpage = ceil($total/$listing_per_page);
        if($tpage==0) $spage=$tpage+1;
        else $spage = $tpage;
        $startfrom = ($page-1)*$listing_per_page;
        $link = "Students Found : $total<br>Page <b>$page</b> of <b>$spage</b>";

      if(isset($_REQUEST['name'])){
        $sql="select * from notice where dept_id LIKE '%$_REQUEST[id]%' order by id desc limit $startfrom, $listing_per_page";
		//echo $sql;
		
		}
	  else
       $sql="select * from notice where dept_id LIKE '%$_REQUEST[id]%' order by id desc limit $startfrom, $listing_per_page";
	   
        $result=mysql_query($sql);
		
		
?>
	<table width="950px" style="border: 2px solid gray;font-size:13px;margin-top:10px;" align="center" >
		<tr style="background:gray;color:white;height:30px;text-align:center;">
		<td style="width:300px;"><b>Topic</b></td>

		<td><b>Course Title</b></td>
		<td><b>Department</b></td>
		<td><b>Course Code</b></td>
		<td><b>Semester</b></td>
		<td><b>Year</b></td>
		<td><b>Status</b></td>
		<td><b>Action</b></td>
		</tr>
		<?php
		//Print the contents
		$fl=0;
		while($row = mysql_fetch_array($result))
		{   $fl=1;?>
			<tr style="text-align:center;height:25px;">
			<form action="notice.php" method="post">
				<td><input type="text" name="topic" value="<?php echo $row['topic']; ?>" style="border: 1px solid black;width:300px;border-radius:8px;"></td>
				<td><?php $c_s="select * from course where course_code='$row[course_code]' ";
						  $c_r=mysql_query($c_s);
						  $c_a=mysql_fetch_array($c_r); echo $c_a['course_title'];?></td>
				
				<td>
					<select name="dept_id" style="border-radius:10px;background:orange;color:white;">
						<?php
							$d_s="select * from dept where id='$row[dept_id]' ";
							$d_r=mysql_query($d_s);
							$d_a=mysql_fetch_array($d_r);
							?>
							
					<option value="<?php echo $d_a['id'];?>"><?php echo $d_a['title'];?></option>
					<?php $d_s="select * from dept order by title asc ";
							$d_r=mysql_query($d_s);
							while($d_a=mysql_fetch_array($d_r))
							{
								if($d_a['id']!=$row['dept_id'])
								{ ?>
								<option value="<?php echo $d_a['id'];?>"><?php echo $d_a['title'];?></option>
							<?php }} ?>
				</td>
				
				
				<td><select name="course_code" style="border-radius:8px;background:blue;color:white;">
					<option value="<?php echo $row['course_code']; ?>"><?php echo $row['course_code']; ?></option>
					<?php $c_s="select * from course order by id asc ";
						  $c_r=mysql_query($c_s);
						  while($c_a=mysql_fetch_array($c_r))
						  { if($c_a['course_code']!= $row['course_code'] ){ ?>
							<option value="<?php echo $c_a['course_code']; ?>"><?php echo $c_a['course_code']; ?></option>
						<?php }  } ?></select>
				</td>
				<td><select name="semester" style="border-radius:8px;background:brown;color:white;">
					<option value="<?php echo $row['semester']; ?>"><?php echo $row['semester']; ?></option>
					<?php if($row['semester']!="spring") { ?><option value="spring">spring</option> <?php } ?>
					<?php if($row['semester']!="summer") { ?><option value="summer">summer</option> <?php } ?>
					<?php if($row['semester']!="fall") { ?><option value="fall">fall</option> <?php } ?>
					</select>
				</td>
				<td><select name="year" style="border-radius:8px;background:green;color:white;">
						<option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>
						<?php if($row['year']!="2012"){ ?><option value="2012">2012</option><?php } ?>
						<?php if($row['year']!="2013"){ ?><option value="2013">2013</option><?php } ?>
						<?php if($row['year']!="2014"){ ?><option value="2014">2014</option><?php } ?>
						<?php if($row['year']!="2015"){ ?><option value="2015">2015</option><?php } ?>
						<?php if($row['year']!="2016"){ ?><option value="2016">2016</option><?php } ?>
						<?php if($row['year']!="2017"){ ?><option value="2017">2017</option><?php } ?>
						<?php if($row['year']!="2018"){ ?><option value="2018">2018</option><?php } ?>
						<?php if($row['year']!="2019"){ ?><option value="2019">2019</option><?php } ?>
						<?php if($row['year']!="2020"){ ?><option value="2020">2020</option><?php } ?>
						<?php if($row['year']!="2021"){ ?><option value="2021">2021</option><?php } ?>
						<?php if($row['year']!="2022"){ ?><option value="2022">2022</option><?php } ?>
						<?php if($row['year']!="2023"){ ?><option value="2023">2023</option><?php } ?>
						<?php if($row['year']!="2024"){ ?><option value="2024">2024</option><?php } ?>
						<?php if($row['year']!="2025"){ ?><option value="2025">2025</option><?php } ?>
						<?php if($row['year']!="2026"){ ?><option value="2026">2026</option><?php } ?>
						<?php if($row['year']!="2027"){ ?><option value="2027">2027</option><?php } ?>
						<?php if($row['year']!="2028"){ ?><option value="2028">2028</option><?php } ?>
						<?php if($row['year']!="2029"){ ?><option value="2029">2029</option><?php } ?>
						<?php if($row['year']!="2030"){ ?><option value="2030">2030</option><?php } ?>
						<?php if($row['year']!="2031"){ ?><option value="2031">2031</option><?php } ?>
						<?php if($row['year']!="2032"){ ?><option value="2032">2032</option><?php } ?>
						<?php if($row['year']!="2033"){ ?><option value="2033">2033</option><?php } ?>
						<?php if($row['year']!="2034"){ ?><option value="2034">2034</option><?php } ?>
						<?php if($row['year']!="2035"){ ?><option value="2035">2035</option><?php } ?>
						<?php if($row['year']!="2036"){ ?><option value="2036">2036</option><?php } ?>
						<?php if($row['year']!="2037"){ ?><option value="2037">2037</option><?php } ?>
						<?php if($row['year']!="2038"){ ?><option value="2038">2038</option><?php } ?>
						<?php if($row['year']!="2039"){ ?><option value="2039">2039</option><?php } ?>
						<?php if($row['year']!="2040"){ ?><option value="2040">2040</option><?php } ?>
						<?php if($row['year']!="2041"){ ?><option value="2041">2041</option><?php } ?>
						<?php if($row['year']!="2042"){ ?><option value="2042">2042</option><?php } ?>
						<?php if($row['year']!="2043"){ ?><option value="2043">2043</option><?php } ?>
						<?php if($row['year']!="2044"){ ?><option value="2044">2044</option><?php } ?>
						<?php if($row['year']!="2045"){ ?><option value="2045">2045</option><?php } ?>
						<?php if($row['year']!="2046"){ ?><option value="2046">2046</option><?php } ?>
						<?php if($row['year']!="2047"){ ?><option value="2047">2047</option><?php } ?>
						<?php if($row['year']!="2048"){ ?><option value="2048">2048</option><?php } ?>
						<?php if($row['year']!="2049"){ ?><option value="2049">2049</option><?php } ?>
						<?php if($row['year']!="2050"){ ?><option value="2050">2050</option><?php } ?>
					</select>
				</td>
				<td>
					<select name="status" style="border-radius:10px;background:red;color:white;">
						<option value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
						<?php if($row['status']!="active"){ ?> <option value="active">Active</option><?php } ?>
						<?php if($row['status']!="inactive"){ ?> <option value="inactive">Inactive</option><?php } ?>
					</select>
				</td>
				<td><input type="submit" name="edit" value="Update" style="border:2px solid blue;width:60px;border-radius:15px;">
					
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
					<input type="hidden" name="n_id" value="<?php echo $row['id']; ?>">
					<?php if(isset($_REQUEST['paging'])){ ?>
					<input type="hidden" name="paging" value="<?php echo $_REQUEST['paging'];?>">
					<?php } ?>
				</td>
				</form>
			</tr>
		<?php } ?>
		</table>
		<?php if($fl==0){?>
		<h2>"No notice founded"</h2>
		<?php }?>
	</br>
	
	<form action="notice.php?id=<?php echo $_REQUEST['id']; ?>" name="form1" method="post" style="margin-left:675px;">
                                        <font color="blue"><b>Go to Page :</b></font>
                                        <select name="paging" onchange=javascript:document.forms.form1.submit(); style="border-radius:15px;width:50px;background:gray;color:white;">
                                                <?php
                                                for($i=1;$i<=$spage;$i++)
                                                {
                                                        if($page==$i)
                                                                echo"<option value=$i selected>$i</option>";
                                                        else
                                                                echo"<option value=$i>$i</option>";
                                                }
                                                ?>
                                        </select>

                    </form>
					</br>
	
		
		
		</div>


<?php include("../include/footer.php"); ?>