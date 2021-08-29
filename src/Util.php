<?php
namespace CbzShopify;


class Util
{
    public static function implodeIfArray($array, $separator=',') {
        return (is_array($array)) ? implode($separator, $array) : $array;
    }
}