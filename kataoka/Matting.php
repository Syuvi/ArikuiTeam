<?php
//自身の名前
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
	//マッチングした人の名前
	//何も入力されてなかったら#####
	$enemyName="#####";
	//人数確認用
	$count=0;
	$dbh = new PDO($dsn, $user, $pw);   //接続
	//テーブルの中身を表示
	$sql='select * from JunkenState';
	$result = $dbh -> query($sql);
	
	//テーブルの中身を巡回
	foreach($result as $row){
	//自分の名前だったら返す
		if($row['name']==$name)continue;
		$enemyName=$row['name']; //敵の名前を取得
	}

	header('Access-Control-Allow-Origin: *');
	echo json_encode($enemyName);
	$dbh=NULL;
