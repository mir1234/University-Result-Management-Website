<?php include("../include/ad_log_header.php"); ?>
<div class="content">
<h1 style="margin-top:160px;text-align:center;">Student Details: </h1>


<?php 

	if(isset($_REQUEST['edit']))
	{
			function photo_upload($file,$i,$max_foto_size,$photo_extention,$folder_name,$path='')
        {


                if($file['tmp_name'][$i]=="")
                {
						$t_sql="select * from students where s_id='$_REQUEST[s_id]' ";			
						$t_re=mysql_query($t_sql);
						$t_arr=mysql_fetch_array($t_re);
						$ran=$t_arr['picture'];
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
		if(trim($_REQUEST['name'])=="" || trim($_REQUEST['f_name'])=="" || trim($_REQUEST['m_name'])=="" || trim($_REQUEST['email'])=="" || trim($_REQUEST['contact'])=="" || trim($_REQUEST['address'])=="")  
		{
			$arr='<p style="text-align:center;"><font color="red" ><b> Fill up perfectly. </b></font></p>';				
			echo $arr;
		}
		else
		{	
		
			$file=$_FILES['photo'];
			$image_name=photo_upload($file,0,100000,"jpg,gif,png",'students',$path='');
							
			$sql="UPDATE students set
						name=trim('$_REQUEST[name]'),
						f_name=trim('$_REQUEST[f_name]'),
						m_name=trim('$_REQUEST[m_name]'),
						email=trim('$_REQUEST[email]'),
						contact=trim('$_REQUEST[contact]'),
						address=trim('$_REQUEST[address]'),
						picture='$image_name',
						blood_group='$_REQUEST[blood_group]',
						status='$_REQUEST[status]'
						where s_id='$_REQUEST[s_id]' ";
				mysql_query($sql);
				$msg='<p style="text-align:center;"><font color="green"><b>Information successfully changed.</b></font></p>';
					echo $msg;
		}
	
	}


	$s_sql="select * from students where s_id='$_REQUEST[s_id]' ";
	$s_res=mysql_query($s_sql);
	$s_a=mysql_fetch_array($s_res);

?>
<form action="stu_full_det.php" ENCTYPE="MULTIPART/FORM-DATA" method="post" >
<table align="center">
	<tr>
		<td colspan="2"> 
			<img src="../images/students/<?php echo $s_a['picture'];?>" alt="student_picture" height="120" width="100" style="border-radius:20px;border:2px solid black;">
			<input type="file" name="photo[0]">
		</td>
	</tr>
	<tr height="20"></tr>
	<tr>
		<td style="text-align:left;">
			Name:
		</td>
		<td style="text-align:right;">
			<input type="text" name="name" value="<?php echo $s_a['name'];?>" style="border-radius:20px;">
		</td>
	</tr>
	<tr>
		<td style="text-align:left;">
			Father Name:
		</td>
		<td style="text-align:right;">
			<input type="text" name="f_name" value="<?php echo $s_a['f_name'];?>" style="border-radius:20px;">
		</td>
	</tr>
	<tr>
		<td style="text-align:left;">
			Mother Name:
		</td>
		<td style="text-align:right;">
			<input type="text" name="m_name" value="<?php echo $s_a['m_name'];?>" style="border-radius:20px;">
		</td>
	</tr>
	<tr>
		<td style="text-align:left;">
			Email:
		</td>
		<td style="text-align:right;">
			<input type="text" name="email" value="<?php echo $s_a['email'];?>" style="border-radius:20px;">
		</td>
	</tr>
	<tr>
		<td style="text-align:left;">
			Contact:
		</td>
		<td style="text-align:right;">
			<input type="text" name="contact" value="<?php echo $s_a['contact'];?>" style="border-radius:20px;">
		</td>
	</tr>
	<tr>
		<td style="text-align:left;">
			*Student ID:
		</td>
		<td style="text-align:right;">
			<input type="text" name="s_id" value="<?php echo $s_a['s_id'];?>" style="border-radius:20px;background:purple;color:white;text-align:center;">
		</td>
	</tr>
	<tr>
		<td style="text-align:left;">
			Address:
		</td>
		<td style="text-align:right;">
			<input type="text" name="address" value="<?php echo $s_a['address'];?>" style="border-radius:20px;">
		</td>
	</tr>
	<tr>
		<td style="text-align:left;">
			*Session:
		</td>
		<td style="text-align:right;">
			<input type="text" name="session" value="<?php echo $s_a['admission_semester'];echo "-"; echo $s_a['admission_year']; ?>" style="border-radius:20px;background:purple;color:white;text-align:center;">
		</td>
	</tr>
	<tr>
		<td style="text-align:left;">
			*Department:
		</td>
		<td style="text-align:right;">
			<?php $d_s="select * from dept where id='$s_a[dept_id]' ";
					$d_r=mysql_query($d_s);
					$d_a=mysql_fetch_array($d_r);
			?>
			<input type="text" name="dept" value="<?php echo $d_a['title'];?>" style="border-radius:20px;background:purple;color:white;text-align:center;">
		</td>
	</tr>
	<tr>
		<td style="text-align:left;">
			Blood Group:
		</td>
		<td style="text-align:center;">
		<select name="blood_group" style="border-radius:20px;width:100px;">
			<option value="<?php echo $s_a['blood_group']; ?>"> <?php echo $s_a['blood_group']; ?> </option>
			
			<?php if($s_a['blood_group']!="A (+ve)"){ ?> <option value="A (+ve)">A (+ve)</option><?php } ?>
			<?php if($s_a['blood_group']!="A (-ve)"){ ?> <option value="A (-ve)">A (-ve)</option><?php } ?>
			<?php if($s_a['blood_group']!="B (+ve)"){ ?> <option value="B (+ve)">B (+ve)</option><?php } ?>
			<?php if($s_a['blood_group']!="B (-ve)"){ ?> <option value="B (-ve)">B (-ve)</option><?php } ?>
			<?php if($s_a['blood_group']!="O (+ve)"){ ?> <option value="O (+ve)">O (+ve)</option><?php } ?>
			<?php if($s_a['blood_group']!="O (-ve)"){ ?> <option value="O (-ve)">O (-ve)</option><?php } ?>
			<?php if($s_a['blood_group']!="AB (+ve)"){ ?> <option value="AB (+ve)">AB (+ve)</option><?php } ?>
			<?php if($s_a['blood_group']!="AB (-ve)"){ ?> <option value="AB (-ve)">AB (-ve)</option><?php } ?>
			<?php if($s_a['blood_group']!=""){ ?> <option value=""></option><?php } ?>
		</select>
		</td>
	</tr>
	<tr>
		<td style="text-align:left;">
			Status:
		</td>
		<td style="text-align:center;">
			<select name="status" style="border-radius:20px;width:100px;">
			<option value="<?php echo $s_a['status']; ?>"> <?php echo $s_a['status']; ?> </option>
			<?php if($s_a['status']!="active"){ ?> <option value="active">Active</option><?php } ?>
			<?php if($s_a['status']!="inactive"){ ?> <option value="inactive">Inactive</option><?php } ?>
			</select>
		</td>
	</tr>
	<tr>
		<td></td>
		<td style="text-align:right;">
			<input type="hidden" name="s_id" value="<?php echo $s_a['s_id']; ?>">
			<input type="submit" name="edit" value="Edit" style="width:50px;border-radius:20px;color:white;background:blue;">
		</td>
	</tr>
</table>
</form>
<a href="search.php?s_id=<?php echo $_REQUEST['s_id']?>" style="float:left;margin-left:60px;"> << Back</a>
</div>
<?php include("../include/footer.php"); ?>