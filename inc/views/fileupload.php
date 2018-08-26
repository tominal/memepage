<?php

// handle multiple files to amazon s3 bucket here
require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../config.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$s3 = new S3Client([
    'version' => 'latest',
    'region'  => $aws_region
]);

try {
    // Upload data.
    $result = $s3->putObject([
        'Bucket' => $aws_bucket,
        'Key'    => $aws_key,
        'Body'   => 'Hello, world!',
        'ACL'    => 'public-read'
    ]);

    // Print the URL to the object.
    echo $result['ObjectURL'] . PHP_EOL;
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
