<?php
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
	$dbh = new PDO($dsn, $user, $pw);   //接続
	//全てのプレイヤー情報を消す
	$sql='delete from JunkenState';
	$sth=$dbh->prepare($sql);
	$sth->execute();
	//sqlを閉じる
	$dbh=NULL;
