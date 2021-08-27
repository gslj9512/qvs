<?php

namespace Qvs\Src\Ability;

use Qvs\Src\ApiBase;
use Qvs\Src\Exception\IllegalParamException;

class Ptz extends ApiBase
{
    const CTRLURL = "/v1/namespaces/{namespaceId}/devices/{gbId}/ptz";

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

    function cmd($query_param = [], $body_param = [])
    {
        $url = $this->buildUrl($this->config, self::CTRLURL, $query_param);
        return $this->request($url, 'POST', $body_param, $this->config);
    }

}
