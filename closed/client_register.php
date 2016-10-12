<?php

// Страница регситрации нового пользователя
# Соединямся с БД

include "check.php";

if(isset($_GET['update'])){update();}

if(isset($_POST['login']))
{
    $err_ru = array();
    $err_en = array();
    # проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
	{
        $err_ru[] = "Логин может состоять только из букв английского алфавита и цифр";
        $err_en[] = "Username may only consist of letters of the alphabet and numbers";
    }


    # проверяем, не сущестует ли пользователя с таким именем
    $sql = "SELECT COUNT(user_id) FROM clients WHERE user_login='".mysql_real_escape_string($_POST['login'])."'";

    if(mysql_result(query($sql), 0) > 0)
    {
        $err_ru[] = "Пользователь с таким логином уже существует в базе данных!";
         $err_en[] = "A user with this login already exists in the database!";
    }
    #ghjdthztv совпадение паролей
    if($_POST['psw1']!=$_POST['psw2'])
    {
        $err_ru[] = "Введенные пароли не совпадают";
         $err_en[] = "The entered passwords do not match";
    }	

    # Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err_ru) == 0 && count($err_en) == 0)
    { 
        $login = $_POST['login'];
        # Убираем лишние пробелы и делаем двойное шифрование
        $password = md5(md5(trim($_POST['psw1'])));
		$email = $_POST['email'];
		$lname = $_POST['lastname'];
		$fname = $_POST['firstname'];

                
        $sql2="INSERT INTO clients SET user_login='".$login."', email='".$email."',lastname='".$lname."',firstname='".$fname."',user_password='".$password."'";
		query($sql2);
                
	//id последней вставленной записи 	
         $new_id=mysql_insert_id();
         //извлекаем расширение
        if(!$_FILES['img']['error']){
            $lasts = explode(".", $_FILES['img']['name']);
            $last=end($lasts);
         }
         //сохраняем изображение
         if(!$_FILES['img']['error'] && $sql2!=false) copy($_FILES['img']['tmp_name'],$_SERVER['DOCUMENT_ROOT']."/ava/".$new_id.".".$last); 

     
         //сохраняем параметры checkbox
	$sql2="INSERT INTO client_parameters SET news='".$_POST['news']."', act='".$_POST['act']."',user_id='".mysql_insert_id()."'";
		query($sql2);

		login();
		
    }

    else
    {
        
         switch ($_GET['lang']){
            case "ru":
                print "<b>При регистрации произошли следующие ошибки:</b><br>";
                foreach($err_ru AS $error)
                {
                    print $error."<br>";
                }
            break;
             case "en":
                print "<b>When registering the following errors occurred:</b><br>";
                foreach($err_en AS $error)
                {
                    print $error."<br>";
                }
            break;       
        }          

    }

}



function login(){

if(isset($_POST['login']))
{
    # Вытаскиваем из БД запись, у которой логин равняеться введенному
    $sql = "SELECT user_id, user_password FROM clients WHERE user_login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1";
    $data = mysql_fetch_assoc(query($sql));

    # Соавниваем пароли
    if($data['user_password'] === md5(md5($_POST['psw1'])))
    {
        # Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        if(!@$_POST['not_attach_ip'])
        {
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
        # Переадресовываем браузер на страницу профайла
        switch ($_GET['lang']){
            case "ru":
                header("Location: ../ru/profile.php");
            break;
             case "en":
                header("Location: ../en/profile.php");
            break;       
        }   

        exit();
    }

    else

    {
         switch ($_GET['lang']){
            case "ru":
               print "Вы ввели неправильный логин / пароль";
            break;
             case "en":
               print "You entered an incorrect username / password";
            break;       
        }        
        
    }

}	
}


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



?>