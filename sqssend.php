<?php
require './vendor/autoload.php';
use Aws\Exception\AwsException;
$sqs = new Aws\Sqs\SqsClient([
    'profile' => 'default',
    'region' => 'us-east-2',
    'version' => 'latest'
]);

try{
    $result = $sqs->sendMessage([
        'MessageAttributes' => [
            '<String>' => [
                'DataType' => 'String'
            ],
        ],
        'MessageBody' => 'test',
        'QueueUrl' => 'https://sqs.us-east-2.amazonaws.com/186502234717/itmo-juwonkim'
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