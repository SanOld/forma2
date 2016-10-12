<?php

include "../closed/check.php";
// считываем расширение графического файла если он существует
if (file_exists("../ava/".$userdata['user_id'].".png")) {$suffix=".png";}
if (file_exists("../ava/".$userdata['user_id'].".gif")) {$suffix=".gif";}
if (file_exists("../ava/".$userdata['user_id'].".jpg")) {$suffix=".jpg";}

?>


<!DOCTYPE html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="icon" href="../img/favicon.png" type="image/x-icon">
	<link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
     <script  src="../js/script.js" type="text/javascript"></script>
</head>
<body lang="en">


	<div id="profilemain">
             <div id="lang">
                <ul>
                <li class="active"><p><a href="../en/profile.php?lang=en">English</a></p>
                  <li  ><p><a href="../ru/profile.php?lang=ru">Russian</a></p>  
                 <li><p>Site Language:</p>     
               </ul>
           </div> 
            <img  class="ava" name="img" src="../ava/<?php echo $userdata['user_id'].$suffix?>" alt="Avatar" >
	<h1 >Profile</h1>
        
		<form class="profile-form"  >
                    
			<label for="firstname">Fistname:</label>
			<input id="firstname" name="firstname" type="text" value="<?php echo $userdata['firstname']; ?>" readonly>
                    
			<label for="lastname">Lastname:</label>
			<input id="lastname" name="lastname" type="text"  value="<?php echo $userdata['lastname']; ?>" readonly>
                        
			<label for="email">Email:</label>
			<input id="email" type="email" name="email"  value="<?php echo $userdata['email']; ?>" readonly>
			
			<label for="login">Login:</label>
			<input id="login" name="login" type="text" value="<?php echo $userdata['user_login']; ?>" readonly >
                        
			<br/>
                      
                      

 			<br/>
                        <input class="check" type="checkbox" name="news" id="news"  <?php if($userprop['news']){echo 'checked';}?>    onchange="ChangeCheck(this,<?php echo $userdata['user_id'];?>);"> <label for="news">Receive notifications about news</label>
                        <br/>
                        <input class="check" type="checkbox" name="act" id="act" <?php if($userprop['act']){echo 'checked';}?>   onchange="ChangeCheck(this,<?php echo $userdata['user_id'];?>);"> <label for="act">Receive emails about promotions</label>            
                        <br/>
			<div id="lower">
				<input type="button" class="button" value="Exit" onClick="exit()">
			</div>
		</form>
	</div>
</body>
</html>
	
	
	
	
	
		
	