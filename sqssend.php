<?php
require './vendor/autoload.php';
$sqs = new Aws\Sqs\SqsClient([
    'region' => 'us-east-2',
    'version' => 'latest'
]);

echo $_GET['id'];

$result = $sqs->sendMessage([
    'MessageAttributes' => [
    '<String>' => [
            'DataType' => 'String' // REQUIRED
        ],
        // ...
    ],
    'MessageBody' => $_GET['id'], // REQUIRED
    'QueueUrl' => 'https://sqs.us-east-2.amazonaws.com/186502234717/itmo-juwonkim' // REQUIRED
]);
echo 'result is';
if ($result)
    echo "Yes";
else
    echo "No";

?>