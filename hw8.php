<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'>
    	<meta name="viewport" content="width=device-width">
		<title>hw8</title>
		<link rel="shortcut icon" href="favicon/favicon-32x32.png">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Zen+Tokyo+Zoo&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@300&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
		<script src="script.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="container" id="content-body">
			<div>
				<h1 class="title">HW8</h1>
			</div>
			<div class="zh">
				<h4 class="divider">Homework</h4>
				<div style="background-color: lightblue;">
					<i class="far fa-lightbulb"></i> 貼心提醒：點擊 <i class="fas fa-caret-square-down" style="color: gray;"></i> 可以開啟或關閉範例。
				</div>
				<?php
				echo "<pre>";
				include("/data/Chihyuanchou/test0810/notes.php");
				echo "</pre>";
				?>
			</div>
		</div>
	</body>
	<footer class="bg-dark text-center text-white ">
		<!--Copyright-->
		<div class="p-3">
			© 2021 Copyright by DebbyChou
		</div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<style type="text/css">
		.notes {
			display: none;
		}
	</style>
	<script type="text/javascript">
		function showOrHide(l){
			var ex = document.getElementById(l);
			switch(ex.style.display){
				case "none":
					ex.style.display = "block";
					break;
				case "block":
					ex.style.display = "none";
					break;	
				default:
					ex.style.display = "block";
			}
		}
	</script>
</html>