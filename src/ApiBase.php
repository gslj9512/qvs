<?php

namespace Qvs\Src;

use GuzzleHttp\Exception\GuzzleException;
use Qvs\Src\Exception\IllegalParamException;
use Qvs\Tools\Common;

abstract class ApiBase
{
    /**
     * @param $config
     * @param $url
     * @param array $query
     * @return string
     * @throws IllegalParamException
     */
    function buildUrl($config, $url, $query = [])
    {
        if (!empty($query)) {
            $query_extend = [];
            foreach ($query as $key => $value) {
                $query_extend['{' . $key . '}'] = $value;
            }
            $url = strtr($url, $query_extend);
        }

        try {

            return "{$config["protocol"]}://{$config["api_url"]}{$url}";
        } catch (\Exception $exception) {
            throw new IllegalParamException($exception);
        }
    }


    function buildToken($config, $url, $body_param, $method)
    {
        $url_array = parse_url($url);
        $data = "$method {$url_array['path']}";
        if (isset($url_array['query'])) {
            $data .= '?' . $url_array['query'];;
        }
        $data .= "\nHost: {$url_array['host']}";
        if (!empty($body_param)) {
            $data .= "\nContent-Type: application/json";
        }
        $data .= "\n\n";
        if (!empty($body_param)) {
            $data .= json_encode($body_param);
        }
        $sign = hash_hmac('sha1', $data, $config["secret_key"], true);
        $encode_sign = Common::urlsafe_b64encode($sign);
        return "Qiniu {$config['access_key']}:{$encode_sign}";
    }


    function request($url, $method, $data, $config)
    {
        $authorization = $this->buildToken($config, $url, $data, $method);
        $headers["Host"] = $config["api_url"];
        if (!empty($data)) {
            $headers['Content-Type'] = "application/json";
        }
        $headers['Authorization'] = $authorization;
        $client = new \GuzzleHttp\Client();
        $request_data = [
            'headers' => $headers
        ];
        if ($data) {
            $request_data['json'] = $data;
        }
        try {
            $resp = $client->request($method, $url, $request_data);
            $content = $resp->getBody()->getContents();
            return json_decode($content, true);
        } catch (GuzzleException $e) {
            return false;
        }
    }

}
