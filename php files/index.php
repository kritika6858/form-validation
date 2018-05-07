<?php
include('wtop.php');
?>
<script type="text/javascript">
function valid()
{
	var x;
	x=document.rform.sem.value;
	if (x=='false') {
		alert("Please Select Semester");
		return false;
	}
	x=document.rform.sec.value;
	if (x=='false') {
		alert("Please Select Section");
		return false;
	}
	x=document.rform.bran.value;
	if (x=='false') {
		alert("Please Select Branch");
		return false;
	}
	else {return true;}
}
</script>
<div style="height: 10px;font-size: 20px;font-weight: bolder;color: white;"><p align="center">Registration Form</p></div>
<form name="rform" method="post" id="indexform">
<div><br>Name:<input type="text" name="name" placeholder="Name*" required></div>
<div><br>Father's Name:<input type="text" name="fname" placeholder="Father's Name*" required></div>
<div><br>Mother's Name:<input type="text" name="mname" placeholder="Mother's Name*" required></div>
<div><br>D.O.B:<input type="date" name="dob" required></div>
<div><br>Gender:<div style="float: right;">Female<input type="radio" name="gen" value="female" required></div>
				<div style="float: right;">Male<input type="radio" name="gen" value="male" required checked></div>
				</div>
<div><br>Address:<input type="text" name="addr" placeholder="Address*" required></div>
<div><br>Phone Number:<input type="Number" name="ph_no" placeholder="Phone Number*" maxlength="10" minlength="10" required></div>
<div><br>Branch:<select name="bran">
	<?php
	echo '<option value="false">'.'-SELECT-'.'</option>';
	$bname = array("Computer", "Mechanical", "Civil", "Electrical", "Electronics", "Automobile");
	for ($z='0'; $z < '6'; $z++) {
    	echo '<option>'.$bname[$z].' '.'Engineering'.'</option>';
	}
	?>
</select></div>
<div><br>Semester:<select name="sem">
	<?php
	echo '<option value="false">'.'-SELECT-'.'</option>';
	for ($z=1; $z <= 6; $z++) { 
		echo '<option>'.$z.'</option>';
	}
	?>
</select></div>
<div><br>Roll Number:<input type="Number" name="r_no" placeholder="Roll Number*" maxlength="4" minlength="4" required></div>
<div><br>Registration Number:<input type="Number" name="reg_no" placeholder="Registration Number*" maxlength="12" minlength="12" required></div>
<div><br>Section:<select name="sec">
	<?php
	echo '<option value="false">'.'-SELECT-'.'</option>';
	for ($z = 'A',$y=1; $z <= 'Z',$y<=13; $z++,$y++) {
    	echo '<option>'.$z.'</option>';
	}
	?>
</select></div>
<div style="margin-right: auto;margin-left: auto;width: 140px;">
<br><input type="submit" name="sub1" onclick="return valid();" / style="background-color:rgba(84,153,199,0.4);height: 30px;float: none;width: 140px;color: white;">
</div>
</form>
<?php
//This php code is for submissions for student data registration.
if(isset($_POST['sub1']/*here sub1 is name of submit button*/)){
if($conn){
$name=$_POST['name'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$dob=$_POST['dob'];
$addr=$_POST['addr'];
$ph_no=$_POST['ph_no'];
$sem=$_POST['sem'];
$r_no=$_POST['r_no'];
$reg_no=$_POST['reg_no'];
$sec=$_POST['sec'];
$bran=$_POST['bran'];
$gen=$_POST['gen'];
$insert="INSERT INTO student VALUES ('','$name','$fname','$mname','$ph_no','$gen','$addr','$r_no','$reg_no','$sem','$bran','$sec','$dob')";
if (mysqli_query($conn,$insert)){
	    echo '<script> alert("Submission Successful")</script>';
	        }
else{
    echo '<script> alert("Sorry, Try Again !")</script>';
	}
		}
echo '<meta http-equiv="refresh" content="0; url=index.php">';
}
?>
<?php
include('wbottom.php');
?>