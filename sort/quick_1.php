<?php

/*
 * @brief 从左侧段取基准值,通过交换位置,来达到排序的目的
 * 
 * @param array $list 需要排序的列表
 * @param int $left 左侧起始位置
 * @param int $right 右侧起始位置
 *
 * @return null
 */
function quick(&$list, $left = 0, $right = 0)
{
    if ($left >= $right)
    {
        return;
    }
    $base = $list[$left];
    $i = $left;
    $j = $right;

    while($j != $i)
    {
        # 先找小于base的值
        while ($i < $j && $list[$j] >= $base)
        {
            $j --;
        }
        # 再找大于base的值
        while ($i < $j && $list[$i] <= $base)
        {
            $i ++;
        }
        if ($j != $i)
        {
            $tmp = $list[$i];
            $list[$i] = $list[$j];
            $list[$j] = $tmp;
        }
    }

    # 相遇时的值 一定小于或等于base
    $tmp = $list[$j];
    $list[$j] = $base;
    $list[$left] = $tmp;

    quick($list, $left, $j - 1);
    quick($list, $j + 1, $right);
}

$list = [3, 5, 1, 2, 8, 9, 13, 123, 67, 123, 5345, 2134123, 1231, 23, 4, 5, 67, 32, 1, 0];
print_r($list);

quick($list, 0, count($list) - 1);
print_r($list);
