<?php

namespace Phodobit\Kartrider\Api\Request\User;

use Phodobit\Kartrider\Api\Model\User\User;
use Phodobit\Kartrider\Api\Request\Base;

class FindUserByNickname extends Base
{
    const requestApiUrl = 'https://api.nexon.co.kr/kart/v1.0/users/nickname/{nickname}';

    /**
     * @param string $nickname
     * @return $this
     */
    public function setNickname(string $nickname)
    {
        $this->_requestUrlParameterList['nickname'] = $nickname;
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