<?php 
echo "Hello World!";
echo "MySql Connect test<br>";
      $db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");

      if($db){
          echo "connect : success<br>";
      }
      else{
          echo "disconnect : fail<br>";
      }
?>
