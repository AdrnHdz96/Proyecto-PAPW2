$(document).ready(
	function(){
		$("#btnAddIngredient").click(function(){
			var ingredient = $("#ingrediente").val();

			var htmlText = "<li>" + ingredient + " <button type='button' class='btnDel btn btn-default glyphicon glyphicon-remove'></button>"+"</li>";

			$("#ingrediente").val("");

			$("#ingredientList").append(htmlText);

			$(".btnDel").click(function(){
				$(this).parent().remove();
			});
		});
	$("#btnAddStep").click(function(){
			var step = $("#paso").val();

			var htmlText = "<li>" + step + " <button type='button' class='btnDel btn btn-default glyphicon glyphicon-remove'></button>"+"</li>";

			$("#paso").val("");

			$("#stepList").append(htmlText);

			$(".btnDel").click(function(){
				$(this).parent().remove();
			});
		});
});