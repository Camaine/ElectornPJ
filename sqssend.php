<?php
require './vendor/autoload.php';
use Aws\Exception\AwsException;
$sqs = new Aws\Sqs\SqsClient([
    'region' => 'us-east-2',
    'version' => 'latest'
]);

try{
    $result = $sqs->sendMessage([
        'DelaySeconds' => 30,
        'MessageBody' => 'test',
        'QueueUrl' => 'https://sqs.us-east-2.amazonaws.com/186502234717/itmo-juwonkim'
    ]);
    echo 'result is';
    if ($result)
        echo "Yes";
    else
        echo "No";
}catch(AwsException $e){
    echo "send fail";
}

try{
    $rcv = $client->receiveMessage([
    'MaxNumberOfMessages' => 1,
    'QueueUrl' => 'https://sqs.us-east-2.amazonaws.com/186502234717/itmo-juwonkim',
    'VisibilityTimeout' => 60,
    'WaitTimeSeconds' => 5,
    ]);
    echo 'result is';
    if ($rcv)
        echo "Yes";
    else
        echo "No";
    $rcvhandle = $rcv['Messages'][0]['ReceiptHandle'];
    $rcvuid = $rcv['Messages'][0]['Body']."\n";
    echo $rcvuid;
}catch(AwsException $e){
    echo "receive fail";
}


?>