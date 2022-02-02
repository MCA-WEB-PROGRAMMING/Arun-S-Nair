<html>
<head>
</head>
<body bgcolor="#00cc66">
<center>
<h3>Employee Details</h3>
<form action="" method="POST">
<table>
<tr>
<td>Employee ID:</td>
<td><input type="text" name="eid"></td>
</tr>

<tr>
<td>Employee Name:</td>
<td><input type="text" name="ename"></td>
</tr>

<tr>
<td>Job Name:</td>
<td><input type="text" name="ejob"></td>
</tr>

<tr>
<td>Manager ID:</td>
<td><input type="text" name="manid"></td>
</tr>

<tr>
<td>Salary:</td>
<td><input type="text" name="sal"></td>
</tr>


<tr>
<td>
<input type="submit" name="btn" value="Submit">
</td>
</tr>
</table>

</form>

<form action="" method="POST">
<table>
<tr>
<td>
To Know Details of Employees having Salary Greater than 35000 Click<input type="submit" name="salary_btn" value="Here">
</td>
</tr>
</table>

</form>
</center>
</body>
</html>
<?php
if(isset($_POST['btn'])){
	$id=$_POST['eid'];
	$name=$_POST['ename'];
	$job=$_POST['ejob'];
	$managerid=$_POST['manid'];
	$salary=$_POST['sal'];
	$conn = mysqli_connect("localhost","root","");
	if(!$conn){
		die("Connection failed".mysqli_error());
	}
	
	$db=mysqli_select_db($conn,"web");
	if(!$db){
		die("Db failed".mysqli_error());
	}
	
	
	$in="INSERT INTO employee(emp_id,emp_name,job_name,manager_id,salary) VALUES('$id','$name','$job','$managerid','$salary')";	
	$r=mysqli_query($conn,"$in");
	if(!$r){
		die("Insert failed".mysqli_error());
	}
	
	
		
}
else if(isset($_POST['salary_btn'])){
	$conn = mysqli_connect("localhost","root","");
	if(!$conn){
		die("Connection failed".mysqli_error());
	}
	
	$db=mysqli_select_db($conn,"web");
	if(!$db){
		die("Db failed".mysqli_error());
	}

	$l=35000;
	$s="SELECT * FROM employee WHERE salary >35000";

	$t=mysqli_query($conn,"$s");

	if(!$t){
		die("Insert failed".mysqli_error());
	}
	else{
		echo "<table border='2'>
		<tr>
		<th>Employee ID</th>
		<th>Employee Name</th>
		<th>Job</th>
		<th>Manager ID</th>
		<th>Salary</th>
		</tr>";
		while($row=mysqli_fetch_assoc($t)){
			echo"<tr><td>".$row['emp_id']."</td><td>".$row['emp_name']."</td><td>".$row['job_name']."</td><td>".$row['manager_id']."</td><td>".$row['salary']."</td></tr>";
		}
		echo "</table>";
	}
}
?>
