<?php

namespace Qvs\Src;


use Qvs\Src\Exception\ClassNotFoundException;

class Application
{
    private $config = [
        "api_url" => "",
        "protocol" => "",
        "access_key" => "",
        "secret_key" => ""
    ];

    public function __construct($config = [])
    {
        $this->config = array_merge($this->config, $config);
    }

    /**
     * @param $class
     * @return object
     * @throws ClassNotFoundException
     */
    function getInstance($class)
    {
        try {
            $reflect = new \ReflectionClass("\\Qvs\\Src\\Ability\\{$class}");
            return $reflect->newInstanceArgs([$this->config]);
        } catch (\ReflectionException $e) {
            throw new ClassNotFoundException($e);
        }
    }
}
