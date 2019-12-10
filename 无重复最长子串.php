<?php

# 无重复字符的最长子串

function lengthOfLongestSubstring($s) {
    $found = [];
    $res = 0;
    $len = strlen($s);
    for ($i = 0; $i < $len; $i++) {
        $current = $s[$i];

        if (isset($found[$current])) {
            $found = delete($found, $current);
        }

        $found[$current] = $i;

        $res < count($found) && $res = count($found);
    }

    return $res;
}

function delete(array $arr, $s) {
    foreach ($arr as $key => $value) {
        unset($arr[$key]);
        if ($key == $s) {
            break;
        }
    }

    return $arr;
}

$s = 'dvdf';
$string = lengthOfLongestSubstring($s);
var_dump($string);