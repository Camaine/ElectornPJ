<?php
require './vendor/autoload.php';
$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
mysqli_query($db, "INSERT INTO LOG (email,phone) VALUES('".$_GET['myemail']."', '".$_GET['myphone']."')");
$getid = mysqli_query($db, "SELECT id FROM LOG WHERE email = '".$_GET['myemail']."'");
$row = mysqli_fetch_row($getid);
echo $row[0];
echo '<script type="text/javascript">';
echo 'var myid = ' .$row[0].';';
echo 'localStorage.clear();';
echo 'localStorage.setItem("myid",myid);';
echo '</script>';
mysqli_close($db);
use Aws\Sns\SnsClient;
use Aws\Credentials\CredentialProvider;
$provider = CredentialProvider::defaultProvider();
$sns = snsClient::factory(array(

    'region' => 'us-east-2', //Change according to you
    'version' => 'latest', //Change according to you
    'credentials' => $provider,
    'scheme' => 'http', //disables SSL certification, there was an error on enabling it

));

/*$result = $sns -> createTopic([
    'Name' => 'Testing',
]);
/*$result = $sns->subscribe(array(
    // TopicArn is required
    'TopicArn' => 'arn:aws:sns:us-east-2:186502234717:juwonkim',
    // Protocol is required
    'Protocol' => 'email',
    'Endpoint' => 'kang9290@gmail.com'
));*/
echo 'result is';
if ($result)
    echo "Yes";
else
    echo "No";
?>