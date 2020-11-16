<?php
	// !Подключаем бд 
	include "php/database.php";
	
	// !Все данные
	$result = mysqli_query($link, "SELECT * FROM `terminals`");
	// !Подключаем фильтрацию
	include "php/filter.php";

	// !Подключаем пагинацию
	include "php/pagination.php";

	// !Все уникальные города
	$unicCity = mysqli_query($link, "SELECT DISTINCT city FROM terminals") or die(mysqli_error($link));
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Terminals</title>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
</head>

<body>
	<header class="header">
		<div class="container">
			<div class="header__content">
				<h1 class="header__content__title">Поиск <span class="lightning">терминалов</span> по всему Казахстану</h1>
				<h2 class="header__content__subtitle">Найдите нужный вам терминал в любом городе РК</h2>
			</div>
		</div>
	</header>
	<main class="main">
		<div class="container">
			<div class="main__title">Терминалы</div>

			<div id="content"></div>


			<div class="filter__manage">Убрать фильтрацию</div>
			<form action="" method="post" name="ourForm">
			
				<div class="main__items__filters">
					<div class="filter">
						<div class="filter__title">Город</div>

						<div class="filter__flex">
						<!-- !Берез из бд все уникальные города-->
							<select name="city" id="city">
								<option value="*">Все</option>
								<?php while($city = mysqli_fetch_assoc($unicCity)): ?>
									<option value="<?php echo $city["city"]?>"><?php echo $city["city"]?></option>
									
								<?php endwhile; ?>
							</select>
						</div>
					</div>


					<div class="filter">
						<div class="filter__title">Фильтрация</div>
						<div class="filter__flex">
							<select name="theme">
										<option value="nothing" selected>-</option>

										
										<option value="city">город</option>
										<option value="organization">организация</option>
										<option value="address">адрес</option>
										<option value="conf">конфигурация</option>
							</select>
						
							<div class="filter__btn">
								<label class="filter__btn__up">								
									<input type="radio" value="DESC" name="filterBtn">
								</label>
								<label class="filter__btn__down">
									<input type="radio" value="ASC" name="filterBtn">
								</label>
							</div>
						</div>
					</div>


					<div class="filter">
						<div class="filter__title">Текущий статус</div>
						<div class="filter__flex">
							<div class="filter__status">
								<label class="filter__condition filter__condition__active">Активный
									<input type="radio" value="1" name="controlBtn">
								</label>
								<label class="filter__condition filter__condition__nonactive">Выключенный
									<input type="radio" value="0" name="controlBtn">
								</label>
							</div>
						</div>
					</div>

				
				</div>

				<div class="main__buttons">
					<div class="main__buttons__item">
						<input type="submit" value="Найти">
					</div>
					<div class="main__buttons__item">
						<input type="reset" value="Сбросить">
					</div>
					
				</div>
				
			</form>
			
			<div class="main__items">
				<!-- Генерируем Dom дерево (терминалы), параллельно берем данные из БД -->
				<?php foreach($result as $i => $terminal): ?>
				<div class="terminal">

					<div class="terminal__img">
						<img src="img/terminal.png" alt="terminal">
					</div>
					<div class="terminal__content">
						<div class="terminal__item">
							<div class="terminal__item__title">Город</div>				
							<div class="terminal__item__text"><?php echo ($terminal["city"]);?></div>
						</div>
						<div class="terminal__item">
							<div class="terminal__item__title">Организация</div>				
							<div class="terminal__item__text"><?php echo ($terminal["organization"]);?></div>
						</div>
						<div class="terminal__item">
							<div class="terminal__item__title">Адрес</div>			
							<div class="terminal__text"><?php echo ($terminal["address"]);?></div>			
						</div>
						<div class="terminal__item">
							<div class="terminal__item__title">Конфигурация</div>		
							<div class="terminal__text"><?php echo ($terminal["conf"]);?></div>			
						</div>
						<!-- Текущий статус => Активный/Не активный -->
						<div class="terminal__isActive <?php if($terminal["active"] == 1): ?><?php echo termActive ?><?php endif; ?>"></div>
					</div>
				</div>
				<?php endforeach; ?>

			</div>

			<!-- Делаем пагинацию (добавляем кнопки) -->
			<div class="main__pages">
				<?php for($i = 1; $i <= $pages_total; $i++): ?>
					<a href="http://localhost/test/index.php?page=<?php echo $i ?>" class="main__pages__item <?= $i === $page ? 'current' : '' ?>"><?php echo $i ?></a>
				<?php endfor; ?>
			</div>
				
			</div> <!-- </main__items> -->
		</div>
	</main>
	<footer class="footer">
		<div class="container">
			<div>Наш адрес: ...</div>
		</div>
	</footer>

	<script src="js/jquery-3.5.1.js"></script>
	<script src="js/script.js"></script>
	<script src="js/ajax.js"></script>
</body>

</html>