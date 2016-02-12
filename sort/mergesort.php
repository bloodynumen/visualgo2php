<?php

function merge($arr1, $arr2) {
    if (!$arr1) {
        return $arr2;
    }
    if (!$arr2) {
        return $arr1;
    }
    $sorted = [];
    $i = 0;
    $j = 0;
    $arr1_len = count($arr1);
    $arr2_len = count($arr2);
    while(true) {
        if ($i == $arr1_len) {
            if ($j < $arr2_len) {
                $sorted = array_merge($sorted, array_slice($arr2, $j));
            }
            break;
        }
        if ($j == $arr2_len) {
            if ($i < $arr1_len) {
                $sorted = array_merge($sorted, array_slice($arr1, $i));
            }
            break;
        }
        if ($arr1[$i] < $arr2[$j]) {
            $sorted[] = $arr1[$i];
            $i ++;
        } else {
            $sorted[] = $arr2[$j];
            $j ++;
        }
    }
    return $sorted;
}

function sort_item($chunks = []) {
    foreach ($chunks as $k => $item) {
        if (count($item) == 2) {
            if ($item[0] > $item[1]) {
                $chunks[$k] = [$item[1], $item[0]];
            }
        }
    }
    return $chunks;
}

function merger($list) {
    $len = count($list);
    $chunks = array_chunk($list, 2);
    $chunks = sort_item($chunks);

    $container = array_chunk($chunks, 2);
    while(true) {
        foreach ($container as $k => $item) {
            if (count($item) == 1) {
                $container[$k] = $item[0];
            } else {
                $container[$k] = merge($item[0], $item[1]);
            }
        }
        if (count($container[0]) == $len) {
            break;
        }
        $container = array_chunk($container, 2);
    }

    return $container[0];
}

$list = [3, 5, 1, 2, 8, 9, 13, 123, 67, 123, 5345, 2134123, 1231, 23, 4, 5, 67, 32, 1, 0, 8, 999];
print_r($list);

$list = merger($list);
print_r($list);
