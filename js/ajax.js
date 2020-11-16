/* !Попробовал аякс запрос, чтобы не перезагружать  страницу (только для города)
$(document).ready(function () {
	$('#city').change(function () {
		$.ajax({
			type: "POST",
			url: "filter.php",
			data: "city=" + $("#city").val(),
			success: function (html) {
				$("body").html(html);
				console.log(this.data);
			}
		});
		return false;
	});
});
*/




