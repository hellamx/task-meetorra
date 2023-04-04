<?php

/* 
    Генерация массива со случайными числами
    qtyArrs - количество вложенных массивов
    qtyNums - количество элементов во вложенных массивах
*/

function getRandom(int $qtyArrs, int $qtyNums) {
	$arr = [];

	for ($i = 0; $i < $qtyArrs; $i++) {
		$arr[$i] = [];

		for ($k = 0; $k < $qtyNums; $k++) {
			$arr[$i][$k] = rand(1, 1111);
		}
	}
	return $arr;
}

?>