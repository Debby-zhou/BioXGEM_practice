<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>hw2</title>
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
				<h1 class="title"><a href="javascript:void(0)" onclick="unlock();">HW2</a></h1>
			</div>
			<div class="zh">
				<h4 class="divider">Practice</h4>
				<pre>
					<?php
						$LastName = "Chou";
						$FirstName = "Debby";
						$age = 22;
						$example = "Amy Huang";
						$BirthYear = "1999";
						echo "\n";
						echo "Name: ".$FirstName.$LastName."\n";
						echo "Age: ".$age."\n";
						echo "Example: ".$example."\n";
						echo "Ex. ".$example[4].", Hello!\n";
						echo strlen($example),"\n";
						echo $age + $BirthYear."\n";
						echo "example: ".strtolower($example)."\n";
						echo "EXAMPLE: ".strtoupper($example)."\n";
						echo str_replace("H", "*", $example)."\n";
						echo substr($example, 5)."\n";
						echo substr($example, -3)."\n";
						echo substr($example, 0, 6)."\n";
						echo substr($example, 6, -2), "\n";
						echo str_replace("De", "*$", $FirstName)."\n";
						echo "C在Chou裡面有".substr_count($LastName, "C")."個\n";
						echo (int)"20.3weeks"."\n"; 
						echo (float)"20.3weeks"."\n";
						echo (double)"20.3weeks"."\n";
						echo (int)"20+5"."\n";
						echo "<hr class=\"seperate\">";
						echo "Chih-Yuan, ".$LastName."\n";
						echo "周治瑗"."\n";
						echo "debby940406@gmail.com"."\n";
						echo "成功大學\t生命科學系\n";
						$birth = 88+2+13;
						echo "88+2+13=".$birth."\n";
						echo substr($birth, -1)."\n";
						$name = "CHOUCHIHYUAN:";
						echo $name."\n";
						$char_arr = array("A","E","I","O","U");
						foreach($char_arr as $v){
							getallcharpos($v,$name);
						}
						function getallcharpos($char,$str){
							$c = substr_count($str,$char);
							if($c==0){
								echo $char."不在此字串內\n";
								return;
							}else if($c==1){
								$result = strpos($str,$char)+1;
								echo $char."在第".$result."個位置\n";
								return;
							}else{
								for($i=0;$i<$c;$i++){
									$result[$i] = strpos($str,$char);
									$str = substr($str,$result[$i]+1);
								}
								echo $char."在第";
								foreach($result as $v){
									$f = $v+1;
									echo $f." ";
								}
								echo "個位置\n";
								return;
							}
						}	
					?>
				</pre>
			</div>
			<div class="zh">
				<h4 class="divider">Homework</h4>
				<ol>
					<div>
						<li>
							<tt>5-ACTGATCGATTACGTATAGTATTTGCTATCATTATAT-3</tt>
							<ul>
								<li>利用此DNA序列，產生其互補序列，並輸出。</li>
									<span class="ans">
										<?php
											$seq = "ACTGATCGATTACGTATAGTATTTGCTATCATTATAT";
											$result = "3-";
											for($i=0;$i<strlen($seq);$i++){
												switch($seq[$i]){
													case "A":
														$result = $result."T";
														break;
													case "T":
														$result = $result."A";
														break;
													case "C":
														$result = $result."G";
														break;
													case "G":
														$result = $result."C";
														break;
												}
											}
											echo "<tt>{$result}-5</tt>";
										?>
									</span>
								<li>計算AT在此序列出現的次數，並將其用**代替。</li>
								<span class="ans">
									<?php
										echo "此序列有".substr_count($seq,"AT")."個AT，";
										echo "<tt>5-".str_replace("AT","**",$seq)."-3</tt>";
									?>
								</span>
							</ul>
						</li>
					</div>
					<div>
						<li>
							<tt>ATCGATCGATCGATCGACTGACTAGTCATAGCTATGCATGTAGCTACTCGATCGATCGATCG</tt>
							<ul>
								<li>顯示第8個核苷酸到第27個，並計算總共有幾個核苷酸。</li>
								<span class="ans">
									<?php
										$seq = "ATCGATCGATCGATCGACTGACTAGTCATAGCTATGCATGTAGCTACTCGATCGATCGATCG";
										//有包含第27個序列
										$result = substr($seq, 7, 20);
										echo "<tt>{$result}</tt>";
										echo "，總共有".strlen($result)."個nt。";
									?>
								</span>
								<li>顯示第15個核苷酸到倒數第15個，並計算總共有幾個核苷酸。</li>
								<span class="ans">
									<?php
										//有包含倒數第15個序列
										$result = substr($seq, 14, -14);
										echo "<tt>{$result}</tt>";
										echo "，總共有".strlen($result)."個nt。\n";
									?>
								</span>
							</ul>
						</li>
					</div>
					<div>
						<li>將其三條蛋白質序列轉換成Fasta格式，將其轉為大寫，去掉非英文字之字元。
						<div>
							<table>
								<tr><th>蛋白質名稱</th><th>序列</th></tr>
								<tr>
									<td>Protein_1</td>
									<td><tt>SWPQRLDILLGTARAIQFLHQDSPSLIH</tt></td>
								</tr>
								<tr>
									<td>PROTEIN_2</td>
									<td><tt>wtmvkqsflteveqlsrfrhpnivdfagycaesgl</tt></td>
								</tr>
								<tr>
									<td>ProTein_3</td>
									<td><tt>Vkqs-RAIQFL—rhpnivdf-F-DD-s</tt></td>
								</tr>
							</table>
						</div>
						</li>
						<span class="ans">
							<?php
								$proName = array("Protein_1", "PROTEIN_2", "ProTein_3");
								$proSeq = array("SWPQRLDILLGTARAIQFLHQDSPSLIH", "wtmvkqsflteveqlsrfrhpnivdfagycaesgl", "Vkqs-RAIQFL—rhpnivdf-F-DD-s");
								function formatAsfasta($str){
									$str = strtoupper($str);
									$str = str_replace("-","",$str);
									$str = str_replace("_","",$str);
									$str = str_replace("—","",$str);
									//$str = str_replace(("-","_","—"),$str);
									return $str;
								}
								for($i=0;$i<3;$i++){
									$pro_n = formatAsfasta($proName[$i]);
									$pro_s = formatAsfasta($proSeq[$i]);
									$content = ">".$pro_n."\n".$pro_s."\n";
									//file_put_contents("../data/CHOUCHIHYUAN_output.fasta", $content, FILE_APPEND);
									echo "<pre>{$content}</pre>";
								}
							?>
						</span>
					</div>
					<div>
						<li>
						將自己的名字(英文)存成變數後，將奇數位存成一個變數，偶數位存成一個變數，再顯示出來。
						</li>
						<span class="ans">
							<?php
								$odd = "";
								$even = "";
								$myName = "CHOUCHIHYUAN";
								//從第0位開始計算，且第0位視為偶數
								for($i=0;$i<strlen($myName);$i+=2){
									$even = $even.$myName[$i];
									$odd = $odd.$myName[$i+1];
								}
								echo "<pre>偶數：{$even}\n";
								echo "奇數：{$odd}\n</pre>";
							?>
						<span>
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