<?php
require './vendor/autoload.php';
use Aws\Exception\AwsException;
$sqs = new Aws\Sqs\SqsClient([
    'region' => 'us-east-2',
    'version' => 'latest'
]);

try{
    $rcv = $sqs->receiveMessage([
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
    $rcvuid = $rcv['Messages'][0]['Body'];
    echo $rcvuid;
    echo '<script type="text/javascript">';
    echo 'var rcvmsg = \''.$rcvuid.'\';';
    echo 'localStorage.setItem("rcvqueue",rcvmsg);';
    echo '</script>';
    $result = $client->deleteMessage([
        'QueueUrl' => 'https://sqs.us-east-2.amazonaws.com/186502234717/itmo-juwonkim', // REQUIRED
        'ReceiptHandle' => $rcvhandle, // REQUIRED
    ]);
}catch(AwsException $e){
    echo "receive fail";
}

?>
