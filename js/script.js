window.onload = function () {
	// !Управление сортировкой 
	let btnUp = document.querySelector(".filter__btn__up");
	let btnDown = document.querySelector(".filter__btn__down");

	btnUp.addEventListener("click", function () {
		this.classList.add("active");
		btnDown.classList.remove("active");
	})

	btnDown.addEventListener("click", function () {
		this.classList.add("active");
		btnUp.classList.remove("active");
	})

	// !Управление статусом 
	let btnActive = document.querySelector(".filter__condition__active");
	let btnNonactive = document.querySelector(".filter__condition__nonactive");

	btnActive.addEventListener("click", function () {
		this.classList.add("green");
		btnNonactive.classList.remove("red");
	})

	btnNonactive.addEventListener("click", function () {
		this.classList.add("red");
		btnActive.classList.remove("green");
	})

	// !Сброс настроек
	document.querySelector(".main__buttons__item input[type = 'reset'").onclick = function () {
		btnUp.classList.remove("active");
		btnDown.classList.remove("active");
		btnActive.classList.remove("green");
		btnNonactive.classList.remove("red");
	}

	// !Открываем/Закрываем фильтрацию 
	$(".filter__manage").on("click", function () {
		if ($(".main__buttons").css("display") == "none") {
			$(this).text("Убрать фильтрацию");
		} else {
			$(this).text("Показать фильтрацию");
		}
		$(".main__items__filters").fadeToggle(300);
		$(".main__buttons").fadeToggle(300);

	})
}