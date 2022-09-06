<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>Авторизация</title> <!-- Name of the tab -->
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css"> <!-- Connect link for style -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> </head> <!-- CDN of W3.CSS -->

<body class="w3-mobile">
	<div class="header w3-mobile">
		<h2>Логин</h2> </div>
	<form method="post" action="login.php" class="w3-mobile">
		<?php include('errors.php'); ?>
			<div class="input-group">
				<label>Имя</label>
				<input type="text" name="username"> </div>
			<div class="input-group">
				<label>Пароль</label>
				<input type="password" name="password"> </div>
			<div class="input-group">
				<button type="submit" class="btn" name="login_user">Вход</button>
			</div>
			<p> Нету аккаунта? <a href="register.php">Регистрация</a> </p>
	</form>
</body>

</html>