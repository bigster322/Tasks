<?php

// Задача: Дана строка, ктр состоит из латинских букв и спец.символов,ктр являются разделителями между словами.
// Вам необходимо заменить в каждом слове N-ю букву на заданный символ.

$str = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
$delimiters = [' '];
$n = 2;
$symbol = "%";

function changeSymbols($str, $delimiters, $n, $symbol) {
  $wordsFromStr = explode($delimiters[0], $str);
  $n--;
  $newStr = '';

  foreach ($wordsFromStr as $word) {
    $word[$n] =  $symbol;
    $newStr .= $word . $delimiters[0];
  }

  return $newStr;
}


echo changeSymbols($str, $delimiters, $n, $symbol);
