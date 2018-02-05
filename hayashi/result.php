<?php
//勝ち負けを取得
$result=$_GET['result'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8">
		<title>ハングリーじゃんけん</title>	
		<link rel="stylesheet" href="css/style_result.css">
	</head>
	<body>
		<section id="resultwindow">
			<h1>結果発表</h1>	
			<img id="resultImg" src="image/kachi.png">
			<form action="title.html">
				<button id="titlebutton"><strong>タイトルへ</strong></button>
			</form>
		</section>
			
		<script>
			var result = "<?= $result ?>";
			var resultImg = document.querySelector("#resultImg");
			var titlebutton= document.querySelector("#titlebutton");
			if(result=="勝ち"){
				resultImg.src="image/kachi.png";
			}
			else if(result=="負け"){
				resultImg.src="image/make.png";
			}
			titlebutton.addEventListener("click", function(){
				var request = new XMLHttpRequest(); 	//PHPとやりとり
 				request.open('GET', 'http://localhost/AllReset.php', false); //1:GETかPOST 2:ファイル指定 3:同期か非同期か
 				request.onload = function() { 
 					if (request.status === 200) { //ステータスコードが200ならデータの受け渡し成功 
 						var response = request.responseText; //JSONデータを受け取る
 						var json     = JSON.parse(response); //JSで使えるようにする
 					} 
 				}; 
 				request.onerror = function() { 
 				//エラー時の処理 
 				canvas.innerHTML = "Error!"; 
 				}; 
 				//送信 
 				request.send();		//POSTの場合は引数に文字列を渡す 
			});
		</script>
	</body>
</html>
