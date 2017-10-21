<?php
$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
mysqli_query($db, "UPDATE LOG SET s3rawURL = '".$_GET['s3raw']."', s3endURL = '".$_GET['s3end']."' WHERE id = '".$_GET['id']."'");
mysqli_query($db, "UPDATE LOG SET stats = '".$_GET['stat']."', receipt = '".$_GET['receipt']."' WHERE id = '".$_GET['id']."'");
mysqli_close($db);
?>