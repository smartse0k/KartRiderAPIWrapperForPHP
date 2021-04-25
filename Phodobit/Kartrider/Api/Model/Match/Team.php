<?php

namespace Phodobit\Kartrider\Api\Model\Match;

use Phodobit\Kartrider\Api\Model\Base;

class Team extends Base
{
    /** @var string $teamId */
    private $teamId;

    /** @var Player[] $players */
    private $players;

    /**
     * @return string
     */
    public function getTeamId(): string
    {
        return $this->teamId;
    }

    /**
     * @return Player[]
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
     * @param object $json
     */
    public function setDataFromJsonObject($json)
    {
        $this->teamId = $json->teamId ?? null;

        $this->players = array();
        foreach($json->players as $player) {
            $playerData = new Player();
            $playerData->setDataFromJsonObject($player);

            $this->players[] = $playerData;
        }
    }
}