<?php
//入ってきた人の名前を取得
$name=$_GET['name'];
//mysql処理
//-------------------------------------------------
// DB接続準備
//-------------------------------------------------
$dsn  = 'mysql:dbname=Hungry;host=127.0.0.1';   //接続先
$user = 'root';         //MySQLのユーザーID
$pw   = 'H@chiouji1';   //MySQLのパスワード
//-------------------------------------------------
// ユーザー名処理
//-------------------------------------------------
	//同じ名前がいるかどうか
	$isName=FALSE;
	
	$dbh = new PDO($dsn, $user, $pw);   //接続
	//テーブルの中身を表示
	$sql='select * from JunkenState';
	$result = $dbh -> query($sql);
	//同じ名前がいるかどうか
	foreach($result as $row){
		if($row['name']==$name) $isName=TRUE;
	}
	//いなかったらsqlに登録
	if($isName==FALSE){
	$sql = 'insert into JunkenState values(:name,-1)';//新しいデータを入れる
	$sth = $dbh->prepare($sql);         //SQL準備
	$sth->bindValue(':name', $name, PDO::PARAM_STR);
	$sth->execute();
	}
	
	header('Access-Control-Allow-Origin: *');

echo json_encode($isName);
$dbh=NULL;
