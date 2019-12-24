var currentProductPicker;
var productPickerList;
var productPickCallback;

$(document).ready(function() {


	$(".product-picker-button, .product-picker-selected-change a").click(function() {
		if($(this).hasClass("disabled")) {
			return;
		}
		currentProductPicker = $(this).closest(".product-picker");
		$("#product_pick_modal").modal("show");
		reloadProductPickerModal();
	});


	/* Modal */
	$('body').on('click', '#product_pick_table tbody tr', function() {
		var productId = $(this).data("product-id");
		var product = productPickerList[productId];

		$("#product_pick_modal").modal("hide");

		if(currentProductPicker) {
			currentProductPicker.find(".product-picker-input").val(product.id);
			currentProductPicker.find(".product-picker-selected-img").attr("src", storageUrl + product.main_img_path);
			currentProductPicker.find(".product-picker-selected-name").text(product.name);

			currentProductPicker.find(".product-picker-button").hide();
			currentProductPicker.find(".product-picker-selected").show();
		}

		if(productPickCallback) {
			productPickCallback(product);
		}


	});	


	$("#product_pick_modal").on("hidden.bs.modal", function(e) {
		currentProductPicker = null;
		productPickCallback = null;
	});

});


/**
 * Función para pedir la selección de un producto.
 * @param  {Function} callback [description]
 * @return {[type]}            [description]
 */
function askForProductSelection(callback) {
	$("#product_pick_modal").modal("show");
	productPickCallback = callback;
	reloadProductPickerModal();
}



/**
 * Limpiar y recargar tabla de productos.
 * @return {[type]} [description]
 */
function reloadProductPickerModal() {
	
	$("#product_pick_table tbody").empty();

	$.ajax({
		method: 'GET',
		url: productFetchResUrl,

		success: function(data, status) {
			console.log(data);
			productPickerList = [];

			data.forEach(function(product) {
				
				productPickerList[product.id] = product;

				var row = `
				<tr data-product-id='` + product.id + `'>
					<td><img src='` + storageUrl + product.main_img_path + `'></td>
					<td>` + product.name + `</td>
					<td>` + product.category.name + `</td>
					<td>` + (product.subcategory != null ? product.subcategory.name : '') + `</td>
				</tr>`;

				$("#product_pick_table tbody").append(row);

			});

		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
        	console.log(XMLHttpRequest);
    	}
	});

}