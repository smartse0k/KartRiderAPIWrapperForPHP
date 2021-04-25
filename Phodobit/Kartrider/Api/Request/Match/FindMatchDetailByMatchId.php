<?php

namespace Phodobit\Kartrider\Api\Request\Match;

use Phodobit\Kartrider\Api\Model\Match\MatchDetail;
use Phodobit\Kartrider\Api\Request\Base;

/**
 * Class FindMatchListByUserAccessId
 * @package Phodobit\Kartrider\Api\Request\Match
 *
 * 특정 매치의 상세 정보 조회
 */
class FindMatchDetailByMatchId extends Base
{
    const requestApiUrl = 'https://api.nexon.co.kr/kart/v1.0/matches/{match_id}';

    private $matchId = null;

    /**
     * @param string $matchId
     *
     */
    public function setMatchId(string $matchId)
    {
        $this->matchId = $matchId;
        return $this;
    }

    /**
     * @return bool
     */
    public function checkParameter()
    {
        if(is_null($this->matchId)) {
            return false;
        }

        return parent::checkParameter();
    }

    public function send()
    {
        $this->_requestUrlParameterList['match_id'] = $this->matchId;

        return parent::send();
    }

    /**
     * @return MatchDetail
     */
    public function getResult()
    {
        $matchDetail = new MatchDetail();
        $matchDetail->setDataFromJsonObject($this->_responseJson);
        return $matchDetail;
    }
}