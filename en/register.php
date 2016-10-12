<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Registration form</title>
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="icon" href="../img/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
     <script  src="../js/script.js" type="text/javascript"></script>

</head>
<body lang="en">


	<div id="registermain">
             <div id="lang">
                <ul>
                <li class="active"><p><a href="../en/register.php?lang=en">English</a></p>
                  <li  ><p><a href="../ru/register.php?lang=ru">Russian</a></p>  
                 <li><p>Site Language:</p>     
               </ul>
           </div> 
	<h1 >Registration</h1>
		<form class="register-form" onSubmit="CheckresultsForm(this,0);return false"  method="post" action="../open/client_register.php?lang=en"  enctype="multipart/form-data">
                    
			<label for="firstname">Firstname:</label>
			<input id="firstname" name="firstname" type="text"  placeholder="Enter your firstname" title="Enter the name using only letters"><span></span>
                    
			<label for="lastname">Lastname:</label>
			<input id="lastname" name="lastname" type="text"  placeholder="Enter your lastname" title="Enter the lastname using only letters"><span></span>
                        
			<label for="email">Email:</label>
			<input id="email" type="email" name="email"  required placeholder="Enter your email"><span></span>
			
			<label for="login">Login:</label>
			<input id="login" name="login" type="text" pattern="^[A-Za-zА-Яа-яЁё,0-9]+$" required placeholder="Enter your login" title="For the login is possible to use letters and numbers" ><span></span>
                        
			<br/>
                         <div class="file_upload">
                            <label >Avatar:</label>
                            <mark class="mark" >is not selected</mark>                            
                            <input type="button" class="button" value="Select...">
                            <input type="file" name="img" accept="image/jpeg,image/png,image/gif"  
                                     onchange="Selectionfile(this)"
                                     title="Select the file avatar in any of the suggested formats: jpg, gif, png">
                        </div> 
                        
 			<br/>
                        <input class="check" type="checkbox" name="news" id="news" value="1" checked=""> <label for="news">Receive notifications about news</label>
                        <br/>
                        <input class="check" type="checkbox" name="act" id="act" value="1" checked=""> <label for="act">Receive emails about promotions</label>            
                        
                        <br/><br/><br/>
			<label for="psw1">Password:</label>
			<input id="psw1" name="psw1" type="password" required placeholder="Please enter your password (at least 6 characters)" title=''><span></span>
			<label for="psw2">Confirm password:</label>
			<input id="psw2" name="psw2" type="password" required placeholder="Confirm the password"><span></span>	
                        
                       
                       
                        <br/>
			<div id="lower">
				<input type="submit" class="button" value="Save">
			</div>
		</form>
	</div>
</body>
</html>
	
	
	
	
	
		
	