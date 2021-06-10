<?php

namespace Phodobit\Kartrider\Api\Model\Match;

use Phodobit\Kartrider\Api\Model\Base;

class AllMatch extends Base
{
    /** @var string $matchType */
    private $matchType;

    /** @var string[] $matches */
    private $matches;

    /**
     * @return string
     */
    public function getMatchType(): string
    {
        return $this->matchType;
    }

    /**
     * @return string[]
     */
    public function getMatches(): array
    {
        return $this->matches;
    }

    /**
     * @param object $json
     */
    public function setDataFromJsonObject($json)
    {
        $this->matchType = $json->matchType ?? null;

        $this->matches = array();
        foreach($json->matches as $matchId) {
            $this->matches[] = $matchId;
        }
    }
}