<?php


namespace Qvs\Tools;


class Common
{

    public static function urlsafe_b64encode($string)
    {
        $find = array('+', '/');
        $replace = array('-', '_');
        return str_replace($find, $replace, base64_encode($string));
    }
}
