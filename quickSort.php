<?php

# 快速排序
# 从序列中挑出第一个元素作为基准
# 把所有比基准值小的元素放在基准前面，反之放后面
# 对每个分区递归执行以上步骤，递归结束的条件为序列的大小是0或1，此时有序
# 时间复杂度最差 O(n^2) 不稳定

function quickSort($arr) {
    $len = count($arr);
    if ($len <= 1) {
        return $arr;
    }

    $mid = $arr[0];
    $left = $right = [];

    for ($i = 1; $i < $len; $i++) {
        if ($arr[$i] < $mid) {
            $left[] = $arr[$i];
        } else {
            $right[] = $arr[$i];
        }
    }

    $left = quickSort($left);
    $right = quickSort($right);

    return array_merge($left, [$mid], $right);
}

$arr = [8, 7, 6, 5, 4, 3, 2, 1];
echo json_encode(quickSort($arr));