<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列を検索する</title>
</head>
<body>
<pre>
<?php
$nameList = ["田中達也", "Sam Jones", "新井貴子"];
function nameCheck($name){
  global $nameList;
  if (in_array($name, $nameList)){
    echo "メンバーです。";
  } else {
    echo "メンバーではありません。";
  }
}
// 試す
echo nameCheck("田中達也"), "\n";
echo nameCheck("新井"), "\n";
echo nameCheck("Sam Jones"), "\n";
echo nameCheck("SAM JONES"), "\n";
?>
</pre>
</body>
</html>
