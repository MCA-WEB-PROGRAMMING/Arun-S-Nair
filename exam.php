<html>
<head>
</head>
<body bgcolor="#00cc66">

<center>
<h3><b>EMPLOYEE</b></h3>
<form action="" method="POST">
<table>
<tr>
<td>ID</td>
<td><input type="text" name="fid"></td>
</tr>

<tr>
<td>Name</td>
<td><input type="text" name="fname"></td>
</tr>

<tr>
<td>Job Name</td>
<td><input type="text" name="fjob"></td>
</tr>

<tr>
<td>Manager ID</td>
<td><input type="text" name="fmanid"></td>
</tr>

<tr>
<td>Salary</td>
<td><input type="text" name="fsalary"></td>
</tr>

<tr>
<td><input type="submit" name="sub" value="Submit">
</table>
</form>
</center>
<br><br><br><br><br><br>

<form method="POST" action="">
To search for Employees with salary more than Rs.35,000 <input type="submit" name="sal" value="Search">
</form>
</body>
<html>
<?php
if(isset($_POST["sub"])){
	$id=$_POST["fid"];
	$name=$_POST["fname"];
	$job=$_POST["fjob"];
	$man=$_POST["fmanid"];
	$sal=$_POST["fsalary"];
	
	$conn = mysqli_connect("localhost","root","");
	if(!$conn){
		die("Connection failed".mysqli_error());
	}
	$db=mysqli_select_db($conn,"web");
	if(!$db){
		die("DB failed".mysqli_error());
	}
	echo "HO";
	$in="INSERT INTO employee(emp_id,emp_name,job_name,manager_id,salary) VALUES('$id','$name','$job','$man','$sal')";	
	echo "HO";
	$r=mysqli_query($conn,"$in");
	if(!$r){
		echo "Insert Failed";
	}
}
else if(isset($_POST["sal"])){
	
	$conn = mysqli_connect("localhost","root","");
	if(!$conn){
		die("Connection failed".mysqli_error());
	}
	$db=mysqli_select_db($conn,"web");
	if(!$db){
		die("DB failed".mysqli_error());
	}

	$s="SELECT * FROM employee WHERE salary>35000";
	$r2=mysqli_query($conn,"$s");
	if($r2){
		echo "<table border='2' bgcolor='white'>
		<tr>
		<th>Name</th>
		<th>Salary</th>
		</tr>";
		while($row=mysqli_fetch_array($r2)){
			echo "<tr><td>".$row['emp_name']."</td><td>".$row['salary']."</td></tr>";
		}
		echo "</table>";
	}
}
?>

