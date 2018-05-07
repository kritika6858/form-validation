<?php
include('wtop.php');
?>
<div style="height: 10px;font-size: 20px;font-weight: bolder;color: white;"><p align="center">Registration Form</p></div>
<form name="stunfodis" method="post" id="marksdownform">
<select name="rollmarks">
		<?php
		$qry="SELECT distinct r_no FROM marks";
$fetch=mysqli_query($conn,$qry);
			while($data=mysqli_fetch_array($fetch)){
				echo "<option>". $data['r_no']."</option>";
			}
?>
</select>
<input type="submit" name="subrollmarks" style="background-color:rgba(84,153,199,0.4);height: 30px;float: none;width: 140px;color: white;">
</form>
<?php
if(isset($_POST['subrollmarks'])){//here substudis is name of submit button
$rno=$_POST['rollmarks'];
if ($rno!=='') {
$qry="select * from student,marks where student.r_no=marks.r_no AND student.r_no=$rno";
$tablerowlabel=array("Roll No.","Name","Section","Sestional No.","Subjects->","Max(MM)","Max(MO)");
$tablerowname=array("r_no","name","sec","ses_no","sub_name","mm","mo");
$fetch=mysqli_query($conn,$qry);
echo '<div id=marksdownformdiv><table border=1><tr>';
				for ($i=0;$i<7;$i++) { 
				echo "<td>".$tablerowlabel[$i]."</td>";
				}
			while($data=mysqli_fetch_array($fetch)){
				echo "<tr>";
				for ($i=0;$i<7;$i++) { 
				if ($data[$tablerowname[0]]=$rno) {
				echo "<td>".$data[$tablerowname[$i]]."</td>";
				}
				}
				}
				echo "</tr></table></div>";
				}
else {
	echo '<script> alert("Sorry, Try Again !")</script>';
}
}
?>
<?php
include('wbottom.php');
?>
