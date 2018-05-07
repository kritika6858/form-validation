<?php
include('wtop.php');
?>
<div style="height: 10px;font-size: 20px;font-weight: bolder;color: white;"><p align="center">Enter Marks</p></div>
<form name="head" method=post id="marksupform">
Branch Name:
<select name="subbran">
<?php
	$bname = array("Computer", "Mechanical", "Civil", "Electrical", "Electronics", "Automobile");
	for ($z='0'; $z < '6'; $z++) {
    	echo '<option>'.$bname[$z].' '.'Engineering'.'</option>';
	}
?>
</select>
Semester:
<select name="subsem">
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option selected>4</option>
		<option>5</option>
		<option>6</option>
</select>
Subject:
<select name="subname">
		<?php
		$qry="SELECT distinct sub_name FROM subject ";
$fetch=mysqli_query($conn,$qry);
			while($data=mysqli_fetch_array($fetch)){
				echo "<option>". $data['sub_name']."</option>";
			}
?>
</select>
Sectional No:
<select name="ses_no">
		<option>1</option>
		<option>2</option>
		<option>3</option>
</select>
Maximum Marks:
<input type="number" name="maxm" value="50">
<?php
echo "<table border><tr><td>Roll No</td><td>Marks Obtained</td></tr>";
for ($i=1; $i <= 10; $i++) { 
	echo "<tr>";
	echo "<td><input type=number name=r_no".$i."></td>";
	echo "<td><input type=number name=maxo".$i."></td>";
	echo "</tr>";
}
echo "</table>";
?>
<div style="margin-right: auto;margin-left: auto;width: 140px;">
<input type="submit" name="marksup" style="background-color:rgba(84,153,199,0.4);height: 30px;float: none;width: 140px;color: white;margin-top: 10px;">
</div>
</form>
<?php
//This php code is for submissions for student data registration.
if(isset($_POST['marksup']/*here sub1 is name of submit button*/)){
$conn=mysqli_connect("localhost","root","","dgarg");
if($conn){
$subname=$_POST['subname'];
$ses_no=$_POST['ses_no'];
$maxm=$_POST['maxm'];
for ($i=1; $i <= 10; $i++) { 
$r_no[$i]=$_POST['r_no'.$i];
$maxo[$i]=$_POST['maxo'.$i];
}
for ($i=1; $i <= 10; $i++) {
	if ($r_no[$i]!=''){
$insert="INSERT INTO marks VALUES ($r_no[$i],'$subname','$ses_no','$maxm','$maxo[$i]')";
if (mysqli_query($conn,$insert)){
	    echo '';
	        }
	    }
	    else{echo "";}
		}
		echo '<script> alert("Submission Successful")</script>';
}
}
?>
<?php
include('wbottom.php');
?>