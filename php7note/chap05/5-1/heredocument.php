<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ヒアドキュメント</title>
</head>
<?php
$version = 7;
$msg = <<< "EOD"
これから一緒に"PHP $version"を学びましょう。
本気出すよ。
EOD;
// ヒアドキュメントを表示する
echo $msg;
?>
</body>
</html>
