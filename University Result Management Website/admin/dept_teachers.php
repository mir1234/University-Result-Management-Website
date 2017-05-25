<?php include("../include/ad_log_header.php"); ?>


	<div class="content">
	
			<?php 
				$sql="select * from dept where id='$_REQUEST[id]' ";
				$res=mysql_query($sql);
				$arr=mysql_fetch_array($res);
			?>
			<p style="color:blue;margin-top:190px;margin-right:700px;">Dept. Status:
			<a href="ad_teacher.php"><button style="border-radius:20px;width:80px;background:purple;color:white;"> <?php echo $arr['status']; ?></button></a>
			<button style="border-radius:20px;width:80px;background:black;color:white;"> <?php echo $arr['title']; ?></button>
		</p>
		<p style="margin-left:700px;font-size:16px;"><a href="add_teacher.php?id=<?php echo $_REQUEST['id']; ?>">Add Teacher >></a></p>
	
	</br>
	<h1 style="margin:0px;"> Teachers List </h1>
	<?php
		if(isset($_REQUEST['edit']))
		{
				$sql="UPDATE teachers set
						status='$_REQUEST[status]',
						dept_id='$_REQUEST[dept_id]'
						where id='$_REQUEST[t_id]' ";
				mysql_query($sql);
				$msg='<p style="text-align:center;"><font color="green"><b>Information successfully updated.</b></font></p>';
					echo $msg;
		}
	
	
		

 if(isset($_REQUEST['paging']))
        {
                $page = $_REQUEST['paging'];
        }

        $listing_per_page = 5;

        if(isset($_REQUEST['paging']))
                $page = $_REQUEST['paging'];
        else
                $page = 1;

        //$sql = "SELECT * from student_info $where $s1 $and $s2";
        $sql = "SELECT * from teachers where dept_id='$_REQUEST[id]' ";
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
        $sql="select * from teachers where dept_id LIKE '%$_REQUEST[id]%' order by id desc limit $startfrom, $listing_per_page";
		//echo $sql;
		
		}
	  else
       $sql="select * from teachers where dept_id LIKE '%$_REQUEST[id]%' order by id desc limit $startfrom, $listing_per_page";
	   
        $result=mysql_query($sql);
		
		
		
?>
	
	 <table width="950px" style="margin-top:10px;border: 2px solid gray;font-size:13px;" align="center" >
		<tr style="background:gray;color:white;height:30px;text-align:center;">
		<td><b>S.N</b></td>
		<td><b>Name</b></td>
		<td><b>Email</b></td>
		<td><b>Contact</b></td>
		<td><b>Login Info</b></td>
		<td><b>Dept.</b></td>
		<td><b>Status</b></td>
		<td><b>Action</b></td>
		</tr>
		<?php
		//Print the contents
		$fl=0;
		$se=0;
		while($row = mysql_fetch_array($result))
		{   $fl=1;$se++;?>
			<tr style="text-align:center;">
				<td style="width:30px;"><?php echo $se;?></td>
				<td style="width:150px;"><img src="../images/teachers/<?php echo $row['picture']; ?>" style="border-radius:8px;height:60px;width:40px;" alt="<?php echo $row['name'];?>" ></br><?php echo $row['name'];?></td>
				<td style="width:180px;"><?php echo $row['email'];?></td>
				<td style="width:100px;"><?php echo $row['contact'];?></td>
				<td style="width:100px;"><font color="blue"><?php echo $row['username'];?></font></br><font color="red"><?php echo $row['password'];?></font></td>
				<form action="dept_teachers.php" method="post">
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
				<td style="width:80px;"><input type="submit" name="edit" value="Update" style="border:2px solid blue;width:60px;border-radius:15px;">
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
					<input type="hidden" name="t_id" value="<?php echo $row['id']; ?>">
					<?php if(isset($_REQUEST['paging'])){ ?>
					<input type="hidden" name="paging" value="<?php echo $_REQUEST['paging'];?>">
					<?php } ?>
				</td>
				</form>
			</tr>
		<?php } ?>
		</table>
		<?php if($fl==0){?>
		<h2>"No teacher founded"</h2>
		<?php }?>
	</br>
	
	<form action="dept_teachers.php?id=<?php echo $_REQUEST['id']; ?>" name="form1" method="post" style="margin-left:675px;">
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