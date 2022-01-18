<html>
<head
<title>bill</title>
</head>
<body bgcolor="#008040" text="white">
<center>
<form method="POST">
<table>
<tr><th> BILL</th></tr>
<tr>
<td>Consumer Number:</td><td>  <input type="text" name="no"></br></td>
</tr>
<tr>
<td>Number of Units:</td><td>  <input type="text" name="u"></br></td>
</tr>
<tr>
<td>Tarif:</td>
<td> 
<select name="tarif">
<option>SELECT </option>
<option>Rural </option>
<option>Residential </option>
<option>Commercial </option>
</select><br></td>
</tr>
<tr><td>
<input type="submit" value="SUBMIT" name="btn"></td>
</tr>
</table>
</form>
</center>
</body>
</html>
<?php
if(isset($_POST["btn"])){
	$num=$_POST["no"];
	$unit=$_POST["u"];
	$t=$_POST["tarif"];
	if($t=="Rural"){
		if($unit<=50){
			$price=(($unit*0.40)+20);	
		}
		else if($unit>50 && $unit<=100){
			$price=(($unit*0.65)+20);
		}
		else if($unit>100 && $unit<=150){
			$price=(($unit*0.90)+20);
		}
		else if($unit>150 && $unit<=250){
			$price=(($unit*1.50)+20);
		}
		else if($unit>250 && $unit<=400){
			$price=(($unit*1.90)+20);
		}
		else{
			$price=(($unit*2.50)+20);
		}
	
	}
	if($t=="Residential"){
		if($unit<=50){
			$price=(($unit*0.60)+40);	
		}
		else if($unit>50 && $unit<=100){
			$price=(($unit*0.90)+40);
		}
		else if($unit>100 && $unit<=150){
			$price=(($unit*1.30)+40);
		}
		else if($unit>150 && $unit<=250){
			$price=(($unit*1.80)+40);
		}
		else if($unit>250 && $unit<=400){
			$price=(($unit*2.30)+40);
		}
		else{
			$price=(($unit*2.80)+40);
		}
	
	}
	if($t=="Commercial"){
		if($unit<=50){
			$price=(($unit*0.90)+70);	
		}
		else if($unit>50 && $unit<=100){
			$price=(($unit*1.50)+70);
		}
		else if($unit>100 && $unit<=150){
			$price=(($unit*2)+70);
		}
		else if($unit>150 && $unit<=250){
			$price=(($unit*2.50)+70);
		}
		else if($unit>250 && $unit<=400){
			$price=(($unit*3)+70);
		}
		else{
			$price=(($unit*3.80)+70);
		}
	
	}
	
	echo "**BILL**"."<br>";
	echo "Consumer Number:".$num."<br>";
	echo "Number of Units Consumed:".$unit."<br>";
	echo "Bill Amount= RS.".$price."<br>";
}
?>

