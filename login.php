<?php
$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
mysqli_query($db, "INSERT INTO LOG (email,phone) VALUES('".$_GET['myemail']."', '".$_GET['myphone']."')");
$getid = mysqli_query($db, "SELECT id FROM LOG");
echo $getid;
mysqli_close($db);
?>