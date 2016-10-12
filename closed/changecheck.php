<?php

//подключаем файл для связи с БД
include "sql.php";

//наименованиеполя(свйства)
$field=$_GET['name'];
//id пользователя
$user_id=$_GET['user_id'];
//значение поля
$value=$_GET['flag'];

//обновление свойства
    $sql="UPDATE client_parameters SET ".$field."='".$value."'WHERE user_id='".$user_id."'";
	$ind=query($sql);
		
//ответ на запрос
	if($ind){echo 1;}
	
?>