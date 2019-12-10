<?php

# 选择排序
# 与冒泡排序区别：选择排序每次遍历记住当前最大最小的位置，最后只需一次交换操作
# 时间复杂度 O(n^2) 不稳定

$arr = [8, 1, 2, 3, 4, 5, 6, 7];

$len = count($arr);

for ($i = 0; $i < $len - 1; $i++) {
    $k = $i;
    for ($j = $i + 1; $j < $len; $j++) {
        if ($arr[$k] > $arr[$j]) {
            $k = $j;
        }
    }

    if ($k != $j) {
        $temp = $arr[$i];
        $arr[$i] = $arr[$k];
        $arr[$k] = $temp;
    }

    echo json_encode($arr), PHP_EOL;
}