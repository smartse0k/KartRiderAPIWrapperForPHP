<?php

namespace Phodobit\Kartrider\Api\Request\User;

use Phodobit\Kartrider\Api\Model\User\User;
use Phodobit\Kartrider\Api\Request\Base;

/**
 * Class FindUserByNickname
 * @package Phodobit\Kartrider\Api\Request\User
 *
 * 라이더명으로 유저 정보 조회
 */
class FindUserByNickname extends Base
{
    const requestApiUrl = 'https://api.nexon.co.kr/kart/v1.0/users/nickname/{nickname}';

    private $nickname = null;

    /**
     * @param string $nickname
     * @return $this
     */
    public function setNickname(string $nickname)
    {
        $this->nickname = $nickname;
        return $this;
    }

    /**
     * @return bool
     */
    public function checkParameter()
    {
        if(is_null($this->nickname)) {
            return false;
        }

        return parent::checkParameter();
    }

    public function send()
    {
        $this->_requestUrlParameterList['nickname'] = $this->nickname;

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