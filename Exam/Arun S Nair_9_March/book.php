<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    

</head>
<body bgcolor=#009966>
    <center>
    <br><br><br><br>
    <h3>BOOK INFORMATION</h3>

    <form action="" method="POST">
        <table>
            <tr>
                <td>Accession Number</td>
                <td><input type="text" name="unum"></td>
            </tr>

            <tr>
                <td>Title</td>
                <td><input type="text" name="utitle"></td>
            </tr>

            <tr>
                <td>Author</td>
                <td><input type="text" name="uauthor"></td>
            </tr>

            <tr>
                <td>Publisher</td>
                <td><input type="text" name="upublisher"></td>
            </tr>

            <tr colspan='2'>
                
                <td align="center"><input type="submit" name="insert_btn" value="INSERT"></td>
            </tr>
        </table>
    </form>
    <br><br><br><br><br><br><br><br><br><br>
<form action="" method="POST">
<h3>SEARCH A BOOK</h3>
    <table>
        <tr>
            <td>Enter the title of the book to search</td>
            <td><input type="text" name="book_to_search"></td>
        </tr>
        <tr>
            <td align="center"><input type="submit" name="search_btn" value="SEARCH"></td>
        </tr>
    </table>
</form>
</center>
</body>
</html>


<?php
if(isset($_POST['insert_btn'])){
    $num=$_POST['unum'];
    $title=$_POST['utitle'];
    $author=$_POST['uauthor'];
    $publisher=$_POST['upublisher'];

    $conn=mysqli_connect("localhost","root","","web");

    $in="INSERT INTO bookinfo(b_accession_no,b_title,b_author,b_publisher) VALUES('$num','$title','$author','$publisher')";
    $q1=mysqli_query($conn,$in);
    if($q1){
        echo "Insertion Successfull";
    }
}
if(isset($_POST['search_btn'])){
    $b=$_POST['book_to_search'];
   
    $conn=mysqli_connect("localhost","root","","web");

    $s="SELECT * FROM bookinfo WHERE b_title = '$b'";
 
    $search=mysqli_query($conn,$s);
   
    
    echo "<br><br><br><center><table border='1'><tr><th>ACCESSION NUMBER</th><th>TITLE</th><th>AUTHOR</th><th>PUBLISHER</th></tr>";
    
    while($row=mysqli_fetch_assoc($search)){
        echo "<tr><td>".$row['b_accession_no']."</td><td>".$row['b_title']."</td><td>".$row['b_author']."</td><td>".$row['b_publisher']."</td></tr>";
    }
    echo "</table></center>";
}
?>