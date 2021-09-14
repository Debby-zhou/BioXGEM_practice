<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>hw4</title>
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
				<h1 class="title">HW4 Reception</h1>
			</div>
			<div class="zh">
				<h4 class="divider">Practice</h4>
				<div>
					<pre>
						<?php
							$username = $_POST['username'];
							$passwd = $_POST['password'];
							$confirm_passwd = $_POST['confirm_password'];
							$brand = $_POST['brand'];

							if($passwd!=$confirm_passwd){
								header("Location: hw4.php?error=passwd_not_the_same");
							}else{
								echo "<h5>Table I.</h5>";
								if($username!=""){ echo "Username: {$username}\n";}
								if($passwd!=""){ echo "Password: {$passwd}\n";}
								if($confirm_passwd!=""){ echo "Confirm password: {$confirm_passwd}\n";}
								if($brand!=""){
									echo "You prefer {$brand} ";
									switch ($brand) {
										case "Nike":
											echo ", earn more money！";
											break;
										case "Adidas":
											echo ", earn more and more money！";
											break;
										case "Apple":
											echo ", sale everthing to pay for it! XD";
											break;
									}
								}
							}						
						?>
					</pre>
				</div>
				<div>
					<pre>
						<?php
						if($_FILES['p_file']['error']==0){
							echo "<pre><h5>Table III.</h5>";
							echo "Original file name: {$_FILES['p_file']['name']}\n";
							echo "File type: {$_FILES['p_file']['type']}\n";
							echo "File size: {$_FILES['p_file']['size']}\n";
							if(move_uploaded_file($_FILES['p_file']['tmp_name'],"../data/CHOUCHIHYUAN_".$_FILES['p_file']['name'])){
								echo "Move to data folder successful!\n";
								echo "Modified file name: CHOHCHIHYUAN_{$_FILES['p_file']['name']}\n";
							}else{
								echo "Move to data folder failed!";
							}
							echo "</pre>";
						}
						?>
					</pre>
				</div>
				<h4 class="divider">Homework</h4>
				<div>
					<?php
						$goal = $_POST["goal"];
						$datefrom = $_POST["datefrom"];
						$dateto = $_POST["dateto"];

						if($goal=="" & ($_FILES[$p_file]['error']!=0) & $username=="" & $passwd=="" & $confirm_passwd=="" & $brand==""){
							header("Location: hw4.php?error2=empty_goal");
						}else{
							echo "<span>";
							echo "<pre><h5>Table II.</h5>";
							echo "<table><tr><th>項目</th><th>內容</th></tr>";
							if($goal!="") { echo "<tr><td>Goal</td><td>{$goal}</td></tr>";}
							if($datefrom!="") { echo "<tr><td>Date</td><td>{$datefrom} ~ {$dateto}</td></tr>";}

							//File upload
							if($_FILES['file']['error']>0){
								if($_FILES['file']['error']==4){
									echo "<tr><td>Upload status</td><td>未偵測到要上傳的檔案！</td></tr>";
								}else{
									echo "<tr><td>Upload status</td><td>檔案上傳失敗!</td></tr>";
								}
							}elseif($_FILES['file']['error']==0){
								if(!empty($_FILES['file']['name'])){
									if(move_uploaded_file($_FILES['file']['tmp_name'],"/data/public/summer2021/homework/data/CHOUCHIHYUAN_".$_FILES['file']['name'])){
										echo "<tr><td>Upload status</td><td>檔案存入指定路徑(/data/public/summer2021/homework/data)成功！</td></tr>";
									}else{
										echo "<tr><td>Upload status</td><td>檔案存入指定路徑(/data/public/summer2021/homework/data)失敗！</td></tr>";
									}
									echo "<tr><td>File name</td><td>".$_FILES['file']['name']."</td></tr>";
									echo "<tr><td>File type</td><td>".$_FILES['file']['type']."</td></tr>";
									echo "<tr><td>File size</td><td>".$_FILES['file']['size']."KB</td></tr>";
									echo "<tr><td>File tmp path</td><td>".$_FILES['file']['tmp_name']."</td></tr>";
									if($_FILES['file']['type']=="text/plain"){
										$f_content = file_get_contents("../data/CHOUCHIHYUAN_{$_FILES['file']['name']}");
										echo "<tr><td>File content</td><td>{$f_content}";
									}elseif($_FILES['file']['type']=="image/jpeg" || $_FILES['file']['type']=="image/png"){
										$f_content = "../data/CHOUCHIHYUAN_{$_FILES['file']['name']}";
										echo "<tr><td>File content</td><td><img src={$f_content} width=500px height=250px></td></tr>";
									}
								}
							}
							echo "</table></pre></span>";
						}
					?>
				</div>
			</div>
			<div>
				<input type="button" class="button" name="back" value="Back" onClick="window.location.href='hw4.php'">
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</html>