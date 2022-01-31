<html>
<head>
</head>
<body bgcolor="009966">
<center>
<form action="" method="POST">
<table>
<tr>
<td>Accession number:</td>
<td><input type="text" name="bn"></td>
</tr>

<tr>
<td>Title:</td>
<td><input type="text" name="bt"></td>
</tr>

<tr>
<td>Author:</td>
<td><input type="text" name="ba"></td>
</tr>

<tr>
<td>Edition:</td>
<td><input type="text" name="be"></td>
</tr>

<tr>
<td>Publisher:</td>
<td><input type="text" name="bp"></td>
</tr>


<tr>
<td>
<input type="submit" name="btn" value="ADD">
</td>
</tr>
</table>

</form>


<form method="POST" action="">
<table>
<tr>
<td>Enter the book name</td>
<td><input type="text" name="book_to_search"></td>
</tr>
<tr>
<td>
<input type="submit" name="search_btn" value="SEARCH">
</table>
</form>
</center>
</body>
</html>

<?php
if(isset($_POST['btn'])){
	$b_no=$_POST['bn'];
	$b_title=$_POST['bt'];
	$b_author=$_POST['ba'];
	$b_edition=$_POST['be'];
	$b_publisher=$_POST['bp'];
	$conn = mysqli_connect("localhost","root","");
	if(!$conn){
		die("Connection failed".mysqli_error());
	}
	
	$db=mysqli_select_db($conn,"web");
	if(!$db){
		die("Db failed".mysqli_error());
	}
	
	
	$in="INSERT INTO book(accession_no,title,author,edition,publisher) VALUES('$b_no','$b_title','$b_author','$b_edition','$b_publisher')";	
	$r=mysqli_query($conn,"$in");
	if(!$r){
		die("Insert failed".mysqli_error());
	}
}
else if(isset($_POST['search_btn'])){
	$b_name=$_POST['book_to_search'];
	$conn = mysqli_connect("localhost","root","");
	if(!$conn){
		die("Connection failed".mysqli_error());
	}
	
	$db=mysqli_select_db($conn,"web");
	if(!$db){
		die("Db failed".mysqli_error());
	}
	$search="SELECT * FROM book WHERE title LIKE '%{$b_name}%'";
	$r2=mysqli_query($conn,"$search");
	if(!$r2){
		die("Insert failed".mysqli_error());
	}
	else{
		echo "<table border='5'>
		<tr>
		<th>ACCESSION NO</th>
		<th>TITLE</th>
		<th>AUTHOR</th>
		<th>EDITION</th>
		<th>PUBLISHER</th>
		</tr>";
		while($row=mysqli_fetch_assoc($r2)){
			echo"<tr><td>".$row['accession_no']."</td><td>".$row['title']."</td><td>".$row['author']."</td><td>".$row['edition']."</td><td>".$row['publisher']."</td></tr>";
		}
		echo "</table>";
	}
}
?>
