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
	//人数確認用
	$count=0;
	$dbh = new PDO($dsn, $user, $pw);   //接続
	//手をリセット
	$sql='update JunkenState set hand=-1';
	$sth=$dbh->prepare($sql);
	$sth->execute();
	
	$dbh=NULL;
