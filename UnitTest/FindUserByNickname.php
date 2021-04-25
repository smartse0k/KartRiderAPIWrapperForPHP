<?php
include_once dirname(__FILE__) . '/../autoload.php';

if($argc < 3) {
    echo "Usage:\n";
    echo '$ php FindUserByNickname.php ACCESS_TOKEN NICKNAME';
    exit;
}

$apiKey = $argv[1];
$nickName = $argv[2];

$findUserByNickName = new \Phodobit\Kartrider\Api\Request\User\FindUserByNickname();

$result = $findUserByNickName->setNickname($nickName)
    ->setApiKey($apiKey)
    ->send()
    ->getResult();

print_r($result);