<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*


Route::get('/', 'HomeController@index')->name('home');



/**
 * Auth routes
 */
Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\Auth\LoginController@login');
Route::post('admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');



Route::get("admin", "Admin\HomeController@index")->name("admin.home");



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
