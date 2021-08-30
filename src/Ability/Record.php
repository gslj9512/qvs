<?php

namespace Qvs\Src\Ability;

use Qvs\Src\ApiBase;
use Qvs\Src\Exception\IllegalParamException;

class Record extends ApiBase
{
    const STARTURL = "/v1/namespaces/{namespaceId}/streams/{streamId}/record/start";
    const STOPURL = "/v1/namespaces/{namespaceId}/streams/{streamId}/record/stop";
    const RECORDHISURL = "/v1/namespaces/{namespaceId}/streams/{streamId}/recordhistories?start={start}&end={end}&marker={marker}&line={line}";
    const SAVESURL = "/v1/namespaces/{namespaceId}/streams/{streamId}/saveas";
    const PLAYBACKURL = "/v1/namespaces/{namespaceId}/streams/{streamId}/records/playback.m3u8?start={start}&end={end}";
    const SNAPURL = "/v1/namespaces/{namespaceId}/streams/{streamId}/snap";
    const SNAPSHOTSURL = "/v1/namespaces/{namespaceId}/streams/{streamId}/snapshots?type={type}&start={start}&end={end}&marker={marker}&line={line}";
    const COVERURL = "/v1/namespaces/{namespaceId}/streams/{streamId}/cover";

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

    /**
     * @param $query_param
     * @return bool
     * @throws IllegalParamException
     */

    function recordHistories($query_param = [], $body_param = [])
    {
        $url = $this->buildUrl($this->config, self::RECORDHISURL, $query_param);
        return $this->request($url, 'GET', $body_param, $this->config);
    }

    /**
     * @param $query_param
     * @return bool
     * @throws IllegalParamException
     */

    function saves($query_param = [], $body_param = [])
    {
        $url = $this->buildUrl($this->config, self::SAVESURL, $query_param);
        return $this->request($url, 'POST', $body_param, $this->config);
    }

    /**
     * @param $query_param
     * @return bool
     * @throws IllegalParamException
     */

    function playBack($query_param = [], $body_param = [])
    {
        $url = $this->buildUrl($this->config, self::PLAYBACKURL, $query_param);
        return $this->request($url, 'GET', $body_param, $this->config);
    }


    /**
     * @param $query_param
     * @return bool
     * @throws IllegalParamException
     */

    function snap($query_param = [], $body_param = [])
    {
        $url = $this->buildUrl($this->config, self::SNAPURL, $query_param);
        return $this->request($url, 'POST', $body_param, $this->config);
    }

    /**
     * @param $query_param
     * @return bool
     * @throws IllegalParamException
     */

    function snapshots($query_param = [], $body_param = [])
    {
        $url = $this->buildUrl($this->config, self::SNAPSHOTSURL, $query_param);
        return $this->request($url, 'GET', $body_param, $this->config);
    }


    /**
     * @param $query_param
     * @return bool
     * @throws IllegalParamException
     */

    function cover($query_param = [], $body_param = [])
    {
        $url = $this->buildUrl($this->config, self::COVERURL, $query_param);
        var_dump($url);
        return $this->request($url, 'GET', $body_param, $this->config);
    }


}
