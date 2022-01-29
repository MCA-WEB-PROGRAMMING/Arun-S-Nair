<html>
<head>
</head>
<body>

<form action="" method="POST">
<table>
<tr>
<td>Name:</td>
<td><input type="text" name="un"></td>
</tr>

<tr>
<td>Age:</td>
<td><input type="text" name="ua"></td>
</tr>

<tr>
<td>Address:</td>
<td><input type="text" name="uadd"></td>
</tr>

<tr>
<td>Place:</td>
<td><input type="text" name="up"></td>
</tr>

<tr>
<td>Phone Number:</td>
<td><input type="text" name="uno"></td>
</tr>


<tr>
<td>
<input type="submit" name="btn" value="Submit">
</td>
</tr>
</table>

</form>

</body>
</html>
<?php
if(isset($_POST['btn'])){
	$n=$_POST['un'];
	$a=$_POST['ua'];
	$add=$_POST['uadd'];
	$p=$_POST['up'];
	$no=$_POST['uno'];
	$conn = mysqli_connect("localhost","root","");
	if(!$conn){
		die("Connection failed".mysqli_error());
	}
	
	$db=mysqli_select_db($conn,"web");
	if(!$db){
		die("Db failed".mysqli_error());
	}
	
	
	$in="INSERT INTO details(name,age,address,place,phone_number) VALUES('$n','$a','$add','$p','$no')";	
	$r=mysqli_query($conn,"$in");
	if(!$r){
		die("Insert failed".mysqli_error());
	}
	
	$q="SELECT * FROM details";
	$t=mysqli_query($conn,"$q");
	if(!$r){
		die("Insert failed".mysqli_error());
	}
	else{
		echo "<table>
		<tr>
		<th>NAME</th>
		<th>AGE</th>
		<th>ADDRESS</th>
		<th>PLACE</th>
		<th>PHONE</th>
		</tr>";
		while($row=mysqli_fetch_assoc($t)){
			echo"<tr><td>".$row['name']."</td><td>".$row['age']."</td><td>".$row['address']."</td><td>".$row['place']."</td><td>".$row['phone_number']."</td></tr>";
		}
		echo "</table>";
	}
	
}
?>
