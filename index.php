<?php
    $db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
    if($db){
        echo "connect : success<br>";
    }
    else{
        echo "disconnect : fail<br>";
    }
    echo &_GET['userid'];
    echo &_GET['username'];
    //mysqli_query($db, "INSERT INTO LOG (id,email) VALUES($_GET['userid'], $_GET['username'])");
    mysqli_close($db);
 ?>