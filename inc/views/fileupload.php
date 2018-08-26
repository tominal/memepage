<?php

// handle multiple files to amazon s3 bucket here
require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../config.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$s3 = new S3Client([
    'version' => 'latest',
    'region'  => $aws_region,
    'credentials' => [
      'key' => $aws_key,
      'secret' => $aws_secret
    ]
]);

try {
  echo "Uploading...";
    // Upload data.
    // $result = $s3->putObject([
    //     'Bucket' => $aws_bucket,
    //     'Key'    => 'data.txt',
    //     'Body'   => 'Hello, world!',
    //     'ACL'    => 'public-read'
    // ]);

    // $url = $result['ObjectURL'];
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
