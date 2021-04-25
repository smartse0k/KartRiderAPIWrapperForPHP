<?php

namespace Phodobit\Kartrider\Api\Model\Match;

use Phodobit\Kartrider\Api\Model\Base;

class Player extends Base
{
    /** @var string $character */
    private $character;

    /** @var string $kart */
    private $kart;

    /** @var string $license */
    private $license;

    /** @var string $pet */
    private $pet;

    /** @var string $flyingPet */
    private $flyingPet;

    /** @var string $partsEngine */
    private $partsEngine;

    /** @var string $partsHandle */
    private $partsHandle;

    /** @var string $partsWheel */
    private $partsWheel;

    /** @var string $partsKit */
    private $partsKit;

    /** @var string $matchRank */
    private $matchRank;

    /** @var string $matchWin */
    private $matchWin;

    /** @var string $matchType */
    private $matchType;

    /** @var string $matchTime */
    private $matchTime;

    /** @var string $matchRetired */
    private $matchRetired;

    /** @var string $rankinggrade2 */
    private $rankinggrade2;

    /** @var string $characterName */
    private $characterName;

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
    public function getKart(): string
    {
        return $this->kart;
    }

    /**
     * @return string
     */
    public function getLicense(): string
    {
        return $this->license;
    }

    /**
     * @return string
     */
    public function getPet(): string
    {
        return $this->pet;
    }

    /**
     * @return string
     */
    public function getFlyingPet(): string
    {
        return $this->flyingPet;
    }

    /**
     * @return string
     */
    public function getPartsEngine(): string
    {
        return $this->partsEngine;
    }

    /**
     * @return string
     */
    public function getPartsHandle(): string
    {
        return $this->partsHandle;
    }

    /**
     * @return string
     */
    public function getPartsWheel(): string
    {
        return $this->partsWheel;
    }

    /**
     * @return string
     */
    public function getPartsKit(): string
    {
        return $this->partsKit;
    }

    /**
     * @return string
     */
    public function getMatchRank(): string
    {
        return $this->matchRank;
    }

    /**
     * @return string
     */
    public function getMatchWin(): string
    {
        return $this->matchWin;
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
    public function getMatchTime(): string
    {
        return $this->matchTime;
    }

    /**
     * @return string
     */
    public function getMatchRetired(): string
    {
        return $this->matchRetired;
    }

    /**
     * @return string
     */
    public function getRankinggrade2(): string
    {
        return $this->rankinggrade2;
    }

    /**
     * @return string
     */
    public function getCharacterName(): string
    {
        return $this->characterName;
    }

    /**
     * @param object $json
     */
    public function setDataFromJsonObject($json)
    {
        $this->character = $json->character ?? null;
        $this->kart = $json->kart ?? null;
        $this->license = $json->license ?? null;
        $this->pet = $json->pet ?? null;
        $this->flyingPet = $json->flyingPet ?? null;
        $this->partsEngine = $json->partsEngine ?? null;
        $this->partsHandle = $json->partsHandle ?? null;
        $this->partsWheel = $json->partsWheel ?? null;
        $this->partsKit = $json->partsKit ?? null;
        $this->matchRank = $json->matchRank ?? null;
        $this->matchWin = $json->matchWin ?? null;
        $this->matchTime = $json->matchTime ?? null;
        $this->matchRetired = $json->matchRetired ?? null;
        $this->rankinggrade2 = $json->rankinggrade2 ?? null;
        $this->characterName = $json->characterName ?? null;
    }
}