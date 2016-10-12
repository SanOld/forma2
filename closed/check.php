<?php
// Скрипт проверки

# Соединямся с БД
include "sql.php";

//устанавливаем значение по умолчанию
$check=false;

//проверка на существование кук
if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{

    $sql = "SELECT *,INET_NTOA(user_ip) AS 'user_ip' FROM clients WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1";
    $userdata = mysql_fetch_assoc(query($sql));

//сравниваем хэш из базы и из кук, сравниваем ip	
    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])
 or (($userdata['user_ip'] !== $_SERVER['REMOTE_ADDR'])  and ($userdata['user_ip'] !== "0")))

    {
        //при наличии неравенства по какому-либо параметру
	$check=false;
    }

    else
    {
        $check=true;
		
		//получаем свойства профайла
		$sql2 = "SELECT * FROM client_parameters WHERE user_id = '".intval($_COOKIE['id'])."'";
		$userprop = mysql_fetch_assoc(query($sql2));
		
    }
}

 


?>
