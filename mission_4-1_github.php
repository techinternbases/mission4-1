
<?php
//データベースの情報
header('Content-Type: text/html; charset=UTF-8');
$dsn = 'mysql:dbname=tt_***_99sv_coco_com;host=localhost';
$user = 'tt-***.99sv-coco';
$password = 'PASSWORD';
$pdo = new PDO($dsn,$user,$password);

  //受け取って
$name = $_POST['name'];
$comment = $_POST['comment'];
$pass = $_POST['pass'];
$edit = $_POST['edit'];
$delete = $_POST['delete'];

  //データの入力
if(!empty($_POST['name']) && !empty($_POST['comment']) && empty($_POST['edit'])) {
  $sql = $pdo -> prepare("INSERT INTO mission4(name,comment,times)VALUES(:name,:comment,:times)");
  $sql -> bindParam(':name',$name,PDO::PARAM_STR);
  $sql -> bindParam(':comment',$comment,PDO::PARAM_STR);
  $sql -> bindParam(':times',$times,PDO::PARAM_STR);
    $times = date("Y/m/d G:i:s");
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $sql -> execute();
}

  //------編集機能--------
$edit = $_POST['edit'];
if(!empty($edit)){
  if(($pass == "パス") && !empty($name) && !empty($comment)) {
    $id = $edit;
    $nm = $name;
    $kome = $comment;
    $sql = "update mission4 set id = '$edit',name = '$nm',comment = '$kome'where id = $edit";
    $result = $pdo -> query($sql);
  }else{
    echo "編集したいID、編集後の名前、コメント、パスワードの4つを入力したうえで送信ボタンを押してください";
  }
}
  //------削除機能------------
if(!empty($delete)){
  if($pass == "パス") {
    $delete = $_POST['delete'];
    $sql ="delete from mission4 where id = $delete";
    $result = $pdo->query($sql);
  }else{
    echo "パスワードが違います";
  }
}
?>
<html>
<head>
<title="mission_4-1">
</head>
<body>
  <form action="" method="post">
    <input type="text" name="name" value="" placeholder="名前は？"/><br>
    <input type="text" name="comment" value="" placeholder="コメント？"/><br>
    <input type="text" name="pass" value="" placeholder="パスワード"/><br>
    <input type="text" name="edit" placeholder="編集番号"/><br>
    <input type="text" name="delete" value="" placeholder="削除"/>
    <input type="submit" name="" value="送信"/><br>
  </form>
</body>
</html>
<?php
//-----入力したデータを表示-----------

$sql = 'SELECT*FROM mission4';
$results = $pdo -> query($sql);
foreach($results as $row){
echo $row['id'].',';
echo $row['name'].',';
echo $row['comment'].',';
echo $row['times'].'<br>';
}

?>
