<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>１行メモの入力</title>
<link href="../../css/style.css" rel="stylesheet">
<style type="text/css">
  input.memofield {width:300px;}
</style>
</head>
<body>
<div>
  <!-- 入力フォームを作る（メモをPOSTする） -->
  <form method="POST" action="write_memofile.php">
    <ul>
      <li><label>memo：<input name="memo" class="memofield" placeholder="メモを書く"></input></label></li>
      <li><input type="submit" value="送信する"></li>
    </ul>
  </form>

</div>
</body>
</html>
