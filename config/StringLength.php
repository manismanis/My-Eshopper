<?php

if (!function_exists('string_limit')) {
    function string_limit($data, $length)
    {
        return substr($data, 0, $length);
    }
}