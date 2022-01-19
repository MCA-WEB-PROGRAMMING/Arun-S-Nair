<?php
echo "Default Order"."<br>";
$s=array("Don","Adharsh","Vyshnav","Arun","Binoy","Shibli","Afeef");
print_r($s);
asort($s);
echo "<br><br>"."Ascending Order"."<br>";
print_r($s);
arsort($s);
echo "<br><br>"."Decending Order"."<br>";
print_r($s);

?>
