<?php

# 汉诺塔问题
# 先把n-1从A搬到B，第n个从A搬到C，再重复之前的操作
# 经典的递归问题

function hanoi($n, $left, $mid, $right) {
    if ($n == 1) {
        echo "{$left} -> {$right}", PHP_EOL;
    } else {
        hanoi($n-1, $left, $right, $mid);
        echo "{$left} -> {$right}", PHP_EOL;
        hanoi($n-1, $mid, $left, $right);
    }

}

hanoi(4, 'A', 'B', 'C');