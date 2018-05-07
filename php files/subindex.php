<?php
include('wtop.php');
?>
<div style="height: 10px;font-size: 20px;font-weight: bolder;color: white;"><p align="center">Subjects Enter</p></div>
<form name="subjectform" method="post" id="subjectform">
<div><br>Subject Name:<input type="text" name="subname" placeholder="Subject Name*" required></div>
<div><br>Subject Code:<input type="number" name="subcode" placeholder="Subject Code*" required></div>
<div><br>Subject Branch:<select name="sbran">
	<?php
	#echo '<option>'.'#'.'</option>';
	$bname = array("Computer", "Mechanical", "Civil", "Electrical", "Electronics", "Automobile");
	for ($z='0'; $z < '6'; $z++) {
    	echo '<option>'.$bname[$z].' '.'Engineering'.'</option>';
	}
	?>
</select></div>
<div><br>Semester:<select name="ssem">
	<?php
	#echo '<option>'.'#'.'</option>';
	for ($z=1; $z <= 6; $z++) { 
		echo '<option>'.$z.'</option>';
	}
	?>
</select></div>
<div style="margin-right: auto;margin-left: auto;width: 140px;">
<br><input type="submit" name="sub2" style="background-color:rgba(84,153,199,0.4);height: 30px;float: none;width: 140px;color: white;">
</div>

</form>
<?php
//This php code is for subject submission
if(isset($_POST['sub2'])){			//here sub1 is name of submit button
$conn=mysqli_connect("localhost","root","","dgarg");
if($conn){
$subname=$_POST['subname'];
$subcode=$_POST['subcode'];
$ssem=$_POST['ssem'];
$sbran=$_POST['sbran'];
$insert="INSERT INTO subject VALUES ('$subname','$subcode','$sbran','$ssem')";
if (mysqli_query($conn,$insert)){
	    echo '<script> alert("Submission Successful")</script>';
	        }
else{
    echo '<script> alert("Sorry, Try Again !")</script>';
	}
		}
header( "refresh:0;url=Subindex.php" );
}
?>
<?php
include('wbottom.php');
?>