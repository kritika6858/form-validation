<?php
include('wtop.php');
?>
<div style="height: 10px;font-size: 20px;font-weight: bolder;color: white;"><p align="center">Student Display</p></div>
<form name="stunfodis" method="post" id="stufetchform">
<?php
$name=array("s_iddis","namedis","fnamedis","mnamedis","ph_nodis","gendis","addrdis","r_nodis","reg_nodis","semdis","brandis","secdis","dobdis",);
for ($i=0; $i<13; $i++) { 
echo "<input type=hidden name=".$name[$i]." "."value=false>";
}
?>
<table id="stufetchtableoption">
<tr>
<td>SId<input type="checkbox" name="s_iddis" value=true checked></td>
<td>Name<input type="checkbox" name="namedis" value=true checked></td>
<td>Father's Name<input type="checkbox" name="fnamedis" value=true checked></td>
<td>Mother's Name<input type="checkbox" name="mnamedis" value=true checked></td>
<td>Phone No.<input type="checkbox" name="ph_nodis" value=true checked></td>
</tr>
<tr>
<td>Gender<input type="checkbox" name="gendis" value=true checked></td>
<td>Address<input type="checkbox" name="addrdis" value=true checked></td>
<td>Roll No.<input type="checkbox" name="r_nodis" value=true checked></td>
<td>Reg No.<input type="checkbox" name="reg_nodis" value=true checked></td>
<td>Semester<input type="checkbox" name="semdis" value=true checked></td>
</tr>
<tr>
<td>Branch<input type="checkbox" name="brandis" value=true checked></td>
<td>Section<input type="checkbox" name="secdis" value=true checked></td>
<td>DOB<input type="checkbox" name="dobdis" value=true checked></td>
</tr>
</table>
<br>
Enter Student Roll Number to Access
<select name="roll_noaccess">
		<?php
		$qry="SELECT distinct r_no FROM student";
$fetch=mysqli_query($conn,$qry);
			while($data=mysqli_fetch_array($fetch)){
				echo "<option>". $data['r_no']."</option>";
			}
?>
</select>
<div style="margin-right: auto;margin-left: auto;width: 140px;">
<br><input type="submit" name="substudis" style="background-color:rgba(84,153,199,0.4);height: 30px;float: none;width: 140px;color: white;">
</div>
</form>
<?php
if(isset($_POST['substudis'])){//here substudis is name of submit button
$s_id=$_POST['s_iddis'];
$name=$_POST['namedis'];
$fname=$_POST['fnamedis'];
$mname=$_POST['mnamedis'];
$dob=$_POST['dobdis'];
$addr=$_POST['addrdis'];
$ph_no=$_POST['ph_nodis'];
$sem=$_POST['semdis'];
$r_no=$_POST['r_nodis'];
$reg_no=$_POST['reg_nodis'];
$sec=$_POST['secdis'];
$bran=$_POST['brandis'];
$gen=$_POST['gendis'];
$roll_noaccess=$_POST['roll_noaccess'];
if ($roll_noaccess!='') {
$qry="SELECT * FROM student where r_no='$roll_noaccess'";
}
else{
$qry="SELECT * FROM student";
}
$fetch=mysqli_query($conn,$qry);
	echo "<table border id=stutable> <tr>";
$tablerowname=array("s_id","name","fname","mname","ph_no","gender","addr","r_no","reg_no","sem","bran","sec","dob");
$ifcondcheck=array("$s_id","$name","$fname","$mname","$ph_no","$gen","$addr","$r_no","$reg_no","$sem","$bran","$sec","$dob");
$tablerowlabel=array("Serial","Name","FName","MName","Phone No.","Gender","Address","Roll No.","Regis. No.","Semester","Branch","Section","DOB");
				for ($i=0; $i < 13; $i++) {
				if ($ifcondcheck[$i]=='true') {
				echo "<td>".$tablerowlabel[$i]."</td>";
				}
				}
				echo "</tr>";
			while($data=mysqli_fetch_array($fetch)){
				echo "<tr>";
				for ($i=0; $i < 13; $i++) {
				if ($ifcondcheck[$i]=='true') {	
				echo "  <td>".$data[$tablerowname[$i]]."</td>  ";
				}
				}
				echo "</tr>";
			}
			echo'</table>';
		}
?>
<?php
include('wbottom.php');
?>