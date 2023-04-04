<?php

function getSort(array $arr) {
    if (count($arr) < 2) return $arr;

    $start = $arr[0];
    $left = [];
    $right = [];

    for($i = 1; $i < count($arr); $i++) {
        if ($arr[$i] <= $start) {
            $left[] = $arr[$i];
        }
        if ($arr[$i] > $start) {
            $right[] = $arr[$i];
        }
    }
        
    return array_merge(getSort($left), [$start], getSort($right));
}

?>