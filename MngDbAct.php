<?php

$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
if(intval($_GET['act']) == 1){
    $deactivate = mysqli_query($db, "UPDATE LOG set decativate = 0 WHERE id = '".$_GET['id']."'");
}else{
    $deactivate = mysqli_query($db, "UPDATE LOG set decativate = 1 WHERE id = '".$_GET['id']."'");
}
mysqli_close($db);
?>