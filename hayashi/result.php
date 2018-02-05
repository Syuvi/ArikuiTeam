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
				<button><strong>タイトルへ</strong></button>
			</form>
		</section>
			
		<script>
			var result = "<?= $result ?>";
			var resultImg = document.querySelector("#resultImg");
			if(result=="勝ち"){
				resultImg.src="image/kachi.png";
			}
			else if(result=="負け"){
				resultImg.src="image/make.png";
			}
			
		</script>
	</body>
</html>
