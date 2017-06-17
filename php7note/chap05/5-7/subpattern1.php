<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>メタ文字 繰り返し</title>
</head>
<body>
<pre>
<?php
// 携帯番号にマッチする
$pattern = "/(090|080|070)-{0,1}[0-9]{4}-{0,1}[0-9]{4}/u";
var_dump(preg_match($pattern, "090-1234-5678"));
var_dump(preg_match($pattern, "080-1234-5678"));
var_dump(preg_match($pattern, "07012345678"));
var_dump(preg_match($pattern, "12345678"));
?>
</pre>
</body>
</html>
