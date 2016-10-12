<?php

include "./closed/check.php";
//перенаправляем браузер по результатам проверки
if ($check){
    header("Location: /ru/profile.php");
     exit();
}
else{
    header("Location: /ru/login.php");
     exit();
}
?>

	
	
	
	
	
		
	