<?php

// Задача: в газетке дан кроссворд, ктр задан таблицей N*N, где в каждой клетке таблицы указана какая-то буква.
// По правилам этого кроссворда нужно найти определенные слова, причем они должны быть расположены так, чтобы клетка,
// в ктр расположена след.буква слова, была соседней с клеткой, в ктр записана предыдущая буква.
// И кто-то уже выписал все слова из этого кроссворда.
//
// Но после того, как кроссворд разгадан, оставшиеся (неиспользованные буквы) образуют пасхалку, ктр и нужно найти.

$letters = [
  ['U', 'T', 'H', 'E'],
  ['N', 'A', 'S', 'K'],
  ['I', 'L', 'E', 'C'],
  ['L', 'L', 'O', 'S']
];

$keys = [ "TASK",  "UNILECS"];

function checkWords($letters, $words) {
  for ($i = 0; $i < 2; $i++) {
    $indexOfLetter = findFirstLetter($words[$i][0], $letters);
    $letters[$indexOfLetter[0]][$indexOfLetter[1]] = 0;
    for ($j = 1; $j < strlen($words[$i]); $j++) {
      $indexOfLetter = checkLetters($letters, $words[$i][$j], $indexOfLetter);
      $letters[$indexOfLetter[0]][$indexOfLetter[1]] = 0;
    }
  }
  return $letters;
}

function checkLetters($letters, $letter, $indexOfPrevLetter) {
  if ($indexOfPrevLetter[0] > 0) {
    if ($letters[$indexOfPrevLetter[0] - 1][$indexOfPrevLetter[1]] === $letter)
      return [$indexOfPrevLetter[0] - 1, $indexOfPrevLetter[1]];
  }
  if ($indexOfPrevLetter[1] > 0) {
    if ($letters[$indexOfPrevLetter[0]][$indexOfPrevLetter[1] - 1] === $letter)
      return [$indexOfPrevLetter[0], $indexOfPrevLetter[1] - 1];
  }
  if ($indexOfPrevLetter[1] < (count($letters[0]) - 1)) {
    if ($letters[$indexOfPrevLetter[0]][$indexOfPrevLetter[1] + 1] === $letter)
      return [$indexOfPrevLetter[0], $indexOfPrevLetter[1] + 1];
  }
  if ($indexOfPrevLetter[0] < (count($letters) - 1)) {
    if ($letters[$indexOfPrevLetter[0] + 1][$indexOfPrevLetter[1]] === $letter)
      return [$indexOfPrevLetter[0] + 1, $indexOfPrevLetter[1]];
  }
  return false;
}

function findFirstLetter($letter, $letters) {
  for ($i = 0; $i < count($letters); $i++) {
    for ($j = 0; $j < count($letters[0]); $j++) {
      if ($letters[$i][$j] == $letter) {
        return [$i, $j];
      }
    }
  }
}

function writeEasterWord($arr) {
  for ($i = 0; $i < count($arr); $i++) {
    for ($j = 0; $j < count($arr[0]); $j++) {
      if ($arr[$i][$j] !== 0) {
          echo $arr[$i][$j];
      }
    }
  }
}

$arr = checkWords($letters, $keys);
writeEasterWord($arr);
