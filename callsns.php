<?php
require './vendor/autoload.php';
$sns = new Aws\Sns\SnsClient([
	'region' => 'us-east-2',
	'version' => 'latest'
]);
/*$result = $sqs ->listTopics([

]);*/

echo $_GET['myemail'];

$result = $sns->subscribe(array(
    // TopicArn is required
    'TopicArn' => 'arn:aws:sns:us-east-2:186502234717:juwonkim',
    // Protocol is required
    'Protocol' => 'email',
    'Endpoint' => $_GET['myemail']
));
echo 'result is';
if ($result)
    echo "Yes";
else
    echo "No";
//print_r($result['Topics']);
//print_r($result['Topics'][0]['TopicArn']);
?>
