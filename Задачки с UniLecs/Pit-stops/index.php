<?php

/*
Задача: на кольцевом треке расположены N пит-стопов. Если у спорткара случилась поломка или закончилось топливо,
то пилот может доехать до ближайшего пит-стопа (можно сдать назад до пит-стопа, если он находится ближе всех).

Необходимо определить максимально возможное расстояние до ближайшего пит-стопа в случае поломки или нехватки топлива.
*/

$pitStops = [4.5, 0.5, 2, 1];
$length = 5;

function longestWay($arr, $len) {
  $longestWay = $arr[0] + ($len - $arr[count($arr) - 1]);

  for ($i = 0; $i < (count($arr) - 1); $i++) {
    $currentDistance = $arr[$i + 1] - $arr[$i];
    if ($currentDistance > $longestWay) {
      $longestWay = $currentDistance;
    }
  }

  return $longestWay / 2;
}

function quickSort($arr) {
  $sortedArr = [];
  $unsortedArr = $arr;
  $count = count($unsortedArr);

  for ($i = 0; $i < $count; $i++) {
    $lowest = $unsortedArr[0];
    $indexOfLowest = 0;
    for ($j = 0; $j < count($unsortedArr); $j++) {
      if ($unsortedArr[$j] < $lowest) {
        $lowest = $unsortedArr[$j];
        $indexOfLowest = $j;
      }
    }
    $sortedArr[$i] = $lowest;
    array_splice($unsortedArr, $indexOfLowest, 1);
  }

  return $sortedArr;
}

echo longestWay(quickSort($pitStops), $length);
