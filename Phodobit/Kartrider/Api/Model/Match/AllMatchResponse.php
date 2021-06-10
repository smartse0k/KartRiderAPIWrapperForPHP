<?php

namespace Phodobit\Kartrider\Api\Model\Match;

use Phodobit\Kartrider\Api\Model\Base;

class AllMatchResponse extends Base
{
    /** @var AllMatch[] $matches */
    private $matches;

    /**
     * @return AllMatch[]
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
        $this->matches = array();
        foreach($json->matches as $allMatchJson) {
            $allMatch = new AllMatch();
            $allMatch->setDataFromJsonObject($allMatchJson);

            $this->matches[] = $allMatch;
        }
    }
}