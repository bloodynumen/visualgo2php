<?php

/*
 * @brief 从左侧段取基准值,通过递归合并数组,来排序
 * 
 * @param array $list 需要排序的列表
 *
 * @return array 排序后的列表
 */
function quick($list = [])
{
    if (count($list) <= 1)
    {
        return $list;
    }

    $base = array_shift($list);
    $left = [];
    $right = [];

    foreach ($list as $val)
    {
        $val > $base ? $right[] = $val : $left[] = $val;
    }
    return array_merge(quick($left), (array)$base, quick($right));
}

$list = [3, 5, 1, 2, 8, 9, 13, 123, 67, 123, 5345, 2134123, 1231, 23, 4, 5, 67, 32, 1, 0];
print_r(quick($list));
