<?php
function query($sql){
	
 $host = "127.0.0.1";
 $user = "librar00_test";
 $password = "testpassword";
	
// Производим попытку подключения к серверу MySQL:
$connect=mysql_connect($host, $user, $password);

	if (!$connect)
	{
	echo "<h2>MySQL Error!</h2>";
	exit;
	}
// Выбираем базу данных:
	mysql_select_db('librar00_test',$connect);

//устанавливаем кодировку
mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysql_query("SET CHARACTER SET 'utf8'");


	$q = mysql_query($sql);
	if(mysql_errno()!=0) {
		echo "ERROR ".mysql_errno()." ".mysql_error()."\n";
		return false;
	}
	return $q;
}
?>