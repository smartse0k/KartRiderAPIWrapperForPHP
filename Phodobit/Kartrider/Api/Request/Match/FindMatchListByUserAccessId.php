<?php

namespace Phodobit\Kartrider\Api\Request\Match;

use Phodobit\Kartrider\Api\Model\Match\MatchResponse;
use Phodobit\Kartrider\Api\Request\Base;

/**
 * Class FindMatchListByUserAccessId
 * @package Phodobit\Kartrider\Api\Request\Match
 *
 * 유저 고유 식별자로 매치 리스트 조회
 */
class FindMatchListByUserAccessId extends Base
{
    const requestApiUrl = 'https://api.nexon.co.kr/kart/v1.0/users/{access_id}/matches';
    // start_date={start_date}&end_date={end_date}&offset={offset}&limit={limit}&match_types={match_types}

    private $accessId = null;
    private $startDate = null;
    private $endDate = null;
    private $offset = null;
    private $limit = null;
    private $matchTypes = null;

    /**
     * @param string $accessId
     * @return $this
     */
    public function setAccessId(string $accessId)
    {
        $this->accessId = $accessId;
        return $this;
    }

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
        if(is_null($this->accessId)) {
            return false;
        }

        return parent::checkParameter();
    }

    public function send()
    {
        $this->_requestUrlParameterList['access_id'] = $this->accessId;

        $this->_requestParameterList['start_date'] = $this->startDate;
        $this->_requestParameterList['end_date'] = $this->endDate;
        $this->_requestParameterList['offset'] = $this->offset;
        $this->_requestParameterList['start_date'] = $this->limit;
        $this->_requestParameterList['match_types'] = $this->matchTypes;

        return parent::send();
    }

    /**
     * @return MatchResponse
     */
    public function getResult()
    {
        $matchResponse = new MatchResponse();
        $matchResponse->setDataFromJsonObject($this->_responseJson);
        return $matchResponse;
    }
}