<?php
include_once dirname(__FILE__) . '/../autoload.php';

if($argc < 3) {
    echo "Usage:\n";
    echo '$ php FindMatchDetailByMatchId.php ACCESS_TOKEN MATCH_ID';
    exit;
}

$apiKey = $argv[1];
$matchId = $argv[2];

$api = new \Phodobit\Kartrider\Api\Request\Match\FindMatchDetailByMatchId();

$result = $api->setMatchId($matchId)
    ->setApiKey($apiKey)
    ->send()
    ->getResult();

print_r($result);