<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>hw3</title>
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
				<h1 class="title"><a href="javascript:void(0)" onclick="unlock();">HW3</a></h1>
			</div>
			<div class="zh">
				<h4 class="divider">Practice</h4>
				<pre>
					<?php
						
						$file = file_get_contents("assets/practice.txt"); //返回空值or字串
						echo "\n<u><b>Read file and output the length of file content: </b></u>\n";
						$length = strlen($file);
						echo "Length is {$length}.\n";
						$file = rtrim($file); //刪除右邊的\n\r\t\v\0
						$length = strlen($file);
						echo "After rtrim() length is {$length}.\n";
						$FirstD = file_get_contents("assets/Mon.txt");
						echo "\n<u><b>Read file and output the file content: </b></u>\n";
						echo $FirstD."\n";
						//file_put_contents("../data/chouchihyuan.txt", "hello! I am Debby.");//重整網頁才會生效，FILE_APPEND表示直接接在原檔案內容後繼續寫入
						$filename = "../data/introduction.txt";
						$intro = "周治瑗 - 新竹人 - 1999/02/13 - 水瓶座 - 鹹酥雞\n";
						//file_put_contents($filename, $intro, FILE_APPEND);
						echo "\n<u><b>Variable conditional expressions and output: </b></u>\n";
						echo "TRUE: ".TRUE."\n";
						echo "FALSE: ".FALSE."\n";
						echo "8==4: ".(8==4)."\n";
						echo "4>5: ".(4>5)."\n";
						echo "3<=8: ".(3<=8)."\n";
						echo "strlen(\"OAO\"): ".(strlen("OAO")>5)."\n";
						echo "substr_count(\"AATTCCGG\",\"T\")>1".(substr_count("AATTCCGG","T")>1)."\n";
						$judge = TRUE;
						$judge = !$judge;
						echo "\$judge: ".$judge."\n";
						$number = 10;
						if($number>5){
							echo "{$number}比5大！\n";
						}else{
							echo "{$number}不比5大！\n";
						}
						$count = 2;
						$meal = 'a';
						if($meal=='a') {
							echo "豆漿\n";
						}elseif($meal=='b') {
							echo "麥茶\n";
						}else {
							if($count==2) {
								echo "水果茶一罐\n";
							}elseif($count==1) {
								echo "紅茶\n";
							}
						}
					?>
				</pre>
				<h4 class="divider">Homework</h4>
				<ol>
					<li>將上次的Homework3結果整理並輸出為沒問題的fasta檔，命名為NAME_output.fasta。</li>
					<span>路徑在/data/public/summer2021/homework/data/CHOUCHIHYUAN_output.fasta<br></span>
					<li>在目錄外利用相對路徑與絕對路徑讀取檔案P31639.fasta輸出，</li>
						<ul>
							<li>將兩種路徑顯示出來。</li>
							<li>分別印出檔案內容。</li>
						</ul>
						<div class="ans">
							<table>
								<tr><th>絕對路徑</th></tr>
								<tr><td>/data/public/summer2021/homework/hsinjuyang/P31639.fasta</td></tr>
								<tr><td><?php
										$file = file_get_contents("/data/public/summer2021/homework/hsinjuyang/P31639.fasta");
										echo $file;
									?></td></tr>
								<tr><th>相對路徑</th></tr>
								<tr><td>../hsinjuyang/P31639.fasta</td></tr>
									<tr><td><?php
										$file = file_get_contents("../hsinjuyang/P31639.fasta");
										echo $file;
									?></td></tr>
							</table>
						</div>
					<li>已知帶有某特殊隱性、<b>母系遺傳</b>基因的牛在市場上特別有價值。今日倘若來自同一隻母牛的小牛中，有一隻為該隱性基因的表現型(flipped ear)，該群小牛有高機會為carriers，故在市場上的價值均會提高。
					檔案record.txt(see next page)中記錄了某頭母牛已出生小牛的表現型，檔案judge.php已寫好了部分的程式，請修改剩餘部分，使最後輸出判斷該群小牛:
						<ul>
							<li>”TRUE”：可能帶有該基因 或</li>
							<li>”FALSE”：目前資料顯示，不會因該基因而提高市場價值。</li>
						</ul>
					</li>
					<span class="ans">
						<?php
							require("assets/judge.php");
							echo "<pre>".$result."\n</pre>";
						?>
					</span>
					<div class="notes ans">
						<b>Notes</b><br>
						<ol>
							<li>$gene是指該群小牛是否帶有該隱性基因成為carriers，預設為false表示沒有帶該隱性基因不是carriers。</li>
							<li>可以使用三元判斷式</li>
							<code>
								$result = ($gene)?(true):(false);<br>
								echo $result;
							</code>
						</ol>
					</div>
				</ol>
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
</html>