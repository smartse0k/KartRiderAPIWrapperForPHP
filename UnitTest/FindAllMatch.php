<?php
include_once dirname(__FILE__) . '/../autoload.php';

$options = getopt('t:a:s:e:o:l:m:');

if(count($options) < 1 || !isset($options['t'])) {
    echo "Usage:\n";
    echo "$ php FindMatchListByUserAccessId.php -t ACCESS_TOKEN -a USER_ACCESS_ID [OPTIONS...]\n";
    echo "    -t : ACCESS_TOKEN\n";
    echo "OPTIONS LIST:\n";
    echo "    -s : 조회 시작 날짜 UTC (ex: 2019-02-15 01:00:00)\n";
    echo "    -e : 조회 끝 날짜 UTC (ex: 2019-02-15 01:00:00)\n";
    echo "    -o : 조회 오프셋\n";
    echo "    -l : 조회 수\n";
    echo "    -m : 매치 타입 HashID 목록 (콤마(',')로 구분된 문자열)\n";
    exit;
}

$apiKey = $options['t'];

$api = new \Phodobit\Kartrider\Api\Request\Match\FindAllMatch();

if(isset($options['s'])) {
    $api->setStartDate($options['s']);
}

if(isset($options['e'])) {
    $api->setEndDate($options['e']);
}

if(isset($options['o'])) {
    $api->setOffset($options['o']);
}

if(isset($options['l'])) {
    $api->setLimit($options['l']);
}

if(isset($options['m'])) {
    $api->setMatchTypes($options['m']);
}

$result = $api->setApiKey($apiKey)
    ->send()
    ->getResult();

print_r($result);