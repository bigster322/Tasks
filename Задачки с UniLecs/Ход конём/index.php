<?php

// Задача: дана строка с кодом шахматного хода, например, "E2-E4".
// Необходимо определить, является ли заданный код - ходом коня.

$coords = ['E2-E4', 'B3-C1'];

function move($coord) {
  $bToN = [
    'A' => 1,
    'B' => 2,
    'C' => 3,
    'D' => 4,
    'E' => 5,
    'F' => 6,
    'G' => 7,
    'H' => 8,
  ];

  if(abs($bToN[$coord[0][0]] - $bToN[$coord[1][0]]) + abs($coord[0][1] - $coord[1][1]) == 3) {
    return 'True';
  }
  return 'False';
}

function strToCoords($str) {
  return explode('-', $str);
}

foreach ($coords as $key) {
  echo move(strToCoords($key));
  echo "<br />";
}
