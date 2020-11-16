<?php 
	/*! Так как данных  может быть очень много, я решил сделать пагинацию для более удобного
	вывода пользователю => Создаем новый массив, куда будут приходить данные, считаем количество
	страниц  и выводим*/
	$terminals = [];
	while($item = mysqli_fetch_assoc($result)){
		array_push($terminals, $item);
	}
	
	$page = intval($_GET['page']) ?: 1;
	$limit = 6; // Кол-во элементов за раз
	$offset = ($page - 1) * $limit;
	$terminals_quantity = count($terminals);
	$pages = $terminals_quantity  / $limit;
	$pages_total = ceil($pages);
	
	// !Обреазем массив для пагинации
	$result = array_slice($terminals, $offset, $limit, true);

?>