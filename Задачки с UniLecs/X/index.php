<?php
/*
Задачку нашел на просторах интернета. Нужно было нарисовать X текстом.
Запустите, увидите)
*/

class Grid {
private $pattern = ' - ';

private $width;
private $height;

private $shape;

  function __construct($width, $height) {
    $this->width = $width;
    $this->height = $height;
  }

  public function addShape(Shape $shape) {
    $this->shape = $shape;
  }

  public function paint() {
    $this->grid();
  }

  private function grid() {
    for ($i = 0; $i < $this->height; $i++) {
      $pos = $this->shape->position();
      for ($j = 0; $j < $this->width; $j++) {
        if ($j == $pos[0] || $j == $pos[1]) {
          echo $this->shape->pattern;
        } else {
          echo $this->pattern;
        }
      }
      $this->newString();
    }
  }

  private function newString() {
    echo "<br />";
  }
 }

 interface Shape  {}


 class XShape implements Shape {
   public $pattern = ' x ';
   private $LtR;
   private $RtL;

   function __construct($width) {
     $this->LtR = 0;
     $this->RtL = $width - 1;
   }

   public function position() {
     $currentPos = [
       $this->LtR,
       $this->RtL
     ];

     $this->LtR += 1;
     $this->RtL -= 1;

     return $currentPos;
   }
 }

$width = 19;
$height = 19;

$xShape = new XShape($width);

$test = new Grid($width, $height);
$test->addShape($xShape);
$test->paint();
