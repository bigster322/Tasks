<?php
/*
Задача: Дан массив целых чисел - arr[]. Необходимо выяснить, есть ли такие два различных индекса i, j в массиве,
что arr[i] == arr[j] и абсолютная разность между ними не более K ( |i - j| <= k). 
*/

$arr = [1, 0, 1, 1];
$k = 1;

function duplicates($arr, $k) {
  for ($i = 0; $i < count($arr); $i++) {
    for ($j = 1 + $i; $j < count($arr); $j++) {
      if ($arr[$i] == $arr[$j] && abs($i - $j) <= $k) {
        return 'true';
      }
    }
  }
  return 'false';
}

echo duplicates($arr, $k);
