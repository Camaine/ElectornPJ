<?php
$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
mysqli_query($db, "INSERT INTO LOG (email,phone) VALUES('".$_GET['myemail']."', '".$_GET['myphone']."')");
$getid = mysqli_query($db, "SELECT id FROM LOG");
$row = mysqli_fetch_row($getid);
echo $row[0];
<script>
    var myid = "<?php echo $row[0]; ?>";
    console.log(myid);
    localStorage.setItem("myid",myid);
</script>
mysqli_close($db);
?>