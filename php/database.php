<?php
	/* Связываемся с БД (SQLI)*/
	$server = "localhost";
	$login = "root";
	$pass  = "123";
	$name_db = "terminals";

	$link = mysqli_connect($server, $login, $pass, $name_db);

	if($link == false){
		echo 'Соединение не удалось! ' . mysqli_connect_error();
	}
?>