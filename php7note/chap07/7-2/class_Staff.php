<?php
class Staff{
  public $name;
  public $age;
  
  public function hello(){
    echo "はい";
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>クラスを定義する</title>
</head>
<body>
<pre>
  <?php
  $toshi = new Staff();
  $haru = new Staff();
  
  $toshi->age = 25;
  $toshi->name = "とし";
  
  $haru->name = "はるみ";
  $haru->age = 26;
  
  ver_dump($toshi);
  print_r($haru);
  
  
  ?>
</pre>
</body>
</html>
