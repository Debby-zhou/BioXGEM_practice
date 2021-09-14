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
				<?php
					if(isset($_GET['error'])){
						$error = $_GET['error'];
						if($error==="passwd_not_the_same"){
							//雙引號裡面的要馬是用單引號或是\""
							echo "<pre><div class='text-center' style='color: red;'>\nTABLE I ERROR: Password is not the same. Please refill Table I again!</div></pre>";
						}
					}
					if(isset($_GET['error2'])){
						$error2 = $_GET['error2'];
						if($error2==="empty_goal"){
							echo "<pre><div class='text-center' style='color: red;'>\nTABLE II ERROR: Goal is empty. Please fill in your goal in Table II!</div></pre>";
						}
					}
				?>
			<div>
				<h1 class="title"><a href="javascript:void(0)" onclick="unlock();">HW4</a></h1>
			</div>
			<div class="zh">
				<h4 class="divider">Practice</h4>
				<span class="text-center">
					<h5>Table I.</h5>
				</span>
				<div class="form">
					<form action="./hw4_process_post.php" method="POST">
						<div class="form-content">
							<div>Username:&nbsp<input type="text" name="username"></input><br></div>
							<div>Password:&nbsp<input type="password" name="password"></input><br></div>
							<div>Confirm password:&nbsp<input type="password" name="confirm_password"></input></div>
							<div>
								Which brand do you prefer?
								<div>
									<input type="radio" name="brand" value="Nike"> Nike</input><br>
									<input type="radio" name="brand" value="Adidas"> Adidas</input><br>
									<input type="radio" name="brand" value="Apple"> Apple</input><br>
								</div>
							</div>
						</div>
						<div class="text-center">
								<input type="submit" name="submit" value="Send">
							</div>
					</form>
				</div>
				<span class="text-center">
					<h5>Table III.</h5>
				</span>
				<div class="form">
					<form action="./hw4_process_post.php" method="POST" enctype="multipart/form-data">
						<div class="form-content">
							<div>Upload file: 
								<input type="file" name="p_file">
							</div>
							<div class="text-center">
								<input type="submit" name="submit" value="submit">
							</div>
						</div>
					</form>
				</div>
				<h4 class="divider">Homework</h4>
				<div>
					<ol>
						<li>主題自訂，但必須達到下面幾項要求</li>
						<ul>
							<li>類似表單系統，但主題不要是註冊帳號</li>
							<li>參考這次上課課程使用POST/GET來傳送資料</li>
							<ul>
								<li>表單傳送請使用POST</li>
								<li>傳送後的處理與重新導向網頁請使用GET</li>
								<div class="notes">
									重新導向網頁請將Table II的Goal留空即可實現。
								</div>
							</ul>
							<li>表單系統請至少使用兩個新的input type+上傳檔案</li>
							<li>除了重新導向網頁以外，都符合資訊的也請output成新的網頁格式(例如可用table或是其他格式show表單資料)</li>
						</ul>
					</ol>
				</div>
				<span class="text-center ans">
					<h5>Table II.</h5>
				</span>
				<div class="form ans">
					<form action="./hw4_process_post.php" method="POST" enctype="multipart/form-data">
						<div class="form-content">
							<div>Goal: <input type="text" name="goal"></div>
							<div>Excution days: <br>
								<div class="row">
									<span class="col-md-2 date">From</span>
									<span class="col-md-10 date"><input type="date" name="datefrom" value="<?php echo date('Y-m-d'); ?>"></span>
									<span class="col-md-2 date">To</span> 
									<span class="col-md-10 date"><input type="date" name="dateto" value="<?php echo date('Y-m-d'); ?>"></span>
								</div>
							</div>
							<div>Upload file:&nbsp
								<input type="file" name="file" value="file">
							</div>
						</div>
						<div class="text-center">
								<input type="submit" name="submit" value="Submit">
								<input type="reset" name="reset" value="Reset">
						</div>
					</form>
				</div>
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