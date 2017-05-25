<?php include("../include/ad_log_header.php"); ?>


	<div class="content">
	<?php 
				$sql="select * from dept where id='$_REQUEST[id]' ";
				$res=mysql_query($sql);
				$arr=mysql_fetch_array($res);
			?>
			<p style="color:blue;margin-top:190px;margin-right:500px;">Dept. Status:
			<a href="ad_teacher.php"><button style="border-radius:20px;width:80px;background:purple;color:white;"> <?php echo $arr['status']; ?></button></a>
			<a href="dept_teachers.php?id=<?php echo $_REQUEST['id'];?>"><button style="border-radius:20px;width:80px;background:black;color:white;"> <?php echo $arr['title']; ?></button></a>
			<button style="border-radius:20px;width:150px;background:indigo;color:white;"> Add Teacher</button>
		</p>
	<p style="margin-top:10px;text-align:center;margin-left:800px;margin-bottom:10px;"><a href="dept_teachers.php?id=<?php echo $_REQUEST['id'];?>"> << Back </a></p>
	<h1 style="text-align:center;margin-bottom:10px;">Teacher Details </h1>
	<?php
		if(isset($_REQUEST['add']))
		{
			$pass=rand(11111,99999);
			if(trim($_REQUEST['name'])=="" || trim($_REQUEST['username'])=="" || trim($_REQUEST['email'])=="" || trim($_REQUEST['contact'])=="")
			{
				$msg='<p style="text-align:center;"><font color="red"><b>Fill up perfectly.</b></font></p>';
					echo $msg;
			}
			else
			{
				$t_s="select * from teachers order by id asc ";
				$t_r=mysql_query($t_s);
				$fl=0;
				while($t_a=mysql_fetch_array($t_r))
				{
					if($t_a['username']==trim($_REQUEST['username']) || $t_a['email']==trim($_REQUEST['email']))
						$fl=1;
				}
				if($fl==0)
				{
				
					function photo_upload($file,$i,$max_foto_size,$photo_extention,$folder_name,$path='')
        {


                if($file['tmp_name'][$i]=="")
                {
				$ran="bigLoader.gif";
				return $ran;
                }
                if($file['tmp_name'][$i]!="")
                {
                        $p=$file['name'][$i];
                        $pos=strrpos($p,".");
                        $ph=strtolower(substr($p,$pos+1,strlen($p)-$pos));
                        $im_size =  round($file['size'][$i]/1024,2);

                        if($im_size > $max_foto_size)
                           {
                                echo "Image is Too Large";
                                return;
                           }
                        $photo_extention = explode(",",$photo_extention);
                        if(!in_array($ph,$photo_extention ))
                           {
                                echo "Upload Correct Image";

                                return;
                           }
                }
                        $ran=date(time());
                        $c=$ran.rand(1,10000);
                        $ran.=$c.".".$ph;



                        if(isset($file['tmp_name'][$i]) && is_uploaded_file($file['tmp_name'][$i]))
                        {
                        $ff = $path."../images/".$folder_name."/".$ran;
                        move_uploaded_file($file['tmp_name'][$i], $ff );
                        chmod($ff, 0777);
                        }
               return  $ran;
        }
				
					$file=$_FILES['photo'];
					$image_name=photo_upload($file,0,100000,"jpg,gif,png",'teachers',$path='');
					$sql="INSERT INTO teachers (name, username, email, password, contact, picture, dept_id, status)
					VALUES
					(trim('$_POST[name]'), trim('$_POST[username]'), trim('$_POST[email]'), '$pass', trim('$_POST[contact]'), '$image_name', '$_REQUEST[id]', '$_POST[status]')";
					if (!mysql_query($sql,$con))
					{
						die('Error: ' . mysql_error());
					}
					$arr='<font color="green" style="tet-align:center"><b>Teacher successfully added.</b></font>';
					echo $arr;
				}
				else
				{
					$msg='<p style="text-align:center;"><font color="red"><b>Username or email alreaady in use.</b></font></p>';
					echo $msg;
				}
			}
			
		}
	?>
	<table align="center">
		<tr style="height:40px;">
		<form action="add_teacher.php" method="post" ENCTYPE="MULTIPART/FORM-DATA">
			<td style="text-align:left;">Name</td>
			<td width="40"></td>
			<td style="text-align:left;">: <input type="text" autocomplete="off"	name="name" style="border-radius:15px;"></td>
		</tr>
		<tr style="height:40px;">
			<td style="text-align:left;">Email</td>
			<td width="40"></td>
			<td style="text-align:left;">: <input type="text" autocomplete="off"	name="email" style="border-radius:15px;"></td>
		</tr>
		<tr style="height:40px;">
			<td style="text-align:left;">Username</td>
			<td width="40"></td>
			<td style="text-align:left;">: <input type="text" autocomplete="off"	name="username" style="border-radius:15px;"></td>
		</tr>
		<tr style="height:40px;">
			<td style="text-align:left;">Contact No</td>
			<td width="40"></td>
			<td style="text-align:left;">: <input type="text" autocomplete="off"	name="contact" style="border-radius:15px;"></td>
		</tr>
		<tr style="height:40px;">
			<td style="text-align:left;">Status</td>
			<td width="40"></td>
			<td style="text-align:left;">: <select name="status" style="border-radius:15px;width:90px;">
					<option value="active">Active</option>
					<option value="inactive">Inactive</option>
				</select>
			</td>
		</tr>
		<tr>
			<td style="text-align:left;">Upload Image</td>
			<td width="40"></td>
			<td style="text-align:left;">: 
				<input type="file" name="photo[0]">
			</td>
		</tr>
		<tr>
			<td></td><td></td>
			<td style="text-align:right;">
				<input type="submit" name="add" value="Add" style="background:blue;color:white;border-radius:15px;width:50px;">
				<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
			</td>
		</tr>
		</form>
	</table>
	<h2 style="margin-right:700px;">Currently added teacher:</h2>
	<?php
	if(isset($_REQUEST['edit']))
		{

					$sql="UPDATE teachers set
							name=trim('$_REQUEST[name]'),
							status='$_REQUEST[status]',
							dept_id='$_REQUEST[dept_id]'
							where id='$_REQUEST[t_id]' ";
					mysql_query($sql);
					$msg='<p style="text-align:center;"><font color="green"><b>Information successfully updated.</b></font></p>';
						echo $msg;
				
		}
		?>
	
	 <table width="950px" style="margin-top:10px;border: 2px solid gray;font-size:13px;" align="center" >
		<tr style="background:gray;color:white;height:30px;text-align:center;">
		<td><b>Name</b></td>
		<td><b>Email</b></td>
		<td><b>Contact</b></td>
		<td><b>Login Info</b></td>
		<td><b>Dept.</b></td>
		<td><b>Status</b></td>
		<td><b>Action</b></td>
		</tr>
		<?php $fl=0;
		$se=0;
		$sql="select * from teachers where dept_id='$_REQUEST[id]' order by id desc ";
		$result=mysql_query($sql);
		
		while($row = mysql_fetch_array($result))
		{   if($se==1) break; $fl=1;$se++;?>
			<tr style="text-align:center;">
			<form action="add_teacher.php" method="post">
				<td style="width:150px;"><img src="../images/teachers/<?php echo $row['picture']; ?>" style="border-radius:8px;height:60px;width:40px;" alt="<?php echo $row['name'];?>" ></br><input type="text" name="name" style="border-radius:8px;border:2px solid purple;" value="<?php echo $row['name'];?>"></td>
				<td style="width:180px;"><?php echo $row['email'];?></td>
				<td style="width:100px;"><?php echo $row['contact'];?></td>
				<td style="width:100px;"><font color="blue"><?php echo $row['username'];?></font></br><font color="red"><?php echo $row['password'];?></font></td>
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
				<td style="width:80px;"><input type="submit" name="edit" value="update" style="border:2px solid blue;width:60px;border-radius:15px;">
					<input type="hidden" name="t_id" value="<?php echo $row['id'];?>">
					<input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
					
				</td>
				</form>
			</tr>
		<?php } ?>
		</table>
		<?php if($fl==0){?>
		<h2>"No teacher founded"</h2>
		<?php }?>
	</br>
		
		
	</div>
<?php include("../include/footer.php"); ?>