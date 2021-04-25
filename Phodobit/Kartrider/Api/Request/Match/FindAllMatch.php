<?php

namespace Phodobit\Kartrider\Api\Request\Match;

use Phodobit\Kartrider\Api\Model\Match\AllMatchResponse;
use Phodobit\Kartrider\Api\Request\Base;

/**
 * Class FindMatchListByUserAccessId
 * @package Phodobit\Kartrider\Api\Request\Match
 *
 * 모든 매치 리스트 조회
 */
class FindAllMatch extends Base
{
    const REQUEST_API_URL = 'https://api.nexon.co.kr/kart/v1.0/matches/all';
    // start_date={start_date}&end_date={end_date}&offset={offset}&limit={limit}&match_types={match_types}

    private $startDate = null;
    private $endDate = null;
    private $offset = null;
    private $limit = null;
    private $matchTypes = null;

    /**
     * @param string $startDate
     *
     */
    public function setStartDate(string $startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @param string $startDate
     *
     */
    public function setEndDate(string $endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @param int $offset
     *
     */
    public function setOffset(int $offset)
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @param int $limit
     *
     */
    public function setLimit(int $limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @param string $matchTypes
     *
     */
    public function setMatchTypes(string $matchTypes)
    {
        $this->matchTypes = $matchTypes;
        return $this;
    }

    /**
     * @return bool
     */
    public function checkParameter()
    {
        return parent::checkParameter();
    }

    public function send()
    {
        $this->_requestParameterList['start_date'] = $this->startDate;
        $this->_requestParameterList['end_date'] = $this->endDate;
        $this->_requestParameterList['offset'] = $this->offset;
        $this->_requestParameterList['limit'] = $this->limit;
        $this->_requestParameterList['match_types'] = $this->matchTypes;

        return parent::send();
    }

    /**
     * @return AllMatchResponse
     */
    public function getResult()
    {
        $allMatchResponse = new AllMatchResponse();
        $allMatchResponse->setDataFromJsonObject($this->_responseJson);
        return $allMatchResponse;
    }
}