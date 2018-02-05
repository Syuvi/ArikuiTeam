<?php
//あいうえお
$name=$_GET['name'];
$hand=$_GET['hand'];;
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
	//自身の手
	$myHand=-1;
	//自分の名前の手を確かめる
	$sql = 'select * from JunkenState where name=:name';
	$sth=$dbh->prepare($sql);
	$sth->bindValue(':name', $name, PDO::PARAM_STR);
	$sth->execute();
	//１人しかいない前提で核
	//自身の手を代入
	$result=$sth->fetch();
	$myHand=$result['hand'];
	
	//手が決まってなかったら手を変更
	if($myHand==-1){
	$sql='update JunkenState set hand=:hand where name=:name';
	$sth=$dbh->prepare($sql);
	$sth->bindValue(':name', $name, PDO::PARAM_STR);
	$sth->bindValue(':hand', $hand, PDO::PARAM_INT);
	$sth->execute();
	}
	
	//テーブルの中身を表示
	$sql='select * from JunkenState';
	$sth=$dbh->prepare($sql);
	$result = $dbh -> query($sql);
	$data=array();
	//テーブルの中身を連装配列に
	foreach($result as $row){
		$name=$row['name'];
		$hand=$row['hund'];
	   	$data[$name]=$hand;
	}

	header('Access-Control-Allow-Origin: *');
	echo json_encode($data);
