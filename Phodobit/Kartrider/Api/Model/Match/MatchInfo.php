<?php

namespace Phodobit\Kartrider\Api\Model\Match;

use Phodobit\Kartrider\Api\Model\Base;
use Phodobit\Kartrider\Api\Model\Match\Player;

class MatchInfo extends Base
{
    /** @var string $accountNo */
    private $accountNo;

    /** @var string $matchId */
    private $matchId;

    /** @var string $matchType */
    private $matchType;

    /** @var string $teamId */
    private $teamId;

    /** @var string $character */
    private $character;

    /** @var string $startTime */
    private $startTime;

    /** @var string $endTime */
    private $endTime;

    /** @var int $playTime */
    private $playTime;

    /** @var string $channelName */
    private $channelName;

    /** @var string $trackId */
    private $trackId;

    /** @var int $playerCount */
    private $playerCount;

    /** @var Player $player */
    private $player;

    /**
     * @return string
     */
    public function getAccountNo(): string
    {
        return $this->accountNo;
    }

    /**
     * @return string
     */
    public function getMatchId(): string
    {
        return $this->matchId;
    }

    /**
     * @return string
     */
    public function getMatchType(): string
    {
        return $this->matchType;
    }

    /**
     * @return string
     */
    public function getTeamId(): string
    {
        return $this->teamId;
    }

    /**
     * @return string
     */
    public function getCharacter(): string
    {
        return $this->character;
    }

    /**
     * @return string
     */
    public function getStartTime(): string
    {
        return $this->startTime;
    }

    /**
     * @return string
     */
    public function getEndTime(): string
    {
        return $this->endTime;
    }

    /**
     * @return int
     */
    public function getPlayTime(): int
    {
        return $this->playTime;
    }

    /**
     * @return string
     */
    public function getChannelName(): string
    {
        return $this->channelName;
    }

    /**
     * @return string
     */
    public function getTrackId(): string
    {
        return $this->trackId;
    }

    /**
     * @return int
     */
    public function getPlayerCount(): int
    {
        return $this->playerCount;
    }

    /**
     * @return Player
     */
    public function getPlayer(): Player
    {
        return $this->player;
    }

    /**
     * @param object $json
     */
    public function setDataFromJsonObject($json)
    {
        $this->accountNo = $json->accountNo ?? null;
        $this->matchId = $json->matchId ?? null;
        $this->matchType = $json->matchType ?? null;
        $this->teamId = $json->teamId ?? null;
        $this->character = $json->character ?? null;
        $this->startTime = $json->startTime ?? null;
        $this->endTime = $json->endTime ?? null;
        $this->playTime = $json->playTime ?? null;
        $this->channelName = $json->channelName ?? null;
        $this->trackId = $json->trackId ?? null;
        $this->playerCount = $json->playerCount ?? null;

        if(isset($json->player)) {
            $player = new Player();
            $player->setDataFromJsonObject($json->player);

            $this->player = $player;
        } else {
            $this->player = null;
        }
    }
}