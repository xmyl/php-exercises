<?php

# 冒泡排序法
# 比较相邻的元素，若前者大，交换位置
# 对每一组相邻元素作相同工作，从第一组至最后一组。此时的元素是最大的数
# 针对所有元素重复以上步骤，除最后一个（倒数第二已经确定顺序）
# 时间复杂度O(n^2) 稳定

$arr = [8, 7, 6, 5, 4, 3, 2, 1];
$len = count($arr);

for ($i = 0; $i < $len - 1; $i++) {
    for ($j = 0; $j < $len - $i - 1; $j++) {
        if ($arr[$j] > $arr[$j+1]) {
            $temp = $arr[$j];
            $arr[$j] = $arr[$j+1];
            $arr[$j+1] = $temp;
        }
    }

    echo json_encode($arr), PHP_EOL;
}