<?php
require './vendor/autoload.php';
use Aws\Exception\AwsException;
$sqs = new Aws\Sqs\SqsClient([
    'region' => 'us-east-2',
    'version' => 'latest'
]);

echo $_GET['id'];
try{
    $result = $sqs->sendMessage([
        'MessageAttributes' => [
            '<String>' => [
                'DataType' => 'String' // REQUIRED
            ],
            // ...
        ],
        'MessageBody' => 'test', // REQUIRED
        'QueueUrl' => 'https://sqs.us-east-2.amazonaws.com/186502234717/itmo-juwonkim' // REQUIRED
    ]);
    echo 'result is';
    if ($result)
        echo "Yes";
    else
        echo "No";
}catch(AwsException $e){
    echo "Fail";
}


?>