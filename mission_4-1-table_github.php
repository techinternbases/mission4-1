<?php
//-----3-1----------
$dsn = 'mysql:dbname=tt_***_99sv_coco_com;host=localhost';
$user = 'tt-***.99sv-coco';
$password = 'PASSWORD';
$pdo = new PDO($dsn,$user,$password);

//-----3-2-----------
$sql = "CREATE TABLE mission461"
."("
."id INT not null primary key AUTO_INCREMENT,"
."name char(32),"
."comment TEXT,"
."created DATETIME"
.");";
$stmt = $pdo->query($sql);

?>
