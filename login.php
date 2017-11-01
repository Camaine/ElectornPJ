<?php
$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
mysqli_query($db, "INSERT INTO LOG (email,phone) VALUES('".$_GET['myemail']."', '".$_GET['myphone']."')");
$getid = mysqli_query($db, "SELECT id FROM LOG WHERE email = '".$_GET['myemail']."'");
$row = mysqli_fetch_row($getid);
use Aws\Sns\SnsClient;
$sns = SnsClient::factory(array(

    'region' => 'us-east-2', //Change according to you
    'version' => '2010-03-31', //Change according to you
    'credentials' => [
        'key'    => 'AKIAIIBZ3GIZSS4S6PBQ',
        'secret' => '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',
    ],
    'scheme' => 'http', //disables SSL certification, there was an error on enabling it

));
$result = $sns->subscribe(array(
    // TopicArn is required
    'TopicArn' => 'arn:aws:sns:us-east-2:186502234717:juwonkim',
    // Protocol is required
    'Protocol' => 'email',
    'Endpoint' => '".$_GET['myemail']."'
));
echo $row[0];
echo '<script type="text/javascript">';
echo 'var myid = ' .$row[0].';';
echo 'localStorage.clear();';
echo 'localStorage.setItem("myid",myid);';
echo '</script>';
mysqli_close($db);
?>