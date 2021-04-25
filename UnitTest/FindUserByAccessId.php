<?php
include_once dirname(__FILE__) . '/../autoload.php';

if($argc < 3) {
    echo "Usage:\n";
    echo '$ php FindUserByAccessId.php ACCESS_TOKEN USER_ACCESS_ID';
    exit;
}

$apiKey = $argv[1];
$accessId = $argv[2];

$api = new \Phodobit\Kartrider\Api\Request\User\FindUserByAccessId();

$result = $api->setAccessId($accessId)
    ->setApiKey($apiKey)
    ->send()
    ->getResult();

print_r($result);