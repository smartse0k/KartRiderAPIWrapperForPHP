<?php

namespace Phodobit\Kartrider\Api\Request;

use Phodobit\Kartrider\Api\Exception\BrokenDataException;
use Phodobit\Kartrider\Api\Exception\DisallowAccessTokenException;
use Phodobit\Kartrider\Api\Exception\DisallowServiceException;
use Phodobit\Kartrider\Api\Exception\InternalServerErrorException;
use Phodobit\Kartrider\Api\Exception\InternalServerTimeoutException;
use Phodobit\Kartrider\Api\Exception\InvalidParameterException;
use Phodobit\Kartrider\Api\Exception\NotFoundException;
use Phodobit\Kartrider\Api\Exception\NotSupportApiException;
use Phodobit\Kartrider\Api\Exception\TokenLimitExceedException;
use Phodobit\Kartrider\Api\Exception\TooLongParameterException;

class Base
{
    const requestApiUrl = null;

    protected $_requestUrlParameterList = array();
    protected $_requestParameterList = array();
    private $_apiKey = null;
    protected $_responseInfo = null;
    protected $_responseData = null;
    protected $_responseJson = null;

    public function setApiKey(string $key)
    {
        $this->_apiKey = $key;
        return $this;
    }

    /**
     * @return $this
     * @throws DisallowAccessTokenException
     * @throws DisallowServiceException
     * @throws InternalServerErrorException
     * @throws InternalServerTimeoutException
     * @throws InvalidParameterException
     * @throws NotFoundException
     * @throws NotSupportApiException
     * @throws TokenLimitExceedException
     * @throws TooLongParameterException
     * @throws BrokenDataException
     */
    public function send()
    {
        if( !$this->checkParameter() ) {
            throw new InvalidParameterException();
        }

        $apiUrl = static::requestApiUrl;
        foreach($this->_requestUrlParameterList as $key => $value)
        {
            $apiUrl = str_replace("{{$key}}", urlencode($value), $apiUrl);
        }

        $urlWithParams = $apiUrl;

        if(!empty($parameterList)) {
            $urlWithParams .= '?' . http_build_query($parameterList);
        }

        $headerList = array(
            "Authorization: {$this->_apiKey}",
        );

        $this->curl($urlWithParams, $headerList);

        if(isset($this->_responseInfo['http_code'])) {
            switch($this->_responseInfo['http_code']) {
                case 200:
                case 301:
                    break;

                case 400:
                    throw new InvalidParameterException();
                    break;

                case 401:
                    throw new DisallowServiceException();
                    break;

                case 403:
                    throw new DisallowAccessTokenException();
                    break;

                case 404:
                    throw new NotFoundException();
                    break;

                case 405:
                    throw new NotSupportApiException();
                    break;

                case 413:
                    throw new TooLongParameterException();
                    break;

                case 429:
                    throw new TokenLimitExceedException();
                    break;

                case 500:
                    throw new InternalServerErrorException();
                    break;

                case 504:
                    throw new InternalServerTimeoutException();
                    break;
            }
        }

        $this->_responseJson = json_decode($this->_responseData, false);
        if(json_last_error() !== JSON_ERROR_NONE) {
            throw new BrokenDataException();
        }

        return $this;
    }

    /**
     * @return bool
     */
    protected function checkParameter()
    {
        if(is_null($this->_apiKey)) {
            return false;
        }

        return true;
    }

    /**
     * @param string $url
     * @param array $header
     */
    private function curl(string $url, array $header)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

        $this->_responseData = curl_exec($curl);
        $this->_responseInfo = curl_getinfo($curl);

        curl_close($curl);
    }
}
