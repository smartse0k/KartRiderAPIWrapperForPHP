<?php

namespace Phodobit\Kartrider\Api\Model\Match;

use Phodobit\Kartrider\Api\Model\Base;

class MatchResponse extends Base
{
    /** @var string $nickName */
    private $nickName;

    /** @var Match[] $matches */
    private $matches;

    /**
     * @return string
     */
    public function getNickName(): string
    {
        return $this->nickName;
    }

    /**
     * @return Match[]
     */
    public function getMatches(): array
    {
        return $this->matches;
    }

    /**
     * @param string $nickName
     * @return MatchResponse
     */
    public function setNickName(string $nickName)
    {
        $this->nickName = $nickName;
        return $this;
    }

    /**
     * @param Match[] $matches
     * @return MatchResponse
     */
    public function setMatches(array $matches)
    {
        $this->matches = $matches;
        return $this;
    }

    /**
     * @param object $json
     */
    public function setDataFromJsonObject($json)
    {
        $this->nickName = $json->nickName ?? null;

        $this->matches = array();
        foreach($json->matches as $matchJson) {
            $match = new Match();
            $match->setDataFromJsonObject($matchJson);
            $this->matches[] = $match;
        }
    }
}