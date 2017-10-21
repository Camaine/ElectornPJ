<?php
$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
mysqli_query($db, "INSERT INTO LOG (email,phone) VALUES('".$_GET['myemail']."', '".$_GET['myphone']."')");
$getid = mysqli_query($db, "SELECT id FROM LOG");
$row = mysqli_fetch_row($getid);
echo $row[0];
mysqli_close($db);
?>