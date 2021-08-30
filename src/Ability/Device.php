<?php

namespace Qvs\Src\Ability;

use Qvs\Src\ApiBase;
use Qvs\Src\Exception\IllegalParamException;

class Device extends ApiBase
{
    const STARTURL = "/v1/namespaces/{namespaceId}/devices/{gbId}/start";
    const STOPURL = "/v1/namespaces/{namespaceId}/devices/{gbId}/stop";

    private $config;

    function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @param $query_param
     * @return bool
     * @throws IllegalParamException
     */

    function start($query_param = [], $body_param = [])
    {
        $url = $this->buildUrl($this->config, self::STARTURL, $query_param);
        return $this->request($url, 'POST', $body_param, $this->config);
    }

    /**
     * @param $query_param
     * @return bool
     * @throws IllegalParamException
     */

    function stop($query_param = [], $body_param = [])
    {
        $url = $this->buildUrl($this->config, self::STOPURL, $query_param);
        return $this->request($url, 'POST', $body_param, $this->config);
    }


}
