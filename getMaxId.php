<?php

$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
$getid = mysqli_query($db, "SELECT max(id)  FROM LOG ");
$row = mysqli_fetch_row($getid);
echo $row[0];
echo '<script type="text/javascript">';
echo 'var maxid = ' .$row[0].';';
echo 'localStorage.clear();';
echo 'localStorage.setItem("maxid",maxid);';
echo '</script>';
mysqli_close($db);
?>