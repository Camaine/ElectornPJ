<?php
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\Credentials\CredentialProvider;

$profile = 'default';
$path = '/var/www/html/.aws/credentials.ini';

$provider = CredentialProvider::ini($profile, $path);
$provider = CredentialProvider::memoize($provider);
//Create a S3Client
$s3Client = new S3Client([
    'region' => 'us-west-2',
    'version' => '2006-03-01',
    'credentials' => $provider
]);

echo "Credential OK";

//Listing all S3 Bucket
$buckets = $s3Client->listBuckets();
foreach ($buckets['Buckets'] as $bucket){
    echo $bucket['Name']."\n";
}

$bucket = 'itms444juwon';
$objects = $s3Client->getListObjectsIterator(array(
    'Bucket' => $bucket,
    'Prefix' => 'files/'
));

foreach ($objects as $object) {
    echo $object['Key'] . "\n";
}

?>

