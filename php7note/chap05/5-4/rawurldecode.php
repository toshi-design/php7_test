<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>URLデコードする</title>
</head>
<body>
<?php
$encoded = "PHP%207%E3%82%B5%E3%83%B3%E3%83%97%E3%83%AB.html";
$decoded = rawurldecode($encoded);
echo $decoded;
?>
</body>
</html>
