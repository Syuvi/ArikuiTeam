<?php
	$name=$_GET['name'];
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset = "utf8">
	<title>バトル</title>
	
	<style>
		#window {
			border : 1px solid grey;
			width : 800px;
			height : 600px;
			text-align : center;
			
			background-image : url(image/game_background.jpg);
			background-size : 800px 600px;
		}
		
		#jibun {
			position : absolute;
			top : 325px;
			left : 309px;
			
			width : 200px;
			height : 200px;
		}
		
		#aite {
			position : absolute;
			top : 25px;
			left : 309px;
			
			width : 200px;
			height : 200px;
			transform: rotateZ(180deg)
		}
		
		#janken {
			position : absolute;
			top : 530px;
			left : 251px;
		}
		
		#janken > button {
			width : 100px;
			height : 30px;
		}
		
		#submit {
			position : absolute;
			top : 568px;
			left : 251px;
			
			width : 316px;
			height : 25px;
		}
		
		#update {
			position : absolute;
			top : 300px;
			left : 251px;
			
			width : 316px;
			height : 25px;
		}
		
		#next {
			position : absolute;
			top : 270px;
			left : 251px;
			
			width : 316px;
			height : 25px;
		}
		
		#jibunManpukuText {
			position : absolute;
			top : 404px;
			left : 660px;
			
			font-size : 30px;
			z-index : 3;
		}
		
		#jibunManpuku {
			position : absolute;
			top : 320px;
			left : 600px;
			
			height : 300px;
		}
		
		#jibunManpukuGage {
			position : absolute;
			top : 320px;
			left : 600px;
			
			clip: rect(0px, 640px, 100px, 0px);
			
			height : 300px;
		}
		
		#aiteManpukuText {
			position : absolute;
			top : 118px;
			left : 117px;
			
			font-size : 30px;
			z-index : 3;
		}
		
		#aiteManpuku {
			position : absolute;
			top : 0px;
			left : 60px;
			
			height : 300px;
			transform: rotateZ(180deg)
		}
		
		#aiteManpukuGage {
			position : absolute;
			top : 0px;
			left : 60px;
			
			clip: rect(0px, 640px, 170px, 0px);
			
			height : 300px;
			transform: rotateZ(180deg)
		}
		
		#kekka {
			position : absolute;
			top : 380px;
			left : 350px;
			
			font-size : 50px;
			z-index : 3;
			
			background-color : rgba(255,255,255,0.5);
		}
	</style>
	
</head>

<body>

	<section id = "window">
	
		<img id = "jibun" src = "image/janken_choki.png">
		<img id = "aite" src = "image/janken_choki.png">
		
		<form id = "janken">
			<button id = "1" type="button">グー</button>
			<button id = "2" type="button">チョキ</button>
			<button id = "3" type="button">パー</button>
		</form>
		
		<form>
			<button id = "submit" type="button">決定</button>
		</form>
		
		<form>
			<button id = "update" type="button">更新</button>
		</form>
		
		<form>
			<button id = "next" type="button">次へ</button>
		</form>
		
		<p id = "jibunManpukuText">0</p>
		<img id = "jibunManpuku" src = "image/胃の人_4.png">
		<img id = "jibunManpukuGage" src = "image/胃の人のゲージ_6.png">
		
		<p id = "aiteManpukuText">0</p>
		<img id = "aiteManpuku" src = "image/胃の人_4.png">
		<img id = "aiteManpukuGage" src = "image/胃の人のゲージ_6.png">
		
		<p id = "kekka"></p>
		
	</section>

	<script>
		//170px
		//100px 
		var playername = "<?= $name ?>";
		var myHand = -1;
		var enemyHnad = -1;
		
		var jibun = document.querySelector("#jibun");
		var aite = document.querySelector("#aite");
		var jibunGage = document.querySelector("#jibunManpukuGage");
		var aiteGage = document.querySelector("#aiteManpukuGage");
	
		var gu = document.getElementById(1);
		var choki = document.getElementById(2);
		var pa = document.getElementById(3);
		
		var submit = document.getElementById("submit");
		var update = document.getElementById("update");
		var next = document.getElementById("next");
		next.disabled = "disabled";
		
		var myManpuku = 0;
		var enemyManpuku = 0;
		
		var base = 170;
		jibunGage.style.clip = 'rect(0px, 640px, ' + (base - myManpuku * 0.7) + 'px, 0px)';
		aiteGage.style.clip = 'rect(0px, 640px, ' + (base - enemyManpuku * 0.7) + 'px, 0px)';
		
		update.disabled = "disabled"
		
		gu.addEventListener("click", function()
		{
			jibun.setAttribute("src", "image/janken_gu.png");
			myHand = 1;
		});
		
		choki.addEventListener("click", function()
		{
			jibun.setAttribute("src", "image/janken_choki.png");
			myHand = 2;
		});
		
		pa.addEventListener("click", function()
		{
			jibun.setAttribute("src", "image/janken_pa.png");
			myHand = 3;
		});
		
		submit.addEventListener("click", function()
		{
			gu.disabled = "disabled";
			choki.disabled = "disabled";
			pa.disabled = "disabled";
			
			submit.disabled = "disabled";
			
			update.disabled = "";
		});
		
		update.addEventListener("click", function()
		{
			var request = new XMLHttpRequest(); 	//PHPとやりとり
 			request.open('GET', 'http://localhost/Buttle.php?name=' + playername + '&hand=' + myHand, false);
 			request.onload = function() 
 			{ 
 				if (request.status === 200) 
 				{ //ステータスコードが200ならデータの受け渡し成功 
 					var response = request.responseText; //JSONデータを受け取る
 					var json     = JSON.parse(response); //JSで使えるようにする
 					
 					enemyHand = Number(json);
 					if(enemyHand !== -1)
 					{
 						 if((myHand === 1 && enemyHand === 1) ||
 							(myHand === 2 && enemyHand === 2) ||
 							(myHand === 3 && enemyHand === 3))
 						{
 							//あいこの画像と次の勝負へ的なボタンを出す
 							next.disabled = "";
 							kekka.innerHTML = "あいこ";
 							
 							if(enemyHand === 1)
 								aite.setAttribute("src", "image/janken_gu.png");
 							else if(enemyHand === 2)
 								aite.setAttribute("src", "image/janken_choki.png");
 							else if(enemyHand === 3)
 								aite.setAttribute("src", "image/janken_pa.png");
 						}
 						else if((myHand === 1 && enemyHand === 2) ||
 							(myHand === 2 && enemyHand === 3) ||
 							(myHand === 3 && enemyHand === 1))
 						{
 							//勝ち
 							next.disabled = "";
 							if(myHand === 1)
 								myManpuku += 1;
 							else if(myHand === 2)
 								myManpuku += 2;
 							else if(myHand === 3)
 								myManpuku += 5;
 							
 							if(enemyHand === 1)
 								aite.setAttribute("src", "image/janken_gu.png");
 							else if(enemyHand === 2)
 								aite.setAttribute("src", "image/janken_choki.png");
 							else if(enemyHand === 3)
 								aite.setAttribute("src", "image/janken_pa.png");
 								
 							jibunManpukuText.innerHTML = myManpuku;
 							
 							kekka.innerHTML = "勝ち！";
 							
 							jibunGage.style.clip = 'rect(0px, 640px, ' + (base - myManpuku * 0.7) + 'px, 0px)';
 						}
 						else if((myHand === 1 && enemyHand === 3) ||
 							(myHand === 2 && enemyHand === 1) ||
 							(myHand === 3 && enemyHand === 2))
 						{
 							//負け
 							next.disabled = "";
 							if(enemyHand === 1)
 								enemyManpuku += 1;
 							else if(enemyHand === 2)
 								enemyManpuku += 2;
 							else if(enemyHand === 3)
 								enemyManpuku += 5;
 								
 							if(enemyHand === 1)
 								aite.setAttribute("src", "image/janken_gu.png");
 							else if(enemyHand === 2)
 								aite.setAttribute("src", "image/janken_choki.png");
 							else if(enemyHand === 3)
 								aite.setAttribute("src", "image/janken_pa.png");
 								
 							aiteManpukuText.innerHTML = enemyManpuku;
 							
 							kekka.innerHTML = "負け！";
 							
 							aiteGage.style.clip = 'rect(0px, 640px, ' + (base - enemyManpuku * 0.7) + 'px, 0px)';
 						}
 					}
 					else
 					{
 					}

 				} 
 			}; 
 			request.onerror = function() 
 			{ 
 				//エラー時の処理 
 				canvas.innerHTML = "Error!"; 
 			}; 
 			//送信 
 			request.send();		//POSTの場合は引数に文字列を渡す 
		});
		
		next.addEventListener("click", function()
		{
			gu.disabled = "";
			choki.disabled = "";
			pa.disabled = "";
			
			submit.disabled = "";
			update.disabled = "disabled";
			next.disabled = "disabled";
			
			kekka.innerHTML = "";
			
			var request = new XMLHttpRequest(); 	//PHPとやりとり
 			request.open('GET', 'http://localhost/Buttle.php?name=' + playername + '&hand=' + myHand, false);
 			request.onload = function() 
 			{ 
 				if (request.status === 200) 
 				{ //ステータスコードが200ならデータの受け渡し成功 
 					var response = request.responseText; //JSONデータを受け取る
 					var json     = JSON.parse(response); //JSで使えるようにする
 				} 
 			}; 
 			request.onerror = function() 
 			{ 
 				//エラー時の処理 
 				canvas.innerHTML = "Error!"; 
 			}; 
 			//送信 
 			request.send();		//POSTの場合は引数に文字列を渡す 
		});
	
	</script>

</body>

</html>
