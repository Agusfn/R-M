<?php

/*
|--------------------------------------------------------------------------
| Admin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::namespace('Admin')->prefix('admin9eUHt3J')->group(function() {


	/**
	 * Auth routes
	 */
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');


	/**
	 * Home
	 */
	Route::get("/", "HomeController@index")->name("admin.home");


	/**
	 * Account
	 */
	Route::get("cuenta", "AccountController@showForm")->name("admin.account");
	Route::post("cuenta", "AccountController@updateAccount");


	/**
	 * Cover pages
	 */
	Route::get("portadas", "CoverImagesController@showOverview")->name("admin.covers.overview");

	Route::get("portadas/navbar", "CoverImagesController@showNavbarFeaturedForm")->name("admin.covers.navbarfeatured");
	Route::post("portadas/navbar", "CoverImagesController@changeNavbarFeatured");

	Route::get("portadas/slider1", "CoverImagesController@showSliderOneFeaturedForm")->name("admin.covers.slider1featured");
	Route::post("portadas/slider1", "CoverImagesController@changeSliderOneFeatured");

	Route::get("portadas/slider2", "CoverImagesController@showSliderTwoFeaturedForm")->name("admin.covers.slider2featured");
	Route::post("portadas/slider2", "CoverImagesController@changeSliderTwoFeatured");

	Route::get("portadas/item-slider/agregar", "CoverImagesController@showAddCarouselItemForm")->name("admin.covers.carouselitem.create");
	Route::post("portadas/item-slider/agregar", "CoverImagesController@addCarouselItem");
	Route::post("portadas/item-slider/eliminar/{id}", "CoverImagesController@deleteCarouselItem")->name("admin.covers.carouselitem.delete");
	Route::get("portadas/item-slider/editar/{id}", "CoverImagesController@showCarouselItemEditForm")->name("admin.covers.carouselitem.edit");
	Route::post("portadas/item-slider/editar/{id}", "CoverImagesController@editCarouselItem");


	Route::get("portadas/obtener_productos", "CoverImagesController@fetchProducts")->name("admin.covers.fetch-products");


	/**
	 * Products
	 */
	Route::get("productos", "ProductsController@list")->name("admin.products.list");
	Route::get("productos/crear", "ProductsController@showCreateForm")->name("admin.products.create");
	Route::post("productos/crear", "ProductsController@create");
	Route::get("productos/{id}", "ProductsController@details")->name("admin.products.details");
	Route::post("productos/subir-imagen", "ProductsController@uploadImage")->name("admin.products.upload-image");
	Route::post("productos/eliminar-imagen", "ProductsController@deleteImage")->name("admin.products.delete-image");
	Route::post("productos/{id}/modificar", "ProductsController@update")->name("admin.products.update");
	Route::post("productos/{id}/eliminar", "ProductsController@delete")->name("admin.products.delete");


	/**
	 * Categories
	 */
	Route::get("categorias", "CategoriesController@list")->name("admin.categories.list");
	Route::post("categorias/crear", "CategoriesController@create")->name("admin.categories.create");
	Route::post("categorias/reordenar", "CategoriesController@reorderCategories")->name("admin.categories.reorder");
	Route::get("categorias/{id}", "CategoriesController@details")->name("admin.categories.details");
	Route::post("categorias/{id}/modificar", "CategoriesController@update")->name("admin.categories.update");
	Route::post("categorias/{id}/eliminar", "CategoriesController@delete")->name("admin.categories.delete");


	/**
	 * Subcategories
	 */
	Route::post("subcategorias/crear", "SubcategoriesController@create")->name("admin.subcategories.create");
	Route::post("subcategorias/reordenar", "SubcategoriesController@reorder")->name("admin.subcategories.reorder");
	Route::get("subcategorias/{id}", "SubcategoriesController@details")->name("admin.subcategories.details");
	Route::post("subcategorias/{id}/modificar", "SubcategoriesController@update")->name("admin.subcategories.update");
	Route::post("subcategorias/{id}/eliminar", "SubcategoriesController@delete")->name("admin.subcategories.delete");

	

});






