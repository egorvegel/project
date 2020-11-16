<?php
	// !Фильтрация терминалов
	if(count($_POST) > 0){
		// !Заполняем строку для SQL, с помощью которого найдем нам нужные данные 
		$request;
		if($_POST["city"] == '*'){
			$request = "SELECT * FROM `terminals`";
			if($_POST["controlBtn"] || $_POST["controlBtn"] == "0"){
				$curControlBtn = $_POST["controlBtn"];
				$request = $request . " where active = '$curControlBtn'";
			}
			if($_POST["theme"] && $_POST["filterBtn"] && $_POST["theme"] != "nothing"){
				$theme = $_POST['theme'];
				$filterBtn = $_POST['filterBtn'];
				$request = $request . " ORDER BY `terminals` . `$theme` $filterBtn";
			}
		}else{
			if($_POST["city"]){
				$curCity = $_POST["city"];	
				$request = "SELECT * FROM `terminals` WHERE city = '$curCity'";
			}
			if($_POST["controlBtn"] || $_POST["controlBtn"] == "0"){
				$curControlBtn = $_POST["controlBtn"];
				$request = $request . " AND active = '$curControlBtn'";
			}
			if($_POST["theme"] && $_POST["filterBtn"] && $_POST["theme"] != "nothing"){
				$theme = $_POST['theme'];
				$filterBtn = $_POST['filterBtn'];
				$request = $request . " ORDER BY `terminals` . `$theme` $filterBtn";
			}
		}
		// !Заполнили строку, отправляем конечный запрос на сервер и результат сохраняем в переменную  $result 
		$result = mysqli_query($link, $request);
	}
?>