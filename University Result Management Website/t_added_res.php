<?php include("include/t_header.php");
	  include("include/connection.php");?>

	  
	  
<div class="content">
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
        $sql = "SELECT * from result where t_id='$t_i' ";
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
        $sql="select * from result where t_id LIKE '%$t_i%' order by id desc limit $startfrom, $listing_per_page";
		//echo $sql;
		
		}
	  else
       $sql="select * from result where t_id LIKE '%$t_i%' order by id desc limit $startfrom, $listing_per_page";
	   
        $result=mysql_query($sql);
		
		
		
?>

 <h1 style="margin-top:200px;"> Recently Added Results </h1>
 
 
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
		$fl=0;
		while($row = mysql_fetch_array($result))
		{   $fl=1;?>
			<tr style="text-align:center;height:25px;">
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
				<td><a href="t_added_res_view.php?id=<?php echo $row['id'];?>&ids=<?php echo $a['s_id'];?>">view</a> </td>
			</tr>
			
		<?php
		} //while
		?>

		</table>
				<?php if($fl==0){?>
		<h2>"No result founded"</h2>
		<?php }?>
	</br>
		<form action="t_added_result.php" name="form1" method="post" style="margin-left:675px;">
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
	


	
</div> 


 
 
 
 
<?php include("include/footer.php"); ?>