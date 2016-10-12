<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Форма регистрации</title>
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="icon" href="../img/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
         <script  src="../js/script.js" type="text/javascript"></script>

</head>
<body lang="ru">


	<div id="registermain">
             <div id="lang">
                <ul>
                <li ><p><a href="../en/register.php?lang=en">Английский</a></p>
                  <li class="active" ><p><a href="../ru/register.php?lang=ru">Руссский</a></p>  
                 <li><p>Язык сайта:</p>     
               </ul>
           </div> 
	<h1 >Регистрация</h1>
		<form class="register-form" onSubmit="CheckresultsForm(this,0);return false"  method="post" action="../open/client_register.php?lang=ru"  enctype="multipart/form-data">
                    
			<label for="firstname">Имя:</label>
			<input id="firstname" name="firstname" type="text"  placeholder="Введите Ваше имя" title="Введите имя, используя только буквы"><span></span>
                    
			<label for="lastname">Фамилия:</label>
			<input id="lastname" name="lastname" type="text"  placeholder="Введите Вашу фамилию" title="Введите фамилию, используя только буквы"><span></span>
                        
			<label for="email">Email:</label>
			<input id="email" type="email" name="email"  required placeholder="Введите Ваш электронный адрес"><span></span>
			
			<label for="login">Логин:</label>
			<input id="login" name="login" type="text" pattern="^[A-Za-zА-Яа-яЁё,0-9]+$" required placeholder="Введите Ваш логин" title="Для ввода логина возможно использовать буквы и цифры" ><span></span>
                        
			<br/>
                         <div class="file_upload">
                            <label >Аватар:</label>
                            <mark class="mark" >Файл не выбран</mark>                            
                            <input type="button" class="button" value="Выбрать...">
                            <input type="file" name="img" accept="image/jpeg,image/png,image/gif"  
                                     onchange="Selectionfile(this)"
                                     title="Выберите файл аватара в любом из предложенных форматов: jpg, gif, png">
                        </div> 
                        
 			<br/>
                        <input class="check" type="checkbox" name="news" id="news" value="1" checked=""> <label for="news">Присылать уведомления о новостях</label>
                        <br/>
                        <input class="check" type="checkbox" name="act" id="act" value="1" checked=""> <label for="act">Присылать уведомления о проводимых акциях</label>            
                        
                        <br/><br/><br/>
			<label for="psw1">Пароль:</label>
			<input id="psw1" name="psw1" type="password" required placeholder="Введите Ваш пароль (не менее 6-ти символов)" title=''><span></span>
			<label for="psw2">Повторить:</label>
			<input id="psw2" name="psw2" type="password" required placeholder="Повторите введенный пароль"><span></span>	
                        
                       
                       
                        <br/>
			<div id="lower">
				<input type="submit" class="button" value="Сохранить">
			</div>
		</form>
	</div>
</body>
</html>
	
	
	
	
	
		
	