<?php
require_once realpath(__DIR__ . '/vendor/autoload.php');

define('RESOURCES_PATH', realpath(__DIR__.'/resources').'/');

if (! function_exists('vd'))
{
    function vd($var)
    {
        array_map(function($x) { var_dump($x); }, func_get_args());
        die;
    }
}