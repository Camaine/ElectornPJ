<?php

$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
$getcnt = mysqli_query($db, "SELECT COUNT(*)  FROM LOG ");
$getids = mysqli_query($db, "SELECT id  FROM LOG ");
$getemail = mysqli_query($db, "SELECT email  FROM LOG ");
$getact = mysqli_query($db, "SELECT deactivate  FROM LOG ");
$row = mysqli_fetch_row($getid);
$row1 = mysqli_fetch_row($getids);
$row2 = mysqli_fetch_row($getemail);
$row3 = mysqli_fetch_row($getact);
echo $row[0];
echo '<script type="text/javascript">';
echo 'var cnt = ' .$row[0].';';
echo 'var ids;';
echo 'var emails;';
echo 'var acts;';
for($i = 0; $i < $row[0] ; $i++) {
    echo 'ids+=' . $row1[$i] . '+",";';
    echo 'emails+=' . $row2[$i] . '+",";';
    echo 'acts+=' . $row3[$i] . '+",";';
}
echo 'localStorage.clear();';
echo 'localStorage.setItem("cnt",cnt);';
echo 'localStorage.setItem("ids",ids);';
echo 'localStorage.setItem("emails",emails);';
echo 'localStorage.setItem("acts",acts);';
echo '</script>';
mysqli_close($db);
?>