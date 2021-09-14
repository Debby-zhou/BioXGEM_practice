<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>hw6</title>
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
				<h1 class="title">HW6&7</h1>
			</div>
			<div class="zh">
				<h4 class="divider">Practice</h4>
					<?php
						error_reporting(E_ALL);
						echo "<pre>";
						echo "<u><b>Write a program to calculate a geometric series of constant ratio = 1/2: </b></u>\n";
						$power = 1;
						$s = 0;
						//法一
						for($i=0;$power>=1E-4;$i++){
							$s += $power;
							$power /= 2;
						}
						echo "By for loop: S = {$s}\n";
						//法二
						$power = 1;
						$s = 0;
						while($power>=1E-4){
							$s += $power;
							$power /= 2;
						}
						$s = round($s,4);
						echo "By while loop and round(\$s,4): S = {$s}\n";

						echo "<hr><u><b>隨堂練習</b></u>\n";
						$n = 0;
						$num = 0;
						while($n<20){
							$num = rand(0,100);
							if($num<20){ echo "*"; }
							elseif($num>=20 && $num<50){ echo "-"; }
							elseif($num>=50){ echo "#"; }
							$n++;
						}
						$str_len_count = "abcdefghijklmnopqrstuvwhyz";
						$count = 0;
						while($str_len_count[$count]){
							$count++;
						}
						echo "\n<u><b>Replace the function of strlen() by while loop: </b></u>\n";
						echo "\"abcdefghijklmnopqrstuvwhyz\" length is {$count}.\n<hr>";
						echo "<u><b>BMI Funciton: </b></u>\n";
						function BMI($h,$w){
							static $c = 0;
							$h /= 100;
							$bmi = $w/($h*$h);
							$c++;
							echo "times:{$c} ";
							return $bmi;
							//echo $bmi;
						}

						function advancedBMI($h,$w,$r=2){
							if($h>50 && $h<300){ $h /= 100; }
								$bmi = round($w/($h*$h),$r);
								return $bmi;
							
						}

						function globalBMI(){
							global $H;
							global $W;
							$H /= 100;
							$bmi = $W/($H*$H);
							return $bmi;
						}
						echo "basic1: ".BMI(164,50)."\n";
						echo "basic2: ".BMI(164,50)."\n";
						echo "advanced given 4: ".advancedBMI(164,50,4)."\n";
						echo "advanced with default: ".advancedBMI(164,50)."\n";
						$H = 164;
						$W = 50;
						echo "use global variable => global height is {$H} and global weight is {$W}: ".globalBMI()."\n";
						echo "\n<u><b>Write a function to replace strlen(): </b></u>\n";
						function length($string_to_count){
							static $times = 0;
							$c = 0;
							while($string_to_count[$c]){
								$c++;
							}
							$times++;
							echo "times: {$times} ";
							return $c;
						}
						echo "\"abcdefg\" length is ".length("abcdefg").".\n";
						echo "\"hijklmnop\" length is ".length("hijklmnop").".\n";
						echo "\n<u><b>Assert function: </b></u>\n";
						echo "<span class=\"notes\">*Please use linux to show the output(warnings).</span>\n";
						assert(globalBMI()==$W/$H/$H);
						echo "</pre>";
					?>
				<h4 class="divider">Homework</h4>
				<ol>
					<li>讀入[IRAK_aligm_msa.txt]，如果為 IRAK1 序列，去掉 - ，如果為 IRAK2 序列，換成小寫 StrToLower($name);，如果為IRAK3 序列，擷取第10到50序列輸出，如果為 IRAK4 序列，依以下格式輸出檔案。
					</li>
						<span class="ans">
							<?php
								echo "<pre>";
								$result = array();
								$result["IRAK1"] = array();
								$result["IRAK2"] = array();
								$result["IRAK3"] = array();
								$result["IRAK4"] = array();
								$file = file_get_contents("assets/IRAK_align_msa.txt");
								$file = trim($file);
								$line = explode("\n",$file);
								for($i=0;$i<count($line);$i++){
									$info = explode("|",$line[$i]);
									$family_and_others = explode("_",$info[2]);
									$species_and_seqs = explode("\t",$family_and_others[1]);
									$species_and_seqs[0] = trim($species_and_seqs[0]);
									$family = $family_and_others[0];
									$species = $species_and_seqs[0];
									$seq = $species_and_seqs[1];
									switch($family){
										case "IRAK1":
											$seq = str_replace("-", "", $seq);
											$result["IRAK1"][$species] = $seq;
											break;
										case "IRAK2":
											$seq = StrToLower($seq);
											$result["IRAK2"][$species] = $seq;
											break;
										case "IRAK3":
											$seq = substr($seq,10,41);
											$result["IRAK3"][$species] = $seq;
											break;
										case "IRAK4":
											$result["IRAK4"][] = $species."\t".$seq;
											break;
									}									
								}
								print_r($result);
								echo "</pre>";
							?>
						</span>
					<li>利用while輸出九九乘法表。</li>
						<span class="ans">
							<?php
								echo "<pre>";
								$i = 1;
								while($i<10){
									$j = 1;
									while($j<10){
										$mul = $i*$j;
										echo "{$j}*{$i}={$mul}\t";
										$j++;
									}
									echo "\n";
									$i++;
								}
								echo "</pre>";
							?>
						</span>
					<li>寫一個自訂函式，能通過以下所有檢驗。</li>
						<ul>
							<li>Assert( My_function ("APPLE", "p") == 4 );</li>
							<li>Assert( My_function ("summersummer", "m") == 16 );</li>
							<li>Assert( My_function ("ATCG", "A") == 1 );</li>
							<li>Assert( My_function ("Salmon", "g") == 0 );</li>
						</ul>
						<span class="ans">
							<?php
								function posAndSquare($clips,$srch){
									$t = substr_count($clips,$srch);
									return $t*$t;
								}
								echo "<pre>";
								echo "posAndSquare(\"APPLE\",\"P\") = ".posAndSquare("APPLE", "P")."\n";
								echo "posAndSquare(\"summersummer\",\"m\") = ".posAndSquare("summersummer", "m")."\n";
								echo "posAndSquare(\"ATCG\",\"A\") = ".posAndSquare("ATCG", "A")."\n";
								echo "posAndSquare(\"Salmon\",\"g\") = ".posAndSquare("Salmon", "g")."\n";
								echo "</pre>";
							?>
						</span>
					<li>胺基酸可簡略分為疏水性胺基酸與親水性胺基酸，其中疏水性胺基酸包含 A,V,I,L,M,F,Y,W，請寫一個自訂函式，通過以下檢驗。</li>
						<ul>
							<li>Assert( My_Function( "PELGLVPSPASLWPPPPSPAPSSTK", Array("A") ) == 8 );</li>
							<li>Assert( My_Function( "PELGLVPSPASLWPPPPSPAPSSTK", Array("A", "V") ) == 12 );</li>
							<li>Assert( My_Function( "PELGLVPSPASLWPPPPSPAPSSTK", Array("A", "L", "V") ) == 24 );</li>
							<li>Assert( My_Function( "PELGLVPSPASLWPPPPSPAPSSTK" ) == 28 );</li>
						</ul>
						<span class="ans">
							<?php
								function hydrophobic($seq,$aa=array("A","V","I","L","M","F","Y","W")){
									$c = 0;
									foreach($aa as $v){
										$c += 4*substr_count($seq,$v);
									}
									return $c;
								}
								echo "<pre>";
								echo "hydrophobic(\"PELGLVPSPASLWPPPPSPAPSSTK\",array(\"A\")) = ".hydrophobic("PELGLVPSPASLWPPPPSPAPSSTK",array("A"))."\n";
								echo "hydrophobic(\"PELGLVPSPASLWPPPPSPAPSSTK\",array(\"A\",\"V\")) = ".hydrophobic("PELGLVPSPASLWPPPPSPAPSSTK",array("A","V"))."\n";
								echo "hydrophobic(\"PELGLVPSPASLWPPPPSPAPSSTK\",array(\"A\",\"L\",\"V\")) = ".hydrophobic("PELGLVPSPASLWPPPPSPAPSSTK",array("A","L","V"))."\n";
								echo "hydrophobic(\"PELGLVPSPASLWPPPPSPAPSSTK\") = ".hydrophobic("PELGLVPSPASLWPPPPSPAPSSTK")."\n";
								echo "</pre>";
							?>
						</span>
					<li>寫一個函式turnGrade()，將分數成績(整數)陣列$record = array(75, 98, 27, 97, 34, 86, 64)轉換為等級成績，要求如下。</li>		<ul>
							<li>利用global變數</li>
							<li>不須返回值，直接將等級成績存入原本的$record</li>
						</ul>
						<table>
							<tr><th>分數</th><th>等級</th></tr>
							<tr><td>90-100</td><td>A</td></tr>
							<tr><td>80-89</td><td>B</td></tr>
							<tr><td>70-79</td><td>C</td></tr>
							<tr><td>0-69</td><td>D</td></tr>
						</table>
						<span class="ans">
							<?php
								echo "<pre>";
								function turnGrade(){
									global $record;
									for($i=0;$i<count($record);$i++){
										if($record[$i]>=90 && $record[$i]<=100){ $record[$i] = "A"; }
										elseif($record[$i]>=80 && $record[$i]<90){ $record[$i] = "B"; }
										elseif($record[$i]>=70 && $record[$i]<80){ $record[$i] = "C"; }
										else{ $record[$i] = "D"; }
									}
									print_r($record);
								}
								$record = array(75, 98, 27, 97, 34, 86, 64);
								turnGrade();
								echo "</pre>";
							?>
						</span>
					<li>利用html input tag搭配 while()迴圈，將所有輸入的數字(十進位，最高到十位數)，均轉換為十六進位輸出</li>
					<span class="ans" id="conversion">
						<form action="hw6.php#conversion" method="POST">
							Enter a decimal number: <input type="text" name="num" maxlength="10" size="10"><br> 
						</form>
						<?php
							echo "<pre>";
							//Casting
							$num = (int)$_POST['num']; 
							if(isset($num) && !empty($num)){
								$i = 0;
								$rest = $num;
								$test = $num;
								$result = array();
								//查看最高可以到16的幾次方
								do {
									$test = (int)($test/16);
									if($test==0){ break; } //小於16的數字不會出現像是0A的情況
									$i++;
								} while ($test>15);
								//計算每個次方的係數
								while($i>=0){
									$value = (integer)($rest/pow(16,$i));
									array_push($result,$value); 
									$rest -= $value*pow(16,$i);
									$i--;
								}
								echo "<span class=\"text-center\"><table><tr><th>Decimal number</th><th>Hexadecimal number</th></tr><tr><td>{$num}</td><td>";
								//轉換成16進位表示法
								for($j=0;$j<count($result);$j++){
									switch($result[$j]){
										case 10:
											$result[$j] = "A";
											break;
										case 11:
											$result[$j] = "B";
											break;
										case 12:
											$result[$j] = "C";
											break;
										case 13:
											$result[$j] = "D";
											break;
										case 14:
											$result[$j] = "E";
											break;
										case 15:
											$result[$j] = "F";
											break;
									}
									echo $result[$j];
								}
								echo "</td></tr></table></span>";
							}
							echo "</pre>";
						?>
					</span>
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