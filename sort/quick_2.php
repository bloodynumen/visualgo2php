<?php

function quick($arr = [])
{
    if (count($arr) <= 1)
    {
        return $arr;
    }

    $base = $arr[0];
    $left = [];
    $right = [];

    foreach ($arr as $val)
    {
        $val > $base ? $right[] = $val : $left[] = $val;
    }

    return array_merge(quick($left), [$base], $quick($right));
}
