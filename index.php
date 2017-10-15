<?php
    $db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
    if($db){
        echo "connect : success<br>";
    }
    else{
        echo "disconnect : fail<br>";
    }
    mysqli_query($db, "INSERT INTO LOG (id,email,accessToken) VALUES('".$_GET['userid']."', '".$_GET['username']."', '".$_GET['accesstoken']."')");
    mysqli_close($db);
 ?>