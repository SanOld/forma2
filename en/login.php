
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Login form</title>
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="icon" href="../img/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
         <script  src="../js/script.js" type="text/javascript"></script>
</head>
<body lang="en">


	<div id="main">
            
             <div id="lang">
                <ul>
                <li class="active"><p><a href="../en/login.php?lang=en">English</a></p>
                  <li  ><p><a href="../ru/login.php?lang=ru">Russian</a></p>  
                 <li><p>Site Language:</p>     
               </ul>
           </div> 
            
            <h1>Authorization</h1>
		<form class="login-form"  onSubmit="CheckresultsForm(this,1);return false" action="../open/check_login.php?lang=en" method="post">
			<label for="login">Login:</label>
			<input type="text" name='login' placeholder="Enter your login" title="To login to the site, enter your username">
			<label for="password">Password:</label>
			<input type="password" name='psw1'  placeholder="Enter your password" >
			<div id="lower">
			<input type="submit" class="button" value="Enter">
			<input type="button" class="register" value="Registration" onClick='location.href="../en/register.php?lang=en";'>
			</div>
		</form>
	</div>
</body>
</html>
	
	
	
	
	
		
	