<?php include("include/t_header.php"); include("include/connection.php");?>









<div class="content" align="center">
<?php

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
        $sql = "SELECT * from notice where t_id='$_REQUEST[id]' ";
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
        $sql="select * from notice where t_id LIKE '%$_REQUEST[id]%' order by id desc limit $startfrom, $listing_per_page";
		//echo $sql;
		
		}
	  else
       $sql="select * from notice  where t_id LIKE '%$_REQUEST[id]%' order by id desc limit $startfrom, $listing_per_page";
	   
        $result=mysql_query($sql);
		
		
		
?>
		<h1 style="margin-top:200px;border:1px solid black;width:400px;margin-left:305px;height:35px;background:#B0C4DE;border-radius:20px;"> Recent Notices </h1>
 <marquee direction="up" height="300" behavior="scroll" scrolldelay="300"  behavior="alternate" style="border:1px solid black;width:650px;" >
 <table width="650px" style="margin-top:10px;font-size:13px;border-radius:15px;" align="center" >
	
		<?php
		//Print the contents
		$n=0;
		$fl=0;
		while($row = mysql_fetch_array($result))
		{  $n++;
			$fl=1;		?>
			<tr style="background:#DCDCDC;height:80px;font-size:16px;color:blue;"><td style="width:2px;"></td>
			<td align="center"><?php echo'<font color="black">'; echo $n; echo ".";echo '</font>';?></td>
			<td style="text-align:left;width:600px;"><a href="t_view_notice.php?t_id=<?php echo $row['t_id'];?>& semester=<?php echo $row['semester'];?>& year=<?php echo $row['year'];?>& dept_id=<?php echo $row['dept_id'];?>& course_code=<?php echo $row['course_code'];?>">
				<?php echo $row['topic']; 
				echo '........... </br>  <b><font size="1" color="black">Semester: '; echo $row['semester']; echo "-"; echo $row['year']; echo "";
				echo ",  Course Code: ("; echo $row['course_code'];
				$sql="select * from teachers where id='$row[t_id]' ";
				$res=mysql_query($sql);
				$a=mysql_fetch_array($res);
				echo "), Posted By: "; echo $a['name']; echo "</br>"; echo $row['post_time']; echo "</font></b>"; 
								
				?>
			</a></td></tr>
			
		<?php
		} //while
		?>
		<?php if($fl==0){?>
		<tr style="background:#DCDCDC;height:80px;font-size:16px;color:blue;"><td style="width:2px;"></td><td align="center">0.</td><td align="center"><h2>"No notice founded"</h2></td><tr>
		<?php }?>
		</table>
</marquee>
	</br>
		<form action="t_added_notice.php?id=<?php echo $_REQUEST['id']; ?>" name="form1" method="post" style="margin-left:675px;">
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

<?php include("include/footer.php"); ?>