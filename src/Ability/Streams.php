<?php

namespace Qvs\Src\Ability;

use Qvs\Src\ApiBase;
use Qvs\Src\Exception\IllegalParamException;

class Streams extends ApiBase
{
    const CREATE_STREAMS_URL = "/v1/namespaces/{namespaceId}/streams";
    const UPDATE_STREAMS_URL = "/v1/namespaces/{namespacesId}/streams/{streamId}";
    const DELETE_STREAMS_URL = "/v1/namespaces/{namespaceId}/streams/{streamId}";
    const GET_STREAMS_URL = "/v1/namespaces/{namespaceId}/streams/{streamId}";
    const STOP_STREAMS_URL = "/v1/namespaces/{id}/streams/{streamId}/stop";
    const START_STREAMS_URL = "/v1/namespaces/{id}/streams/{streamId}/enabled";

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

    function enabled($query_param = [], $body_param = [])
    {
        $url = $this->buildUrl($this->config, self::START_STREAMS_URL, $query_param);
        return $this->request($url, 'POST', $body_param, $this->config);
    }


    /**
     * @param array $query_param
     * @param array $body_param
     * @return bool
     * @throws IllegalParamException
     */
    function stop($query_param = [], $body_param = [])
    {
        $url = $this->buildUrl($this->config, self::STOP_STREAMS_URL, $query_param);
        return $this->request($url, 'POST', $body_param, $this->config);
    }

}
