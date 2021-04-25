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
    const REQUEST_API_URL = 'https://api.nexon.co.kr/kart/v1.0/users/{access_id}';

    private $accessId = null;

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

        return parent::send();
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