<?php

$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
$getid = mysqli_query($db, "SELECT id  FROM LOG WHERE email = '".$_GET['myemail']."'");
$row = mysqli_fetch_row($getid);
echo $row[0];
echo '<script type="text/javascript">';
echo 'var myid = ' .$row[0].';';
echo 'localStorage.clear();';
echo 'localStorage.setItem("myid",myid);';
echo '</script>';
mysqli_close($db);

$email = $_GET['myemail'];
include "callsns.php";

?>