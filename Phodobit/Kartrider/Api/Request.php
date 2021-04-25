<?php

namespace Phodobit\Kartrider\Api;

class Request
{
    /**
     * @param string $url
     * @param array $parameterList
     * @return string
     */
    protected function curl(string $url, array $parameterList = []) {
        $urlWithParams = $url;

        if(!empty($parameterList)) {
            $urlWithParams .= '?' . http_build_query($parameterList);
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $urlWithParams);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $responseData = curl_exec($curl);

        curl_close($curl);

        return $responseData;
    }
}
