<?php

namespace Phodobit\Kartrider\Api\Request\User;

use Phodobit\Kartrider\Api\Model\User\User;
use Phodobit\Kartrider\Api\Request\Base;

/**
 * Class FindUserByAccessId
 * @package Phodobit\Kartrider\Api\Request\User
 *
 * 유저 고유 식별자로 라이더명 조회
 */
class FindUserByAccessId extends Base
{
    const requestApiUrl = 'https://api.nexon.co.kr/kart/v1.0/users/{access_id}';

    /**
     * @param string $accessId
     * @return $this
     */
    public function setAccessId(string $accessId)
    {
        $this->_requestUrlParameterList['access_id'] = $accessId;
        return $this;
    }

    /**
     * @return User
     */
    public function getResult()
    {
        $result = new User();
        $result->setDataFromJsonObject($this->_responseJson);
        return $result;
    }
}