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


/**
 * Auth routes
 */
Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\Auth\LoginController@login');
Route::post('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');


/**
 * Home
 */
Route::get("admin", "Admin\HomeController@index")->name("admin.home");


/**
 * Account
 */
Route::get("admin/cuenta", "Admin\AccountController@showForm")->name("admin.account");
Route::post("admin/cuenta", "Admin\AccountController@updateAccount");


/**
 * Cover pages
 */
Route::get("admin/portadas", "Admin\CoverImagesController@showOverview")->name("admin.covers.overview");

Route::get("admin/portadas/navbar", "Admin\CoverImagesController@showNavbarFeaturedForm")->name("admin.covers.navbarfeatured");
Route::post("admin/portadas/navbar", "Admin\CoverImagesController@changeNavbarFeatured");

Route::get("admin/portadas/slider1", "Admin\CoverImagesController@showSliderOneFeaturedForm")->name("admin.covers.slider1featured");
Route::post("admin/portadas/slider1", "Admin\CoverImagesController@changeSliderOneFeatured");

Route::get("admin/portadas/slider2", "Admin\CoverImagesController@showSliderTwoFeaturedForm")->name("admin.covers.slider2featured");
Route::post("admin/portadas/slider2", "Admin\CoverImagesController@changeSliderTwoFeatured");

Route::get("admin/portadas/item-slider/agregar", "Admin\CoverImagesController@showAddCarouselItemForm")->name("admin.covers.carouselitem.create");
Route::post("admin/portadas/item-slider/agregar", "Admin\CoverImagesController@addCarouselItem");
Route::post("admin/portadas/item-slider/eliminar/{id}", "Admin\CoverImagesController@deleteCarouselItem")->name("admin.covers.carouselitem.delete");
Route::get("admin/portadas/item-slider/editar/{id}", "Admin\CoverImagesController@showCarouselItemEditForm")->name("admin.covers.carouselitem.edit");
Route::post("admin/portadas/item-slider/editar/{id}", "Admin\CoverImagesController@editCarouselItem");


Route::get("admin/portadas/obtener_productos", "Admin\CoverImagesController@fetchProducts");




/**
 * Products
 */
Route::get("admin/productos", "Admin\ProductsController@list")->name("admin.products.list");
Route::get("admin/productos/crear", "Admin\ProductsController@showCreateForm")->name("admin.products.create");
Route::post("admin/productos/crear", "Admin\ProductsController@create");
Route::get("admin/productos/{id}", "Admin\ProductsController@details")->name("admin.products.details");
Route::post("admin/productos/subir-imagen", "Admin\ProductsController@uploadImage");
Route::post("admin/productos/eliminar-imagen", "Admin\ProductsController@deleteImage");
Route::post("admin/productos/{id}/modificar", "Admin\ProductsController@update");
Route::post("admin/productos/{id}/eliminar", "Admin\ProductsController@delete");


/**
 * Categories
 */
Route::get("admin/categorias", "Admin\CategoriesController@list")->name("admin.categories.list");
Route::post("admin/categorias/crear", "Admin\CategoriesController@create");
Route::post("admin/categorias/reordenar", "Admin\CategoriesController@reorderCategories");
Route::get("admin/categorias/{id}", "Admin\CategoriesController@details")->name("admin.categories.details");
Route::post("admin/categorias/{id}/modificar", "Admin\CategoriesController@update");
Route::post("admin/categorias/{id}/eliminar", "Admin\CategoriesController@delete");


/**
 * Subcategories
 */
Route::post("admin/subcategorias/crear", "Admin\SubcategoriesController@create");
Route::post("admin/subcategorias/reordenar", "Admin\SubcategoriesController@reorder");
Route::get("admin/subcategorias/{id}", "Admin\SubcategoriesController@details")->name("admin.subcategories.details");
Route::post("admin/subcategorias/{id}/modificar", "Admin\SubcategoriesController@update");
Route::post("admin/subcategorias/{id}/eliminar", "Admin\SubcategoriesController@delete");

