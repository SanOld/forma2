<?php

// Страница авторизации

# Функция для генерации случайной строки
function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];  
    }

    return $code;
}

# Соединямся с БД
include "sql.php";

if(isset($_POST['login']))
{
	$login=$_POST['login'];
    # Вытаскиваем из БД запись, у которой логин равняеться введенному
    $sql = "SELECT *,INET_NTOA(user_ip) AS 'user_ip' FROM clients WHERE user_login='".$login."' LIMIT 1";
    $data = mysql_fetch_assoc(query($sql));

    # Соавниваем пароли
    #if($data['user_password'] === md5(md5($_POST['get_pasw_1'])) and $data['user_ip'] === $_SERVER['REMOTE_ADDR']) /*если ip динамический то пользователь не может войти, поэтому убрал проверку ip*/
    if($data['user_password'] === md5(md5($_POST['psw1'])))
    {
        # Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        if(!@$_POST['not_attach_ip'])
        {
            # Если пользователя выбрал привязку к IP
            # Переводим IP в строку
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }

        # Записываем в БД новый хеш авторизации и IP
        $sql2="UPDATE clients SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'";
        query($sql2);
        
       
        # Ставим куки
        if($hash<>''){
        setcookie("id", $data['user_id'], time()+60*60*24*30,"/");
        setcookie("hash", $hash, time()+60*60*24*30,"/");
        }
        //echo $hash;
	# Переадресовываем браузер 
        switch ($_GET['lang']){
            case "ru":
                header("Location: ../ru/profile.php");
            break;
             case "en":
                header("Location: ../en/profile.php");
            break;       
        }        
       
    }

    else

    {
        switch ($_GET['lang']){
            case "ru":
               echo "<center><b>Неверный ввод !!!<p>";
                echo "<a href=".$_SERVER['HTTP_REFERER'].">Вернуться и правильно заполнить форму.</a>";
            break;
             case "en":
               echo "<center><b>Invalid Input !!!<p>";
                echo "<a href=".$_SERVER['HTTP_REFERER'].">Go back and fill in the form correctly.</a>";
            break;       
        }

        exit();
    }

}
else{
		echo "
		<html>
		  <head>
		   <meta http-equiv='Refresh' content='0; URL=".$_SERVER['HTTP_REFERER']."'>
		  </head>
		</html>";
}


?>
