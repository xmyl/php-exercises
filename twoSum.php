<?php

$arr = range(1, 100);

function twoSum(array $arr, $target) {
    $found = [];

    foreach ($arr as $key => $value) {
        $diff = $target - $value;
        if (isset($found[$diff])) {
            return [$found[$diff], $key];
        }

        $found[$value] = $key;
    }

    return [];
}

var_dump(twoSum($arr));die;