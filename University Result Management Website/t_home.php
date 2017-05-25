<?php include("include/t_header.php"); ?>

<div class="content" style="margin-top:230px;text-align:left;">
	<?php
	function photo_upload($file,$i,$max_foto_size,$photo_extention,$folder_name,$path='')
        {


                if($file['tmp_name'][$i]=="")
                {
						$t_sql="select * from teachers where id='$_REQUEST[id]' ";			
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
                        $ff = $path."images/".$folder_name."/".$ran;
                        move_uploaded_file($file['tmp_name'][$i], $ff );
                        chmod($ff, 0777);
                        }
               return  $ran;
        }
	if(isset($_REQUEST['Update'])=="Update")
						{
								$file=$_FILES['photo'];
								$image_name=photo_upload($file,0,100000,"jpg,gif,png",'teachers',$path='');
							$sql="update teachers set
								picture='$image_name'
                                where id='$t_i'";
								mysql_query($sql);
							
						}
						$t_sql="select * from teachers where id='$t_i' ";			
	$t_re=mysql_query($t_sql);
	$t_arr=mysql_fetch_array($t_re);
	?>
	<h1 style="margin-left:210px;">Welcome,</h1>
	
	<h2 style="margin-bottom:70px;"><a href="t_picture.php"><img src="images/teachers/<?php echo $t_arr['picture']; ?>" alt="Teacher_Picture" style="border-radius:30px;height:180px;width:150px;border: 2px solid black;margin-left:320px;"></a>
	<?php
		echo $t_arr['name'];
		
	?>
	</h2>
	<div align="center">
	<h3 style="margin:1px;">Telihaor, Sheikhghat, Sylhet-3100, Bangladesh.</h3>
	<h4 style="margin:1px;">Telephone: 0821 710221-2 &nbsp&nbsp&nbsp&nbsp Fax: 0821 710223  &nbsp&nbsp&nbsp&nbsp Mobile: 01755566994</h4>
	<p>Email: <a href="http://www.neubedu@gmail.com">neubedu@gmail.com</a>  &nbsp&nbsp&nbsp&nbsp Official-site: <a href="http://www.neub.edu.bd">www.neub.edu.bd</a></p></br>
	</div>
</div>


<?php include("include/footer.php"); ?>