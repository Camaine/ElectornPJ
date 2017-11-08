
/**
 * Created by IntelliJ IDEA.
 * User: juwonkim
 * Date: 2017. 11. 7.
 * Time: 오후 4:54
**/
<?php
require './vendor/autoload.php';
$sqs = new Aws\Sqs\SqsClient([
    'region' => 'us-east-2',
    'version' => 'latest'
]);

$result = $sqs->sendMessage([
    'MessageAttributes' => [
    '<String>' => [
            'DataType' => 'string' // REQUIRED
        ],
        // ...
    ],
    'MessageBody' => $_GET['id'], // REQUIRED
    'QueueUrl' => 'https://sqs.us-east-2.amazonaws.com/186502234717/itmo-juwonkim' // REQUIRED
]);


?>