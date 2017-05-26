$(document).ready(


	function(){

		$(".btnDel").click(function(){
		$(this).parent().remove();
		});


		$("#btnCancelarReceta").click(function(){
			window.location.href = "/user/profile";
		});
		$("#btnAddIngredient").click(function(){
			var ingredient = $("#ingrediente").val();

			if(ingredient != "" && ingredient != null && ingredient != undefined){
				var htmlText = "<li>" + "<input type='hidden' name='ingredientes[]' value='"+ingredient+"'/>"+ ingredient + " <button type='button' class='btnDel btn btn-default glyphicon glyphicon-remove'></button>"+"</li>";

				$("#ingrediente").val("");

				$("#ingredientList").append(htmlText);

				$(".btnDel").click(function(){
					$(this).parent().remove();
				});
			}
		});
		$("#btnAddStep").click(function(){
			var step = $("#paso").val();
			if(step != "" && step != null && step != undefined){
				var htmlText = "<li>" + "<input type='hidden' name='pasos[]' value='"+step+"'/>"+ step + " <button type='button' class='btnDel btn btn-default glyphicon glyphicon-remove'></button>"+"</li>";

				$("#paso").val("");

				$("#stepList").append(htmlText);

				$(".btnDel").click(function(){
					$(this).parent().remove();
				});
			}
		});

		$("#btnAgregar").click(function(){
			if($('#ingredientList li').length > 0 && $('#stepList li').length > 0){

				if($("#nombreReceta").val() != "" && $("#nombreReceta").val() != undefined){
					if( ($("#foto").val() != "" && $("#foto").val() != undefined) || $("#tipoAccion").text().includes("Editar") ){

						if($("input[name='generos[]']:checked").length != 0){

							$("#formReceta").submit();

						}else{
							alert("Favor de seleccionar una categoria");
						}

					}else{
						alert("Favor de seleccionar una foto");
					}
				}else{
					alert("Favor de ponerle un nombre a la receta");
				}

			}else{
				alert("Favor de agregar ingredientes y pasos");
			}
		});

	});