<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Авторизация</title>
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <div class="header w3-mobile">
  	<h2>Регистрация</h2>
  </div>
	
  <form method="post" action="register.php" class="w3-mobile">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Имя</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Электронный почта</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Пароль</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Подтверждение пароля</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Регистрировать</button>
  	</div>
  	<p>
  		Уже есть аккаунт? <a href="login.php">Входить</a>
  	</p>
  </form>
</body>
</html>