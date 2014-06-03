<?php
require_once realpath(__DIR__ . '/vendor/autoload.php');

if (! function_exists('vd'))
{
    function vd($var)
    {
        var_dump($var);
        die;
    }
}