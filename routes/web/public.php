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


Route::get("/", 'HomeController@index')->name('home');

Route::get("contacto", "HomeController@contact")->name("contact");
Route::post("contacto", "HomeController@submitMessage");

Route::get("buscar", "CatalogController@search")->name("search");
Route::get("{category_slug}", "CatalogController@category")->name("category");
Route::get("{category_slug}/{subcategory_slug}", "CatalogController@subcategory")->name("subcategory");

Route::get("{category_slug}/{product_id}/{product_name_slug}", "CatalogController@productWithoutSubcat")->name("product-no-subcategory");
Route::get("{category_slug}/{subcategory_slug}/{product_id}/{product_name_slug}", "CatalogController@product")->name("product");
