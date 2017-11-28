<?php
session_start();
$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
mysqli_query($db, "INSERT INTO LOG (email,phone) VALUES('".$_GET['myemail']."', '".$_GET['myphone']."')");
$getid = mysqli_query($db, "SELECT id FROM LOG WHERE email = '".$_GET['myemail']."'");
$gethost = mysqli_query($db, "SELECT host FROM LOG WHERE email = '".$_GET['myemail']."'");
$row = mysqli_fetch_row($getid);
$row1 = mysqli_fetch_row($gethost);
echo $row[0];
echo '<script type="text/javascript">';
echo 'var myid = ' .$row[0].';';
echo 'var myhost = ' .$row1[0].';';
echo 'localStorage.clear();';
echo 'localStorage.setItem("myid",myid);';
echo 'localStorage.setItem("hoststat",myhost);';
echo '</script>';
$_SESSION["myid"] = $row[0];
$_SESSION["hoststat"] = $row1[0];
mysqli_close($db);

$email = $_GET['myemail'];
include "callsns.php";

?>