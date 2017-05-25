<?php include("../include/ad_log_header.php"); ?>


	<div class="content">
	
		<h1 style="margin-top:180px;margin-left:400px;">Add Course</h1>
		<?php
		if(isset($_REQUEST['add']))
		{
			if(trim($_POST['course_title'])!="" && trim($_POST['course_code'])!="" && $_POST['credit']!="")
			{
				$fl=0;
				$sql="select * from course order by id asc ";
				$res=mysql_query($sql);
				while($arr=mysql_fetch_array($res))
				{
					if($arr['course_code']==trim($_POST['course_code']) || $arr['course_title']==trim($_POST['course_title']))
						$fl=1;
				}
				
				if($fl==0)
				{
					$sql="INSERT INTO course (course_title, course_code, credit, dept_id, status)
					VALUES
					(trim('$_POST[course_title]'), trim('$_POST[course_code]'),'$_POST[credit]','$_REQUEST[id]','$_POST[status]')";
					if (!mysql_query($sql,$con))
					{
						die('Error: ' . mysql_error());
					}
					$arr='<font color="green" style="margin-left:400px;"><b>Course successfully added.</b></font>';
					echo $arr;
				}
				if($fl==1)
				{
					$arr='<font color="red" style="margin-left:400px;"><b>This course already added.</b></font>';
					echo $arr;
				}
			}
			else
			{
				$arr='<font color="red" style="margin-left:400px;"><b>Fill up perfectly.</b></font>';
					echo $arr;
			}
		}
		?>
		<form action="course.php" method="post" style="margin-top:5px;">
			<font style="margin-left:400px;">
			Title: <input type="text" name="course_title" style="border-radius:20px;width:120px;" placeholder="       Insert here" autocomplete="off"> 
			Code: <input type="text" name="course_code" style="border-radius:20px;width:90px;" placeholder="    Dept-XXX" autocomplete="off"> 
			Credit: <select name="credit" style="border-radius:20px;width:70px;">
						<option value="">-select-</option>
						<option value="1">1</option>
						<option value="1.5">1.5</option>
						<option value="2">2</option>
						<option value="2.5">2.5</option>
						<option value="3">3</option>
						<option value="3.5">3.5</option>
					</select>
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
			Status: 
			<select name="status"   style="border-radius:20px;width:70px;">
				<option value="active">Active</option>
				<option value="inactive">Inactive</option>
			</select>
			<input type="submit" name="add" value="Add" style="width:60px;border-radius:20px;background:blue;color:white;border:2px solid gray;"></font>
		</form>
	
		<h1 style="margin-top:20px;margin-bottom:10px;">Recently added courses</h1>
		
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
		
			$sql="UPDATE course set
							course_title=trim('$_REQUEST[course_title]'),
							credit='$_REQUEST[credit]',
							status='$_REQUEST[status]',
							dept_id='$_REQUEST[dept_id]'
							where id='$_REQUEST[c_id]' ";
					mysql_query($sql);
					$msg='<p style="text-align:center;"><font color="green"><b>Course successfully updated.</b></font></p>';
						echo $msg;
		}
		if(isset($_REQUEST['delete']))
		{
					$sql="delete from course where id='$_REQUEST[c_id]' ";
					mysql_query($sql);
					$msg='<p style="text-align:center;"><font color="purple"><b>Course successfully deleted.</b></font></p>';
						echo $msg;
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
        $sql = "SELECT * from course where dept_id='$_REQUEST[id]' ";
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
        $sql="select * from course where dept_id LIKE '%$_REQUEST[id]%' order by id desc limit $startfrom, $listing_per_page";
		//echo $sql;
		
		}
	  else
       $sql="select * from course where dept_id LIKE '%$_REQUEST[id]%' order by id desc limit $startfrom, $listing_per_page";
	   
        $result=mysql_query($sql);
		
		
?>

<table width="750px" style="border: 2px solid gray;font-size:13px;margin-top:10px;" align="center" >
		<tr style="background:gray;color:white;height:30px;text-align:center;">
			<td style="width:250px;"><b>Course Title</b></td>
			<td><b>Course Code</b></td>
			<td><b>Course Credit</b></td>
			<td><b>Department</b></td>
			<td><b>Status</b></td>
			<td><b>Action</b></td>
		</tr>
		<?php
		//Print the contents
		$fl=0;
		while($row = mysql_fetch_array($result))
		{   $fl=1;?>
		<tr><form action="course.php" method="post">
			<td><input type="text" name="course_title" value="<?php echo $row['course_title']; ?>" style="width:250px;border-radius:8px;"></td>
			<td><?php echo $row['course_code']; ?></td>
			<td><select name="credit" style="border-radius:10px;background:red;color:white;">
				<option value="<?php echo $row['credit'];?>"><?php echo $row['credit'];?></option>
						<?php if($row['credit']!="1"){ ?><option value="1">1</option><?php } ?>
						<?php if($row['credit']!="1.5"){ ?><option value="1.5">1.5</option><?php } ?>
						<?php if($row['credit']!="2"){ ?><option value="2">2</option><?php } ?>
						<?php if($row['credit']!="2.5"){ ?><option value="2.5">2.5</option><?php } ?>
						<?php if($row['credit']!="3"){ ?><option value="3">3</option><?php } ?>
						<?php if($row['credit']!="3.5"){ ?><option value="3.5">3.5</option><?php } ?>
				</select>
			</td>
			<td style="width:50px;">
					<select name="dept_id" style="border-radius:10px;background:blue;color:white;">
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
				<td style="width:60px;">
					<select name="status" style="border-radius:10px;background:green;color:white;">
						<option value="<?php echo $row['status'];?>"><?php echo $row['status'];?></option>
						<?php if($row['status']!="active"){ ?> <option value="active">Active</option><?php } ?>
						<?php if($row['status']!="inactive"){ ?> <option value="inactive">Inactive</option><?php } ?>
					</select>
				</td>
				<td><input type="submit" name="edit" value="Update" style="border:2px solid blue;width:60px;border-radius:15px;">
					<input type="submit" name="delete" value="Delete" style="color:white;border:2px solid blue;width:60px;border-radius:15px;background:gray;">
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
					<input type="hidden" name="c_id" value="<?php echo $row['id']; ?>">
					<?php if(isset($_REQUEST['paging'])){ ?>
					<input type="hidden" name="paging" value="<?php echo $_REQUEST['paging'];?>">
					<?php } ?>
				</td>	
					</form>
		</tr>
		<?php } ?>
		
		</table>
		<?php if($fl==0){?>
		<h2>"No course founded"</h2>
		<?php }?>
	</br>
	
	<form action="course.php?id=<?php echo $_REQUEST['id']; ?>" name="form1" method="post" style="margin-left:675px;">
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