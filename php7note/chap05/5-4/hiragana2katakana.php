<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ひらがなをカタカナに変換する</title>
</head>
<body>
<pre>
<?php
$yomi = "ふじのさぶろう";
$hankaku_katakana = mb_convert_kana($yomi, "h");
$zenkaku_katakana = mb_convert_kana($yomi, "C");
echo $hankaku_katakana, "\n";
echo $zenkaku_katakana, "\n";
?>
</pre>
</body>
</html>
