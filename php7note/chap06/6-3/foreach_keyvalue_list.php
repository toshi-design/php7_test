<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>配列から順にキーと値を取り出す</title>
</head>
<body>
<?php
$data = ["ID"=>"TR123", "商品名"=>"ピークハント", "価格"=>14500];
echo "<ul>", "\n";
// 配列から順にキーと値を取り出す
foreach($data as $key => $value){
  echo "<li>", $key, ": ", $value, "</li>\n";
}
echo "</ul>\n";
?>
</body>
</html>
