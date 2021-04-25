<?php

namespace Phodobit\Kartrider\Api\Model\Match;

use Phodobit\Kartrider\Api\Model\Base;

class Match extends Base
{
    /** @var string $matchType */
    private $matchType;

    /** @var MatchInfo[] $matches */
    private $matches;

    /**
     * @return string
     */
    public function getMatchType(): string
    {
        return $this->matchType;
    }

    /**
     * @return MatchInfo[]
     */
    public function getMatches(): array
    {
        return $this->matches;
    }

    /**
     * @param string $matchType
     * @return Match
     */
    public function setMatchType(string $matchType)
    {
        $this->matchType = $matchType;
        return $this;
    }

    /**
     * @param MatchInfo[] $matches
     * @return Match
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
        $this->matchType = $json->matchType ?? null;

        $this->matches = array();
        foreach($json->matches as $matchInfoJson) {
            $matchInfo = new MatchInfo();
            $matchInfo->setDataFromJsonObject($matchInfoJson);
            $this->matches[] = $matchInfo;
        }
    }
}