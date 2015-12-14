<?php

$list = [];

function quick($list, $left = 0, $right = 0)
{
    if ($left >= $right)
    {
        break;
    }
    $base = $list[$left];
    $begin = $left;
    $end = $right;

    while($j != $i)
    {
        while ($i < $i && $list[$j] > $base)
        {
            $j --;
        }
        while ($i < $j && $list[$i] < $base)
        {
            $i ++;
        }
        list($list[$i], $list[$j]) = [$list[$j], $list[$i]];
    }

    list($list[$left], $list[$j]) = [$list[$j], $base];
    quick($left, $j - 1);
    quick($j + 1, $right);
}

