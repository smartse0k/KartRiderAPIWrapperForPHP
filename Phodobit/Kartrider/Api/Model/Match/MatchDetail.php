<?php

namespace Phodobit\Kartrider\Api\Model\Match;

use Phodobit\Kartrider\Api\Model\Base;

class MatchDetail extends Base
{
    /** @var string $matchId */
    private $matchId;

    /** @var string $matchType */
    private $matchType;

    /** @var string $matchResult */
    private $matchResult;

    /** @var int $gameSpeed */
    private $gameSpeed;

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

    /** @var Team[] $teams */
    private $teams;

    /** @var Player[] $players */
    private $players;

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
    public function getMatchResult(): string
    {
        return $this->matchResult;
    }

    /**
     * @return int
     */
    public function getGameSpeed(): int
    {
        return $this->gameSpeed;
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
     * @return Team[]
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * @return Player[]
     */
    public function getPlayers()
    {
        return $this->players;
    }


    /**
     * @param object $json
     */
    public function setDataFromJsonObject($json)
    {
        $this->matchId = $json->matchId ?? null;
        $this->matchType = $json->matchType ?? null;
        $this->matchResult = $json->matchResult ?? null;
        $this->gameSpeed = isset($json->gameSpeed) ? intval($json->gameSpeed) : null;
        $this->startTime = $json->startTime ?? null;
        $this->endTime = $json->endTime ?? null;
        $this->playTime = isset($json->playTime) ? intval($json->playTime) : null;
        $this->channelName = $json->channelName ?? null;
        $this->trackId = $json->trackId ?? null;

        $this->teams = array();
        if(isset($json->teams)) {
            foreach($json->teams as $teamData) {
                $data = new Team();
                $data->setDataFromJsonObject($teamData);

                $this->teams[] = $data;
            } // end foreach
        } // end if

        $this->players = array();
        if(isset($json->players)) {
            foreach($json->players as $playerData) {
                $data = new Player();
                $data->setDataFromJsonObject($playerData);

                $this->players[] = $data;
            } // end foreach
        } // end if
    }
}