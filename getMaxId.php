<?php

$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
$getcnt = mysqli_query($db, "SELECT COUNT(*)  FROM LOG ");
$getinfos = mysqli_query($db, "SELECT id, email, deactivate FROM LOG ");
$row = mysqli_fetch_row($getcnt);
echo $row[0];
echo '<script type="text/javascript">';
echo 'var cnt = ' .$row[0].';';
echo 'var ids = ""';
echo 'var emails = "";';
echo 'var acts = "";';
for($i = 0; $i < $row[0] ; $i++) {
    $row4 = mysqli_fetch_array($getinfos);
    echo 'ids+="' . $row4[0] . '"+",";';
    echo 'emails+="' . $row4[1] . '"+",";';
    echo 'acts+="' . $row4[2] . '"+",";';
}
echo 'localStorage.setItem("cnt",cnt);';
echo 'localStorage.setItem("ids",ids);';
echo 'localStorage.setItem("emails",emails);';
echo 'localStorage.setItem("acts",acts);';
echo 'console.log(ids+" "+emails+" "+acts);';
echo '</script>';
mysqli_close($db);
?>