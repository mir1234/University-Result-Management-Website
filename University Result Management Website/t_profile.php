<?php include("include/t_header.php"); ?>
<div class="content">

<h1 style="margin-top:240px;text-align:center;"> Edit your profile</h1>
<?php
if(isset($_REQUEST['update']))
						{
							if(trim($_POST['name'])!="" && trim($_POST['username'])!="" && trim($_POST['password'])!="" && trim($_POST['email'])!="" && trim($_POST['contact'])!="")
							{
								$fl=0;
								$s="select * from teachers order by id asc ";
								$r=mysql_query($s);
								while($a=mysql_fetch_array($r))
								{
									if($a['username']==trim($_POST['username']) && $a['id']!=$t_i)
										$fl=1;
								}
								if($fl==0)
								{
									$sql="update teachers set
									name='$_REQUEST[name]',
									email='$_REQUEST[email]',
									contact='$_REQUEST[contact]',
									username='$_REQUEST[username]',
									password='$_REQUEST[password]'
									where id='$t_i'";
									mysql_query($sql);
									$arr='<font color="blue"><b> Profile updated. </b></font>';
									echo $arr;
								}
								else
								{
									$arr='<font color="red"><b>This username already in use.</b></font>';
									echo $arr;
								}
							}
							else
							{
								$arr='<font color="red"><b>Fill up correctly.</b></font>';
								echo $arr;
							}
						}

	$t_sql="select * from teachers where id='$t_i' ";			
	$t_re=mysql_query($t_sql);
	$t_arr=mysql_fetch_array($t_re);				
?>							
<form action="t_profile.php" method="post">
<table align="center" style="margin-bottom:140px;">
	<tr>
		<td align="left">Name: </td><td><input type="text" style="border-radius:20px;" name="name" value="<?php echo $t_arr['name'];?>"></td>
	</tr>
	<tr height="6"></tr>
	<tr>
		<td align="left">Username: </td><td><input type="text" style="border-radius:20px;" name="username" value="<?php echo $t_arr['username'];?>"></td>
	</tr><tr height="6"></tr>
	<tr>
		<td align="left">Password: </td><td><input type="text" style="border-radius:20px;" name="password" value="<?php echo $t_arr['password'];?>"></td>
	</tr><tr height="6"></tr>
	<tr>
		<td align="left">Email: </td><td><input type="text" style="border-radius:20px;" name="email" value="<?php echo $t_arr['email'];?>"></td>
	</tr><tr height="6"></tr>
	<tr>
		<td align="left">Contact: </td><td><input type="text" style="border-radius:20px;" name="contact" value="<?php echo $t_arr['contact'];?>"></td>
	</tr><tr height="6"></tr>
	<tr>
		<td></td><td><input type="submit" name="update" value="Update" style="border-radius:20px;background:brown;margin-left:90px;color:white;width:60px;"></td>
	</tr>
</table>
</form>
</div>

<?php include("include/footer.php"); ?>