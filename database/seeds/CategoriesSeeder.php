<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	["order" => 1, "name" => "Embalaje", "name_slug" => "embalaje"],
        	["order" => 2, "name" => "Polietileno", "name_slug" => "polietileno"],
        	["order" => 3, "name" => "Descartables", "name_slug" => "descartables"],
        	["order" => 4, "name" => "Librería", "name_slug" => "libreria"],
        	["order" => 5, "name" => "Papelería", "name_slug" => "papeleria"],
        ]);

        DB::table('subcategories')->insert([

        	["order" => 1, "category_id" => 1, "name" => "Cajas", "name_slug" => "cajas"],
        	["order" => 2, "category_id" => 1, "name" => "Cintas de embalar", "name_slug" => "cintas-embalar"],
        	["order" => 3, "category_id" => 1, "name" => "Rollos de film Stretch", "name_slug" => "rollos-film-stretch"],
        	["order" => 4, "category_id" => 1, "name" => "Rollos de cartón corrugado", "name_slug" => "rollos-carton-corrugado"],

        	["order" => 1, "category_id" => 2, "name" => "Alta densidad", "name_slug" => "alta-densidad"],
        	["order" => 2, "category_id" => 2, "name" => "Baja densidad", "name_slug" => "baja-densidad"],

        	["order" => 1, "category_id" => 3, "name" => "Vasos", "name_slug" => "vasos"],
        	["order" => 2, "category_id" => 3, "name" => "Bandejas", "name_slug" => "bandejas"],
        	["order" => 3, "category_id" => 3, "name" => "Platos", "name_slug" => "platos"],
        	["order" => 4, "category_id" => 3, "name" => "Potes", "name_slug" => "potes"],

        	["order" => 1, "category_id" => 5, "name" => "Higiene", "name_slug" => "higiene"],
        	["order" => 2, "category_id" => 5, "name" => "Sobres", "name_slug" => "sobres"],
        	["order" => 3, "category_id" => 5, "name" => "Bolsas", "name_slug" => "bolsas"],

        ]);


    }
}
