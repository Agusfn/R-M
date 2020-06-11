jQuery( document ).ready(function( $ ) {

	

	$("select#search-filter-category").change(function() {
		if($(this).val() == "")
			$(this).prop("name", "");
		else
			$(this).prop("name", "categoria");
	});


	$(".shop-side-bar .checkbox-primary ul li label").click(function() {
		if($(this).parent().prop("tagName") == "A")
			window.location.href = $(this).parent().attr("href");
	})

});