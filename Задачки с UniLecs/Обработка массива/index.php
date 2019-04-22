<?php

/*
Задача: дан массив целых чисел. Необходимо сдвинуть нулевые элементы в конец массива,
сохранив при этом относительный порядок ненулувых элементов.
*/

$array = [0, 5, 10, 0, 12, 0, -3, 24];

function arrayTransform($arr) {
  $zeros = 0;
  for ($i = 0; $i < count($arr); $i++) {
    if ($arr[$i] == 0) {
      array_splice($arr, $i, 1);
      $i--;
      $zeros++;
    }
  }

  for ($i = 0; $i < $zeros; $i++) {
    array_push($arr, 0);
  }

  return $arr;
}

print_r(arrayTransform($array));
