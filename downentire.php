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
// Use the high-level iterators (returns ALL of your objects).
$objects = $s3Client->getIterator('ListObjects', array('Bucket' => $bucket));

echo "Keys retrieved!\n";
foreach ($objects as $object) {
    echo $object['Key'] . "\n";
}

// Use the plain API (returns ONLY up to 1000 of your objects).
$result = $s3Client->listObjects(array('Bucket' => $bucket));

echo "Keys retrieved!\n";
$rootPath = '/var/www/html/tmp';
$zip = new ZipArchive();
$zip->open('s3.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
foreach ($result['Contents'] as $object) {
    echo $object['Key'] . "\n";
try{
    $fileSavePathBaseDir = '/var/www/html/tmp/';
    $fileSavePath = $fileSavePathBaseDir.$object['Key'];
    
    $fileSavePathDir = explode('/',$object['Key']);
    
    if(count($fileSavePathDir) > 1){
        if(!is_dir($fileSavePathBaseDir.$fileSavePathDir[0])){
            mkdir($fileSavePathBaseDir.$fileSavePathDir[0]);
        }

    }

    $result = $s3Client->getObject(array(
        'Bucket' => $bucket,
        'Key'    => $object['Key'],
        'SaveAs' => $fileSavePath
    ));
} catch (S3Exception $e) {
    echo $e->getMessage() . "\n";
}
}

$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();

?>


