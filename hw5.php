<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>hw5</title>
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
				<h1 class="title"><a href="javascript:void(0)" onclick="unlock();">HW5</a></h1>
			</div>
			<div class="zh">
				<h4 class="divider">Practice</h4>
				<div>
					<span>
						<?php
						echo "<pre>";
						$a = 13;
						$fruits = array("apple","banana","cherry");
						echo "<u><b>Print out the array: </b></u>\n";
						print_r($fruits);
						$fruits['new'] = "guava";
						$fruits['more_new'] = "kiwi";
						print_r($fruits);
						$arr_search = array_search("guava", $fruits);
						$arr_search2 = array_search("kiwi", $fruits);
						echo "\n<u><b>Print out the result of patterns searched in array: </b></u>\n";
						echo "array_search of guava result: {$arr_search}\n";
						echo "array_search of kiwi result: {$arr_search2}\n";
						echo "\$fruits length: ".count($fruits)."\n";
						$fruits[] = "lemon";
						echo "\n<u><b>Print out the other data type of indexes: </b></u>\n";
						print_r($fruits);
						$number = array(
							"name"=>"Debby",
							"birthday"=>"1999/02/13",
							"height"=>164,
							"weight"=>"secret"
						);
						print_r($number);
						$arr_search_no = array_search("d",$number);
						echo "array_search of d result: {$arr_search_no}\n";
						$fruits = "apple, banana, cherry";
						$list = explode(", ",$fruits);
						echo "list of fruits string: \n";
						print_r($list);
						$file = file_get_contents("assets/sequence.fasta");
						$file = trim($file);
						$line = explode("\n",$file);
						$pro_name = array();
						$pro_seq = array();
						$hw = array();
						for($i=1;$i<count($line);$i+=2){
							$pro_name[] = $line[$i-1];
							$pro_seq[] = $line[$i];
						}
						echo "\n<u><b>Read and print out uniport data: </b></u>\n";
						print_r($pro_name);
						print_r($pro_seq);
				
						for($i=0;$i<count($line);$i+=2){
							$hw[$i/2][] = $line[$i];
							$hw[$i/2][] = $line[$i+1];
						}
						echo "<span class=\"zh ans\"><hr><h5 class=\"text-center\">隨堂練習：二維陣列</h5>";
						print_r($hw);
						echo "</span>";

						echo "<hr>";
						echo "\n<u><b>Use foreach function to print out array: </b></u>\n";
						$fruits = array("Apple","Banana","Cherry");
						foreach($fruits as $v){
							echo "{$v} is a fruit.\n";
						}
						foreach($fruits as $v){
							$v = strtoupper($v);
							echo "{$v} is a fruits.\n";
						}
						print_r($fruits);

						$fruits = array("A" => "apple", "B" => "banana", "C" => "cherry");
						foreach($fruits as $k=>$v){
							echo "{$k}: {$v}\n";
						}

						$number = range(1,20,2);
						print_r($number);

						foreach(range(1,20,2) as $v){
							echo "{$v} ";
						}

						echo "\n\n<u><b>User for loop to print out array: </b></u>\n";
						for($i=4;$i<66;$i+=4){
							echo "{$i} ";
						}
						
						$fruits = array("Apple","Banana","Cherry");
						for($j=0;$j<count($fruits);$j++){
							echo $fruits[$j]." is a fruit.\n";
						}

						echo "\n<u><b>Use for loop to print out *: </b></u>\n";
						for($i=1;$i<6;$i++){
							for($j=0;$j<$i;$j++){
								echo "*";
							}
							echo "\n";
						}
						echo "<hr>";

						echo "<span><h5 class=\"text-center zh\">隨堂練習</h5>\n";
						echo "<ul><li>將自己的名字(英文)存成變數後，將奇數位存成一個變數，偶數位存成一個變數，再顯示出來。</li>";
						$name = "CHOUCHIHYUAN";
						$odd = "";
						$even = "";
						for($i=0;$i<strlen($name);$i+=2){
							$even .= $name[$i];
							$odd .= $name[$i+1];
						}
						echo "name: {$name}\nodd: {$odd}\neven: {$even}\n";
						echo "<li>將上一個隨堂練習，嘗試以for()迴圈完成，並將 >protein name 簡化保留uniprot accession no.即可。</li>";
						$trimmedSeq = array();
						$file = file_get_contents("assets/sequence.fasta");
						$file = trim($file);
						$line = explode("\n",$file);
						for($i=0;$i<count($line);$i++){
							switch($i%2){
								case 0:
									$l = explode("|",$line[$i]);
									$trimmedSeq[$i/2][] = ">{$l[1]}";
									echo ">{$l[1]}\n";
									break;
								case 1:
									$trimmedSeq[$i/2][] = $line[$i];
									echo "{$line[$i]}\n";
									break;
							}
							
						}
						echo "<u><b>Store the result into trimmedSeq array: </b></u>\n";
						print_r($trimmedSeq);
						echo "</ul>";
						echo "<u><b>複習練習: </b></u>\n";
						$b_arr = array();
						$test = array("ae86","lala","blond","utube","atcg","a549","bird");
						foreach($test as $v){
							if($v[0]=="a"){
								echo "{$v}\t";
							}elseif($v[0]=="b"){
								$b_arr[] = $v;
							}else{
								//file_put_contents("../data/review_chouchihyuan.txt", $v." ",FILE_APPEND);
							}
						}
						print_r($b_arr);
						echo "</pre>";
						?>

					</span>
				</div>
				<h4 class="divider" id="homework">Homework</h4>
				<ol>
					<li>讀入[IRAK_aligm_msa.txt]，儲存為Array，並於螢幕輸出。</li>
						<span>Family[kinase][specie] = sequence</span><br>
	 					<span>IRAK  [IRAK1][MOUSE] = 序列</span>
      					<span class="ans">
      						<?php
      							$IRAK_file = file_get_contents("assets/IRAK_align_msa.txt");
      							$IRAK_results = explode("\n",$IRAK_file);
      							echo "<pre>";
      							foreach($IRAK_results as $v){
      								if(isset($v) && !empty($v)){
	      								$IRAK = explode("|",$v);
	      								$irak = explode("\t",$IRAK[2]);
	      								$ks = explode("_",$irak[0]);
	      								$ks[1] = trim($ks[1]);
	      								echo "IRAK[{$ks[0]}][{$ks[1]}] = {$irak[1]}\n";
      								}
      							}
      							echo "</pre>";
      						?>
      					</span>
	 				<li>請簡介以下幾個Function，並舉例 :</li>
		 				<div class="ans">
		 					<div class="text-center">
		 						<code>$arr = array(2,5,9,3,6,4,9);</code>
		 					</div>
		 					<?php
		 						$arr = array(2,5,9,3,6,4,9);

		 						function print_result($function_name,$def,$source_code,$arr_r){
		 							$len = count($arr_r);
		 							$t = 1;
		 							echo "<tr><td>{$function_name}</td><td>$def</td><td>{$source_code} => ";
									if(gettype($arr_r)=="array"){
										foreach($arr_r as $v){
											if($t==1){ echo "({$v}"; }
											else{ echo ", $v";}
											$t += 1;
										}
										echo ")</td></tr>";
									}else{
										echo "{$arr_r}</td></tr>";
									}
		 						}

			 					echo "<pre><table><tr><th>Function</th><th>Meaning</th><th>Example</th></tr>";
			 					$arr_in = in_array(2,$arr);
			 					print_result("in_array(search,array,type)","array中是否存在指定值","in_array(2,\$arr)",$arr_in);
			 					array_shift($arr);
			 					print_result("Array_Shift(array)","刪除且返回array中第一個元素","array_shift(\$arr)",$arr);
			 					array_pop($arr);
			 					print_result("Array_Pop(array)","刪除且返回array中最後一個元素","array_pop(\$arr)",$arr);
			 					array_unshift($arr,'s','a');
			 					print_result("Array_Unshift(array,value1,...)","插入新元素到array的開頭","array_unshift(\$arr,'s','a')",$arr);
			 					$arr_re = array_reverse($arr);
			 					print_result("Array_Reverse(array,preserve)","array的元素順序反轉後存入新的array","array_reverse(\$arr)",$arr_re);
			 					sort($arr);
			 					print_result("Sort(array,sort_flags)","array中的元素升冪排序","sort(\$arr)",$arr);
			 					rsort($arr);
			 					print_result("rSort(array,sort_flags)","array中的元素降冪排序","rsort(\$arr",$arr);
			 					echo "</table></pre>";
		 					?>
			 			</div>
	 				<li>自訂輸入n後，產生其圖形並輸出於螢幕上。</li>
	 					<span class="text-center ans" id="n_pic">
	 						<form action="hw5.php#n_pic" method="POST">
	 							n = <input type="text" name="n" maxlength="2" size="2">
	 						</form>
	 						<?php
	 							$n = $_POST['n'];
	 							if(isset($n)){
		 							echo "<span id=\"n_pic\"><pre><table><tr><td>";
		 							echo "n = {$n}</td></tr><tr><td>";
		 							//n是第幾個奇數，代表最中間那行有幾個*
		 							//i是第幾行，總共會有2n-1行
		 							for($i=1;$i<2*$n;$i++){
		 								if($i<=$n){
		 									for($j=1;$j<2*$i;$j++){
		 										echo "*";
		 									}
		 								}else{
		 									for($j=1;$j<2*(2*$n-$i);$j++){
		 										echo "*";
		 									}
		 								}
		 								echo "\n";
		 							}
		 							echo "</td></tr></table></pre></span>";
		 						}
	 						?>
	 					</span>
	 				<li>讀入檔案[xy.txt]，每一行皆為x,y，請計算每一行的 C x 取 y ，並將每行輸出為 C x 取 y 為答案(ex. C 5 取 2 為 10)。</li>
	 					<span class="ans">
	 						<?php
	 							echo "<pre>";
	 							$xy_file = file_get_contents("assets/xy.txt");
	 							$xy_file = trim($xy_file);
	 							$xy = explode("\n",$xy_file);
	 							foreach($xy as $v){
	 								$test = explode(", ",$v);
	 								$up_result = 1;
	 								$down_result = 1;
	 								for($i=$test[0];$i>$test[0]-$test[1];$i--){
	 									$up_result *= $i;
	 								}
	 								for($j=1;$j<$test[1]+1;$j++){
	 									$down_result *= $j;
	 								}
	 								$result = $up_result/$down_result;
	 								echo "C {$test[0]} 取 {$test[1]} 為 {$result}\n";
	 							}
	 							echo "</pre>";
	 						?>
	 					</span>
	 				<li>亂數產生5*5的bingo數字表，並顯示於螢幕。</li>
	 				<ul>
	 					<li>善用rand(), isset()</li>
	 					<li>固定輸出寬度可用str_pad</li>
	 				</ul>
	 					<span class="ans">
	 						<?php
	 							echo "<pre>";
	 							include("assets/hw5_partial.php");
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