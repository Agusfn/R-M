$(document).ready(function() {

	$("#navbar_featured_form input[name=mostrar]").change(function() {
		var value = $(this).val();


		if(value != "producto") {
			$("#navbar_featured_product_picker .product-picker-button").addClass("disabled");
			$("#navbar_featured_product_picker .product-picker-selected-change a").addClass("disabled");
		}
		else {
			$("#navbar_featured_product_picker .product-picker-button").removeClass("disabled");
			$("#navbar_featured_product_picker .product-picker-selected-change a").removeClass("disabled");
		}

		if(value != "personalizado") {
			$("input[name=custom_title], input[name=url_action], input[name=image_file]").prop("disabled", true);
		}
		else {
			$("input[name=custom_title], input[name=url_action], input[name=image_file]").prop("disabled", false);
		}

	});

	$("#submit_navbar_featured").click(function() {

		var opc = $("#navbar_featured_form input[name=mostrar]:checked").val();

		if(opc == "producto") {
			if(!$("input[name=product_id]").val()) {
				alert("Selecciona un producto.");
				return;
			}
		}
		else if(opc == "personalizado") {
			if(!$("input[name=image_file]").prop("disabled") && !$("input[name=image_file]").val()) {
				alert("Selecciona una imágen");
				return;
			}
		}

		$("#navbar_featured_form").submit();
	});


});
