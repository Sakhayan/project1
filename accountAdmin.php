<?php 	
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Профиль поступающего</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

	<!--если студент НЕ авторизовался, то показывается эта часть, в том числе ссылка на страницу  логина-->
	<?php 
		$con = mysqli_connect('127.0.0.1', 'root', '', 'project1');
		$query = mysqli_query($con, "SELECT * FROM adminUn");
		$res = $query->fetch_assoc();
		$query2 = mysqli_query($con, "SELECT * FROM universities WHERE id = '{$res['Unid']}'");
		$res2 = $query2->fetch_assoc();
		$query3 = mysqli_query($con, "SELECT * FROM applicatinos WHERE idUn = '{$res['Unid']}'");
		$res3 = $query3->fetch_assoc();
		if ($_SESSION['admin_id'] == null) 
	{ ?>
		<div class="col-10 mx-auto">
			<h3>Войдите как админ</h3>
			<p>Вы не авторизованы</p>
			<a href="loginAdmin.php">Авторизация админа</a>
		</div>
	<?php } 
	else { ?>
	
	<!--если студент авторизовался, то показываются nav (меню) и контент всего сайта-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Привет, </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		      <li class="nav-item">
		        <a href="signOutAdmin.php" class="nav-link text-danger">Выйти</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="index.php">Главная</a>
		      </li>
		      
		    </ul>
		  </div>
		</nav>
		<div>
			<h1>Добро пожаловать, <?php echo $res['login']; ?></h1>
			<h2>Ваш университет: <?php echo $res2['name']; ?></h2>
			<h2>Заявки от абитуриентов: </h2>
			<?php for ($i=0; $i < mysqli_num_rows($query3); $i++) { 
				$query4 = mysqli_query($con, "SELECT * FROM students WHERE id = '{$res3['studentid']}'");
				$res4 = $query4->fetch_assoc();
				?>
				<div>
					<h2>ФИО абитуриента: <?php echo $res4['fio']; ?></h2>
					<p>Возраст: <?php echo $res4['age']; ?></p>
					<p>Школа: <?php echo $res4['school']; ?></p>
				</div>
			<?php } ?>
		</div>
	<<?php } ?>
</body>
</html>
