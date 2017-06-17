<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>割り勘計算</title>
  <link href="../../css/style.css" rel="stylesheet">
</head>
<body>
<div>
<?php
  require_once("../../lib/util.php");
  // 文字エンコードの検証
  if (!cken($_POST)){
    $encoding = mb_internal_encoding();
    $err = "Encoding Error! The expected encoding is " . $encoding ;
    // エラーメッセージを出して、以下のコードをすべてキャンセルする
    exit($err);
  }
  // HTMLエスケープ（XSS対策）
  $_POST = es($_POST);
?>

<?php
  // エラーメッセージを入れる配列
  $errors = [];
  // 見えないフォームからの入力値
  $discount = $_POST['discount'];
  $tanka = $_POST['tanka'];
  // フォーム入力の値
  $kosu = $_POST['kosu'];
?>

<?php
  // 入力値のチェック
  if (!ctype_digit($kosu)){
    // 整数ではないときエラー
    $errors[] = "個数は整数で入力してください。";
  }
?>

<?php
if (count($errors)>0){
  //エラーがあったとき
  echo '<ol class="error">';
  foreach ($errors as $value) {
    echo "<li>", $value , "</li>";
  }
  echo "</ol>";
} else {
  // エラーがなかったとき（端数は切り捨て）
  $price = $tanka * $kosu;
  $discount_price = floor($price * $discount);
  $off_price = $price - $discount_price;
  $off_per = (1 - $discount)*100;
  // ３桁位取り
  $tanka_fmt = number_format($tanka);
  $discount_price_fmt = number_format($discount_price);
  $off_price_fmt = number_format($off_price);
  // 表示する
  echo "単価：{$tanka_fmt}円、", "個数：{$kosu}個", "<br>";
  echo "金額：{$discount_price_fmt}円", "<br>";
  echo "（割引：-{$off_price_fmt}円、{$off_per}% OFF)", "<br>";
}
?>

<!-- 戻りボタンのフォーム -->
  <form method="POST" action="discountForm.php">
    <!-- 見えない入力に個数を設定してPOSTする -->
    <input type="hidden" name="kosu" value="<?php echo $kosu ?>">
    <ul>
      <li><input type="submit" value="戻る"></li>
    </ul>
  </form>

</div>
</body>
</html>
