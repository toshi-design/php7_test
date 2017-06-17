<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>チェックボックス</title>
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
  // エラーを入れる配列
  $error = [];
  if (isSet($_POST["meal"])){
    // 「食事」かどうか確認する
    $meals = ["朝食","夕食"];
    // $mealsに含まれていない値があれば取り出す
    $diffValue = array_diff($_POST["meal"], $meals);
    // 規定外の値が含まれていなければOK
    if (count($diffValue)==0){
      // チェックされている値を取り出す
      $mealChecked = $_POST["meal"];
    } else {
      $mealChecked = [];
      $error[] = "「食事」に入力エラーがありました。";
    }
  } else {
    // POSTされた値がないとき
    $mealChecked = [];
  }

  // POSTされた「ツアー」を取り出す
  if (isSet($_POST["tour"])){
    // 「ツアー」かどうか確認する
    $tours = ["カヌー","MTB", "トレラン"];
    // $toursに含まれていない値があれば取り出す
    $diffValue = array_diff($_POST["tour"], $tours);
    // 規定外の値が含まれていなければOK
    if (count($diffValue)==0){
      // チェックされている値を取り出す
      $tourChecked = $_POST["tour"];
    } else {
      $tourChecked = [];
      $error[] = "「ツアー」に入力エラーがありました。";
    }
  } else {
    // POSTされた値がないとき
    $tourChecked = [];
  }
  ?>

  <?php
  // 初期値でチェックするかどうか
  function checked($value, $question){
    if (is_array($question)){
      // 配列のとき、値が含まれていればtrue
      $isChecked = in_array($value, $question);
    } else {
      // 配列ではないとき、値が一致すればtrue
      $isChecked = ($value===$question);
    }
    if ($isChecked) {
      // チェックする
      echo "checked";
    } else {
      echo "";
    }
  }
 ?>

  <!-- 入力フォームを作る（現在のページにPOSTする） -->
  <form method="POST" action="<?php echo es($_SERVER['PHP_SELF']); ?>">
    <ul>
      <li><span>食事：</span>
        <label><input type="checkbox" name="meal[]" value="朝食" <?php checked("朝食", $mealChecked); ?> >朝食</label>
        <label><input type="checkbox" name="meal[]" value="夕食" <?php checked("夕食", $mealChecked); ?> >夕食</label>
      </li>
      <li><span>ツアー：</span>
        <label><input type="checkbox" name="tour[]" value="カヌー" <?php checked("カヌー", $tourChecked) ; ?> >カヌー</label>
        <label><input type="checkbox" name="tour[]" value="MTB" <?php checked("MTB", $tourChecked); ?> >MTB</label>
        <label><input type="checkbox" name="tour[]" value="トレラン" <?php checked("トレラン", $tourChecked); ?> >トレラン</label>
      </li>
      <li><input type="submit" value="送信する" ></li>
    </ul>
  </form>

  <?php
    // 「食事」と「ツアー」のどちらかが受信されていれば結果を表示する
    $isSelected = count($mealChecked)>0 || count($tourChecked)>0;
    if ($isSelected) {
      echo "<HR>";
      // 値を”と”で連結して表示する
      echo "お食事：", implode("と", $mealChecked), "<br>";
      echo "ツアー：", implode("と", $tourChecked), "<br>";
    } else {
      echo "<HR>";
      echo "選択されているものはありません。";
    }
  ?>
  <?php
    // エラー表示
    if (count($error)>0){
      echo "<HR>";
      // 値を"<br>"で連結して表示する
      echo '<span class="error">', implode("<br>", $error), '</span>';
    }
  ?>
</div>
</body>
</html>
