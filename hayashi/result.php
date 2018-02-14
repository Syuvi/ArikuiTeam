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
			<img id="resultMen" src="image/winMen.png">
			<form action="title.html">
				<button id="titlebutton"><strong>タイトルへ</strong></button>
			</form>
		</section>
			
		<script>
			var resultwindow=document.querySelector("#resultwindow");
			var result = "<?= $result ?>";
			var resultImg = document.querySelector("#resultImg");
			var resultMen=document.querySelector("#resultMen");
			var titlebutton= document.querySelector("#titlebutton");
			if(result=="勝ち"){
				resultwindow.style.backgroundImage="url(image/win_back.jpg)";
				resultImg.src="image/kachi.png";
				resultMen.src="image/winMen.png";
			}
			else if(result=="負け"){
				resultwindow.style.backgroundImage="url(image/lose_back.jpg)";
				resultImg.src="image/make.png";
				resultMen.src="image/loseMen.png";
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
