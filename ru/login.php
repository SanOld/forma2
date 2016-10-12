
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Форма входа</title>
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="icon" href="../img/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
         <script  src="../js/script.js" type="text/javascript"></script>
</head>
<body lang="ru">


	<div id="main">
            
             <div id="lang">
                <ul>
                <li ><p><a href="../en/login.php?lang=en">Английский</a></p>
                  <li class="active" ><p><a href="../ru/login.php?lang=ru">Руссский</a></p>  
                 <li><p>Язык сайта:</p>     
               </ul>
           </div> 
            
            <h1>Авторизация</h1>
		<form class="login-form"  onSubmit="CheckresultsForm(this,1);return false" action="../open/check_login.php?lang=ru" method="post">
			<label for="login">Логин:</label>
			<input type="text" name='login' placeholder="Введите Ваш логин" title="Для авторизации на сайте введите Ваш логин">
			<label for="password">Пароль:</label>
			<input type="password" name='psw1'  placeholder="Введите Ваш пароль" >
			<div id="lower">
			<input type="submit" class="button" value="Войти">
			<input type="button" class="register" value="Регистрация" onClick='location.href="../ru/register.php?lang=ru";'>
			</div>
		</form>
	</div>
</body>
</html>
	
	
	
	
	
		
	