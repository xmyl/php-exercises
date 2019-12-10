<?php

# 一共m个猴子，数到n的剔除
function king($m, $n) {
    $arr = range(1, $m);
    $i = 0;
    while (count($arr) > 1) {
        if (($i+1) % $n != 0) {
            $arr[] = $arr[$i];
        }
        unset($arr[$i]);
        echo json_encode($arr), PHP_EOL;
        $i++;
    }

    return current($arr);
}

$k = king(10, 3);