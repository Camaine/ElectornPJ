<?php

$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
$getcnt = mysqli_query($db, "SELECT COUNT(*)  FROM LOG ");
$getinfos = mysqli_query($db, "SELECT id, email, deactivate FROM LOG ");
$row = mysqli_fetch_row($getcnt);
$row4 = mysqli_fetch_array($getinfos, MYSQL_ASSOC);
$row1 = $row4['id'];
$row2 = $row4['email'];
$row3 = $row4['deactivate'];
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
echo 'console.log(ids+" "+emails+" "+acts);';
echo '</script>';
mysqli_close($db);
?>