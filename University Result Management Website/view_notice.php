<?php include("include/header.php"); include("include/connection.php");?>









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
        $sql = "SELECT * from result where course_id='$_REQUEST[course_code]' AND dept_id='$_REQUEST[dept_id]' AND t_id='$_REQUEST[t_id]' AND semester='$_REQUEST[semester]' AND year='$_REQUEST[year]' AND status='active' ";
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
               $sql="select * from result where course_id='$_REQUEST[course_code]' AND dept_id='$_REQUEST[dept_id]' AND t_id='$_REQUEST[t_id]' AND semester='$_REQUEST[semester]' AND year='$_REQUEST[year]' AND status='active' order by id desc limit $startfrom, $listing_per_page";

		
		}
	  else
       $sql="select * from result where course_id='$_REQUEST[course_code]' AND dept_id='$_REQUEST[dept_id]' AND t_id='$_REQUEST[t_id]' AND semester='$_REQUEST[semester]' AND year='$_REQUEST[year]' AND status='active'  order by id desc limit $startfrom, $listing_per_page";
	   
        $result=mysql_query($sql);
		
		
		
?>

 <h1 style="margin-top:200px;"> Notice Results </h1>
 
 
 <table width="800px" style="border: 2px solid gray;" align="center" >
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
		{   ?>
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
				<td><a href="not_res_view.php?id=<?php echo $row['id'];?>&ids=<?php echo $_GET['id'];?>">view</a> </td>
			</tr>
			
		<?php
		} //while
		?>
		</table>
	</br>
		<form action="view_notice.php?t_id=<?php echo $_REQUEST['t_id'];?>& semester=<?php echo $_REQUEST['semester'];?>& year=<?php echo $_REQUEST['year'];?>& dept_id=<?php echo $_REQUEST['dept_id'];?>& course_code=<?php echo $_REQUEST['course_code'];?>" name="form1" method="post" style="margin-left:675px;">
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