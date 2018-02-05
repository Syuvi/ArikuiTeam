<?php
//mysql処理a
//-------------------------------------------------
// DB接続準備
//-------------------------------------------------
$dsn  = 'mysql:dbname=Hungry;host=127.0.0.1';   //接続先
$user = 'root';         //MySQLのユーザーID
$pw   = 'H@chiouji1';   //MySQLのパスワード
//-------------------------------------------------
// ユーザー名処理
//-------------------------------------------------
	//相手とマッチしたかどうか
	$isMatti=FALSE;
	//人数確認用
	$count=0;
	$dbh = new PDO($dsn, $user, $pw);   //接続
	//テーブルの中身を表示
	$sql='select * from JunkenState';
	$result = $dbh -> query($sql);
	
	//テーブルの中身を連装配列に
	foreach($result as $row){
		$count++;
	}
	if($count>=2)$isMatti=TRUE;

	header('Access-Control-Allow-Origin: *');
	echo json_encode($isMatti);
