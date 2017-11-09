<?php
require './vendor/autoload.php';
$sns = new Aws\Sns\SnsClient([
    'region' => 'us-east-2',
    'version' => 'latest'
]);
/*$result = $sqs ->listTopics([

]);*/

$db = mysqli_connect("myprojectdb.cvmjrshfk7ix.us-east-2.rds.amazonaws.com", "juwonkim", "5gkrsus5qks", "records");
$getemail = mysqli_query($db, "SELECT email FROM LOG WHERE id = '".$_GET['id']."'");
$row = mysqli_fetch_row($getemail);

echo $row[0];

$result = $sns->subscribe(array(
    // TopicArn is required
    'TopicArn' => 'arn:aws:sns:us-east-2:186502234717:alertofimage',
    // Protocol is required
    'Protocol' => 'email',
    'Endpoint' => $row[0]
));
echo 'result is';
if ($result)
    echo "Yes";
else
    echo "No";
//print_r($result['Topics']);
//print_r($result['Topics'][0]['TopicArn']);
?>
