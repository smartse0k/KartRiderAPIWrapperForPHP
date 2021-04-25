<?php
include_once dirname(__FILE__) . '/../autoload.php';

// fixme API KEY
$apiKey = '';
$nickName = '포도빛향기에';

// 메타데이터 설치
echo "메타데이터 설치중...\n";
$downloader = new \Phodobit\Kartrider\Api\Metadata\Downloader();
$downloader->install();

$metadata = new \Phodobit\Kartrider\Api\Metadata\Metadata();
echo "메타데이터 설치완료!\n";

// 내 정보 가져오기
echo "'{$nickName}' 정보 조회중...\n";
$findUserByNickname = new \Phodobit\Kartrider\Api\Request\User\FindUserByNickname();
$userInfo = $findUserByNickname->setApiKey($apiKey)
            ->setNickname($nickName)
            ->send()
            ->getResult();

$userAccessId = $userInfo->getAccessId();
$userRealNickname = $userInfo->getName();
$userLevel = $userInfo->getLevel();

echo "=========== 정보 ============\n";
echo "고유 식별자: {$userAccessId}\n";
echo "실제 닉네임: {$userRealNickname}\n";
echo "인게임 레벨: {$userLevel}\n";
echo "============================\n\n";

// 매치 목록 조회
echo "매치 목록 조회중...\n";
$findMatchListByUserAccessId = new \Phodobit\Kartrider\Api\Request\Match\FindMatchListByUserAccessId();
$matchList = $findMatchListByUserAccessId->setApiKey($apiKey)
             ->setAccessId($userAccessId)
             ->setOffset(0)->setLimit(1)
             ->send()->getResult();

$matchNickname = $matchList->getNickName();
$matchList = $matchList->getMatches();
$matchCount = count($matchList);

echo "=========== 정보 ============\n";
echo "실제 닉네임: {$matchNickname}\n";
echo "검색 매치수: {$matchCount}\n";
echo "============================\n\n";

if($matchCount < 1) {
    echo "매치가 없으므로 작업 종료\n";
    exit;
}

$matchData = $matchList[0];

$matchType = $matchData->getMatchType();
$matchTypeMetaValue = $metadata->getGameType($matchType);
$matchList = $matchData->getMatches();
$matchListCount = count($matchList);

echo "=========== 정보 ============\n";
echo "매치 종류: {$matchType}\n";
echo "매치 종류(MetaValue): {$matchTypeMetaValue}\n";
echo "매치 정보수: {$matchListCount}\n";
echo "============================\n\n";

if($matchCount < 1) {
    echo "매치 정보가 없으므로 작업 종료\n";
    exit;
}

$matchInfo = $matchList[0];

$matchAccountNo = $matchInfo->getAccountNo();
$matchId = $matchInfo->getMatchId();
$matchType = $matchInfo->getMatchType();
$matchTypeMetaValue = $metadata->getGameType($matchInfo->getMatchType());
$matchTeamId = $matchInfo->getTeamId();
$matchCharacter = $matchInfo->getCharacter();
$matchCharacterMetaValue = $metadata->getCharacter($matchInfo->getCharacter());
$matchStartTime = $matchInfo->getStartTime();
$matchEndTime = $matchInfo->getEndTime();
$matchPlayTime = $matchInfo->getPlayTime();
$matchChName = $matchInfo->getChannelName();
$matchTrackId = $matchInfo->getTrackId();
$matchTrackIdMetaValue = $metadata->getTrack($matchInfo->getTrackId());
$matchPlayerCount = $matchInfo->getPlayerCount();

$player = $matchInfo->getPlayer();
$playerChar = $player->getCharacter();
$playerCharMetaValue = $metadata->getCharacter($player->getCharacter());
$playerKart = $player->getKart();
$playerKartMetaValue = $metadata->getKart($player->getKart());
$playerLicense = $player->getLicense();
$playerPet = $player->getPet();
$playerPetMetaValue = $metadata->getPet($player->getPet());
$playerFlyingPet = $player->getFlyingPet();
$playerFlyingPetMetaValue = $metadata->getFlyingPet($player->getFlyingPet());
$playerPartsEngine = $player->getPartsEngine();
$playerPartsHandle = $player->getPartsHandle();
$playerPartsWheel = $player->getPartsWheel();
$playerPartsKit = $player->getPartsKit();
$playerMatchRank = $player->getMatchRank();
$playerMatchWin = $player->getMatchWin();
$playerMatchTime = $player->getMatchTime();
$playerMatchRetired = $player->getMatchRetired();
$playerRankingGrade2 = $player->getRankinggrade2();
$playerCharName = $player->getCharacterName();

echo "=========== 정보 ============\n";
echo "계정 고유 식별자: {$matchAccountNo}\n";
echo "매치 고유 식별자: {$matchId}\n";
echo "매치 종류: {$matchType}\n";
echo "매치 종류 Value: {$matchTypeMetaValue}\n";
echo "매치 팀 ID: {$matchTeamId}\n";
echo "매치 캐릭터: {$matchCharacter}\n";
echo "매치 캐릭터 Value: {$matchCharacterMetaValue}\n";
echo "매치 시작 시간: {$matchStartTime}\n";
echo "매치 종료 시간: {$matchEndTime}\n";
echo "매치 진행 시간: {$matchPlayTime}\n";
echo "매치 채널: {$matchChName}\n";
echo "매치 트랙: {$matchTrackId}\n";
echo "매치 트랙 Value: {$matchTrackIdMetaValue}\n";
echo "매치 참여 유저 수: {$matchPlayerCount}\n";
echo "\n";
echo "플레이어 캐릭터: {$playerChar}\n";
echo "플레이어 캐릭터 Value: {$playerCharMetaValue}\n";
echo "플레이어 카트 : {$playerKart}\n";
echo "플레이어 카트 Value : {$playerKartMetaValue}\n";
echo "플레이어 라이센스 : {$playerLicense}\n";
echo "플레이어 펫 : {$playerPet}\n";
echo "플레이어 펫 Value : {$playerPetMetaValue}\n";
echo "플레이어 플라잉 펫 : {$playerFlyingPet}\n";
echo "플레이어 플라잉 펫 Value : {$playerFlyingPetMetaValue}\n";
echo "플레이어 파츠(엔진) : {$playerPartsEngine}\n";
echo "플레이어 파츠(핸들) : {$playerPartsHandle}\n";
echo "플레이어 파츠(바퀴) : {$playerPartsWheel}\n";
echo "플레이어 파츠(킷) : {$playerPartsKit}\n";
echo "플레이어 순위 : {$playerMatchRank}\n";
echo "플레이어 승리 : {$playerMatchWin}\n";
echo "플레이어 진행 시간 : {$playerMatchTime}\n";
echo "플레이어 리타이어 : {$playerMatchRetired}\n";
echo "플레이어 라이센스 2 : {$playerRankingGrade2}\n";
echo "플레이어 캐릭터 이름: {$playerCharName}\n";
echo "============================\n\n";