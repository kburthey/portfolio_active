$(document).ready(function() {
	$("#account").click(function() {
		$(".AM").show();
		$(".CS").hide();
		$(".GD").hide();
	});

});

$(document).ready(function() {
	$("#customer").click(function() {
		$(".CS").show();
		$(".GD").hide();
		$(".AM").hide();
	});

});

$(document).ready(function() {
	$("#graphic").click(function() {
		$(".GD").show();
		$(".CS").hide();
		$(".AM").hide();
	});
});

$(document).ready(function() {
	$("#all").click(function() {
		$(".GD").show();
		$(".CS").show();
		$(".AM").show();
	});
});