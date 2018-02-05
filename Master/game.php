<?php
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset = "utf8">
	<title>ノベルゲーム</title>
	
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
		
		<p id = "jibunManpukuText">0</p>
		<img id = "jibunManpuku" src = "image/胃の人_4.png">
		<img id = "jibunManpukuGage" src = "image/胃の人のゲージ_6.png">
		
		<p id = "aiteManpukuText">0</p>
		<img id = "aiteManpuku" src = "image/胃の人_4.png">
		<img id = "aiteManpukuGage" src = "image/胃の人のゲージ_6.png">
		
	</section>

	<script>
		//170px
		//100px 
	
		var jibun = document.querySelector("#jibun");
		var aite = document.querySelector("#aite");
	
		var gu = document.getElementById(1);
		var choki = document.getElementById(2);
		var pa = document.getElementById(3);
		
		var submit = document.getElementById("submit");
		var update = document.getElementById("update");
		
		gu.addEventListener("click", function()
		{
			jibun.setAttribute("src", "image/janken_gu.png");
		});
		
		choki.addEventListener("click", function()
		{
			jibun.setAttribute("src", "image/janken_choki.png");
		});
		
		pa.addEventListener("click", function()
		{
			jibun.setAttribute("src", "image/janken_pa.png");
		});
		
		submit.addEventListener("click", function()
		{
			gu.disabled = "disabled";
			choki.disabled = "disabled";
			pa.disabled = "disabled";
		});
		
		update.addEventListener("click", function()
		{
			gu.disabled = "";
			choki.disabled = "";
			pa.disabled = "";
		});
	
	</script>

</body>

</html>
