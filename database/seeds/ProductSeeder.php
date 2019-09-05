<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("products")->insert([

            array(
                "id" => 4,
                "code" => 642852,
                "category_id" => 1, 
                "subcategory_id" => NULL, 
                "name" => "Caja de Cartón Micro Corrugado Simple con Aletas", 
                "name_slug" => "caja-de-carton-micro-corrugado-simple-con-aletas",
                "description" => "Disponibles en 5 tamaños:\r\n\r\n30 x 20 x 15 cm\r\n\r\n30 x 20 x 20 cm\r\n\r\n40 x 30 x 30 cm\r\n\r\n50 x 40 x 40 cm\r\n\r\n60 x 40 x 40 cm", 
                "main_img_path" => "imgs/products/4/15d3fc91acd0a1_square.jpg", 
                "created_at" => "2019-07-30 04:35:40", "updated_at" => "2019-07-30 20:01:38"
            ),
            array(
                "id" => 5,
                "code" => 971971,
                "category_id" => 1, 
                "subcategory_id" => 1, 
                "name" => "Caja A4 32X24X6,5cm", 
                "name_slug" => "caja-a4-32x24x65cm",
                "description" => "Caja A4 32X24X6,5.", 
                "main_img_path" => "imgs/products/5/15d3fc93b53352_square.jpg", 
                "created_at" => "2019-07-30 04:36:15", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 6,
                "code" => 432174,
                "category_id" => 1, 
                "subcategory_id" => 1, 
                "name" => "Caja para CDS 21X13X13", 
                "name_slug" => "caja-para-cds-21x13x13",
                "description" => "Caja para CDS 21X13X13.", 
                "main_img_path" => "imgs/products/6/15d3fc95d998b0_square.jpg", 
                "created_at" => "2019-07-30 04:36:53", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 7,
                "code" => 184445,
                "category_id" => 1, 
                "subcategory_id" => 4, 
                "name" => "Rollo de Cartón Corrugado 1 x 25mts", 
                "name_slug" => "rollo-de-carton-corrugado-1-x-25mts",
                "description" => "Rollos de cartón corrugado de 1 metro de ancho x 25mts de longitud.\r\n\r\nSolución para embalajes y usos varios gracias a su flexibilidad.\r\n\r\nProducto 100% biodegradable y reciclable.", 
                "main_img_path" => "imgs/products/7/15d3fc9929756a_square.jpg", 
                "created_at" => "2019-07-30 04:37:40", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 8,
                "code" => 195685,
                "category_id" => 1, 
                "subcategory_id" => 4, 
                "name" => "Rollo de Cartón Corrugado 1,40 x 25mts", 
                "name_slug" => "rollo-de-carton-corrugado-140-x-25mts",
                "description" => "Rollo de Cartón Corrugado 1,40 x 25mts.", 
                "main_img_path" => "imgs/products/8/15d3fc9ad5e696_square.jpg", 
                "created_at" => "2019-07-30 04:38:06", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 9,
                "code" => 182669,
                "category_id" => 1, 
                "subcategory_id" => 3, 
                "name" => "Film Stretch 10cm Cristal", 
                "name_slug" => "film-stretch-10cm-cristal",
                "description" => "Film Stretch 10cm Cristal.\r\n\r\nVenta minorista por unidad.\r\nVenta mayorista por caja de 16 unidades.", "main_img_path" => "imgs/products/9/15d3fc9cb54d51_square.jpg", 
                "created_at" => "2019-07-30 04:38:36", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 10,
                "code" => 922623,
                "category_id" => 1, 
                "subcategory_id" => 3, 
                "name" => "Film Stretch 50cm Cristal", 
                "name_slug" => "film-stretch-50cm-cristal",
                "description" => "Film Stretch 50cm Cristal.\r\n\r\nVenta minorista por unidad.\r\n\r\nPeso aproximado de 1 bobina = 5kg.\r\nVenta mayorista a partir de 4 bobinas.", 
                "main_img_path" => "imgs/products/10/15d3fc9e8db284_square.jpg", 
                "created_at" => "2019-07-30 04:39:14", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 11,
                "code" => 537015,
                "category_id" => 1, 
                "subcategory_id" => 2, 
                "name" => "Cinta de Embalar 48mm x 80mts", 
                "name_slug" => "cinta-de-embalar-48mm-x-80mts",
                "description" => "Cinta de Embalar 48mm x 80mts.", 
                "main_img_path" => "imgs/products/11/15d3fca1a32742_square.jpg", 
                "created_at" => "2019-07-30 04:40:04", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 12,
                "code" => 902590,
                "category_id" => 1, 
                "subcategory_id" => 2, 
                "name" => "Cinta Adhesiva FRAGIL 48mm x 40mts", 
                "name_slug" => "cinta-adhesiva-fragil-48mm-x-40mts",
                "description" => "Cinta adhesiva Fragil 48mm x 40mts.", 
                "main_img_path" => "imgs/products/12/15d3fca3bad028_square.jpg", 
                "created_at" => "2019-07-30 04:40:31", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 13,
                "code" => 303055,
                "category_id" => 2, 
                "subcategory_id" => 6, 
                "name" => "Bolsas de Consorcio Baja Densidad 60x90cm x10 Flex", 
                "name_slug" => "bolsas-de-consorcio-baja-densidad-60x90cm-x10-flex",
                "description" => "Bolsas de consorcio baja densidad 60x90cm x10 Flex.", 
                "main_img_path" => "imgs/products/13/15d3fca8b8b23d_square.jpg", 
                "created_at" => "2019-07-30 04:42:00", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 14,
                "code" => 623845,
                "category_id" => 2, 
                "subcategory_id" => 6, 
                "name" => "Bolsas Camiseta Negras Rolanplast Perla Negra Baja Densidad", 
                "name_slug" => "bolsas-camiseta-negras-rolanplast-perla-negra-baja-densidad",
                "description" => "Bolsas camiseta negras Rolanplast Perla Negra baja densidad.\r\n\r\nMedidas disponibles:\r\n\r\n30 x 40 cm x1000 unidades.\r\n\r\n40 x 50 cm x1000 unidades.\r\n\r\n45 x 60 cm x1000 unidades.\r\n\r\n50 x 70 cm x1000 unidades.\r\n\r\n60 x 80 x500 unidades.", 
                "main_img_path" => "imgs/products/14/15d3fcab24cb73_square.jpg", 
                "created_at" => "2019-07-30 04:42:34", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 15,
                "code" => 268785,
                "category_id" => 2, 
                "subcategory_id" => 5, 
                "name" => "Bolsas Plásticas Transparentes en Rollo de Arranque Inpla Alta Densidad", 
                "name_slug" => "bolsas-plasticas-transparentes-en-rollo-de-arranque-inpla-alta-densidad",
                "description" => "Bolsas Plásticas Transparentes en Rollo de Arranque Inpla Alta Densidad.\r\n\r\nMedidas disponibles:\r\n\r\n15 x 20 cm\r\n\r\n15 x 25 cm\r\n\r\n20 x 25 cm\r\n\r\n20 x 30 cm\r\n\r\n25 x 35 cm\r\n\r\n30 x 40 cm\r\n\r\n35 x 45 cm\r\n\r\n40 x 50 cm\r\n\r\n40 x 60 cm", 
                "main_img_path" => "imgs/products/15/15d3fcaf524f16_square.jpg", 
                "created_at" => "2019-07-30 04:43:38", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 16,
                "code" => 857554,
                "category_id" => 2, 
                "subcategory_id" => 5, 
                "name" => "Bolsas de Consorcio Blancas 60x90cm x10 Inpla en Rollo", 
                "name_slug" => "bolsas-de-consorcio-blancas-60x90cm-x10-inpla-en-rollo",
                "description" => "Bolsas de consorcio blancas 60x90cm Inpla en rollo.\r\n\r\nMaterial virgen no traslúcido apto para alimentos.", 
                "main_img_path" => "imgs/products/16/15d3fcb258904f_square.jpg", 
                "created_at" => "2019-07-30 04:44:22", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 17,
                "code" => 739043,
                "category_id" => 3, 
                "subcategory_id" => 8, 
                "name" => "Bandejas de Aluminio Rectangulares", 
                "name_slug" => "bandejas-de-aluminio-rectangulares",
                "description" => "Bandejas de aluminio rectangulares aptas para horno y microondas.\r\n\r\nDisponibles en 7 medidas:\r\n\r\nF50 13 x 10 x 4 cm x900 unidades.\r\n\r\nF75 16 x 12 x 5 cm x1000 unidades.\r\n\r\nF100 21 x 14 x 4 cm x500 unidades.\r\n\r\nF200 29 x 19 x 5 x300 unidades.\r\n\r\nC200 28 x 14 x 6 cm x300 unidades.\r\n\r\nF250 13 x 11 x 4 cm x1000 unidades.\r\n\r\nF275 16 x 12 x 4 cm x500 unidades.", 
                "main_img_path" => "imgs/products/17/15d3fcb8f571d3_square.jpg", 
                "created_at" => "2019-07-30 04:46:15", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 18,
                "code" => 482457,
                "category_id" => 3, 
                "subcategory_id" => 7, 
                "name" => "Vasos de Plástico Descartables Transparentes Bella Cup", 
                "name_slug" => "vasos-de-plastico-descartables-transparentes-bella-cup",
                "description" => "Vasos de plástico descartables transparentes Bella Cup.\r\n\r\nMedidas disponibles:\r\n\r\n110cc tira x100 caja x4000\r\n\r\n180cc tira x100 caja x3000\r\n\r\n220cc tira x100 caja x3000\r\n\r\n300cc tira x100 caja x2500\r\n\r\n330cc tira x100 caja x2500\r\n\r\n500cc caja x1440\r\n\r\n800cc caja x1056\r\n\r\n1000cc caja x750\r\n\r\nVenta minorista por tira.\r\n\r\nVenta mayorista por caja cerrada.", 
                "main_img_path" => "imgs/products/18/15d3fcbb7717e1_square.jpg", 
                "created_at" => "2019-07-30 04:46:53", 
                "updated_at" => "2019-07-30 19:40:46"
            ),
            array(
                "id" => 19,
                "code" => 692263,
                "category_id" => 3, 
                "subcategory_id" => 9, 
                "name" => "Platos Descartables Económicos", 
                "name_slug" => "platos-descartables-economicos",
                "description" => "Platos descartables económicos.\r\n\r\nDisponibles en 17 y 22 cm de diámetro.\r\n\r\nVenta minorista por paquete de 50 unidades.\r\n\r\nVenta mayorista por bulto de 1000 unidades.", 
                "main_img_path" => "imgs/products/19/15d3fcbe3164dd_square.jpg", 
                "created_at" => "2019-07-30 04:47:36", 
                "updated_at" => "2019-07-30 19:40:46"
            )

        ]);

        
        DB::table("product_images")->insert([

            array(
                "id" => 14, 
                "order" => 1, 
                "product_id" => 4, 
                "path" => "imgs/products/4/15d3fc91acd0a1.jpg", 
                "square_path" => "imgs/products/4/15d3fc91acd0a1_square.jpg", 
                "thumbnail_path" => "imgs/products/4/15d3fc91acd0a1_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:35:38", 
                "updated_at" => "2019-07-30 04:35:40"
            ),
            array(
                "id" => 15, 
                "order" => 1, 
                "product_id" => 5, 
                "path" => "imgs/products/5/15d3fc93b53352.jpg", 
                "square_path" => "imgs/products/5/15d3fc93b53352_square.jpg", 
                "thumbnail_path" => "imgs/products/5/15d3fc93b53352_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:36:11", 
                "updated_at" => "2019-07-30 04:36:15"
            ),
            array(
                "id" => 17, 
                "order" => 1, 
                "product_id" => 6, 
                "path" => "imgs/products/6/15d3fc95d998b0.jpg", 
                "square_path" => "imgs/products/6/15d3fc95d998b0_square.jpg", 
                "thumbnail_path" => "imgs/products/6/15d3fc95d998b0_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:36:45", 
                "updated_at" => "2019-07-30 04:36:53"
            ),
            array(
                "id" => 18, 
                "order" => 1, 
                "product_id" => 7, 
                "path" => "imgs/products/7/15d3fc9929756a.jpg", 
                "square_path" => "imgs/products/7/15d3fc9929756a_square.jpg", 
                "thumbnail_path" => "imgs/products/7/15d3fc9929756a_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:37:38", 
                "updated_at" => "2019-07-30 04:37:40"
            ),
            array(
                "id" => 19, 
                "order" => 1, 
                "product_id" => 8, 
                "path" => "imgs/products/8/15d3fc9ad5e696.jpg", 
                "square_path" => "imgs/products/8/15d3fc9ad5e696_square.jpg", 
                "thumbnail_path" => "imgs/products/8/15d3fc9ad5e696_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:38:05", 
                "updated_at" => "2019-07-30 04:38:06"
            ),
            array(
                "id" => 20, 
                "order" => 1, 
                "product_id" => 9, 
                "path" => "imgs/products/9/15d3fc9cb54d51.jpg", 
                "square_path" => "imgs/products/9/15d3fc9cb54d51_square.jpg", 
                "thumbnail_path" => "imgs/products/9/15d3fc9cb54d51_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:38:35", 
                "updated_at" => "2019-07-30 04:38:36"
            ),
            array(
                "id" => 21, 
                "order" => 1, 
                "product_id" => 10, 
                "path" => "imgs/products/10/15d3fc9e8db284.jpg", 
                "square_path" => "imgs/products/10/15d3fc9e8db284_square.jpg", 
                "thumbnail_path" => "imgs/products/10/15d3fc9e8db284_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:39:04", 
                "updated_at" => "2019-07-30 04:39:14"
            ),
            array(
                "id" => 22, 
                "order" => 1, 
                "product_id" => 11, 
                "path" => "imgs/products/11/15d3fca1a32742.jpg", 
                "square_path" => "imgs/products/11/15d3fca1a32742_square.jpg", 
                "thumbnail_path" => "imgs/products/11/15d3fca1a32742_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:39:54", 
                "updated_at" => "2019-07-30 04:40:04"
            ),
            array(
                "id" => 23, 
                "order" => 1, 
                "product_id" => 12, 
                "path" => "imgs/products/12/15d3fca3bad028.jpg", 
                "square_path" => "imgs/products/12/15d3fca3bad028_square.jpg", 
                "thumbnail_path" => "imgs/products/12/15d3fca3bad028_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:40:27", 
                "updated_at" => "2019-07-30 04:40:31"
            ),
            array(
                "id" => 24, 
                "order" => 1, 
                "product_id" => 13, 
                "path" => "imgs/products/13/15d3fca8b8b23d.jpg", 
                "square_path" => "imgs/products/13/15d3fca8b8b23d_square.jpg", 
                "thumbnail_path" => "imgs/products/13/15d3fca8b8b23d_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:41:47", 
                "updated_at" => "2019-07-30 04:42:00"
            ),
            array(
                "id" => 25, 
                "order" => 1, 
                "product_id" => 14, 
                "path" => "imgs/products/14/15d3fcab24cb73.jpg", 
                "square_path" => "imgs/products/14/15d3fcab24cb73_square.jpg", 
                "thumbnail_path" => "imgs/products/14/15d3fcab24cb73_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:42:26", 
                "updated_at" => "2019-07-30 04:42:34"
            ),
            array(
                "id" => 26, 
                "order" => 1, 
                "product_id" => 15, 
                "path" => "imgs/products/15/15d3fcaf524f16.jpg", 
                "square_path" => "imgs/products/15/15d3fcaf524f16_square.jpg", 
                "thumbnail_path" => "imgs/products/15/15d3fcaf524f16_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:43:33", 
                "updated_at" => "2019-07-30 04:43:38"
            ),
            array(
                "id" => 27, 
                "order" => 1, 
                "product_id" => 16, 
                "path" => "imgs/products/16/15d3fcb258904f.jpg", 
                "square_path" => "imgs/products/16/15d3fcb258904f_square.jpg", 
                "thumbnail_path" => "imgs/products/16/15d3fcb258904f_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:44:21", 
                "updated_at" => "2019-07-30 04:44:22"
            ),
            array(
                "id" => 28, 
                "order" => 1, 
                "product_id" => 17, 
                "path" => "imgs/products/17/15d3fcb8f571d3.jpg", 
                "square_path" => "imgs/products/17/15d3fcb8f571d3_square.jpg", 
                "thumbnail_path" => "imgs/products/17/15d3fcb8f571d3_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:46:07", 
                "updated_at" => "2019-07-30 04:46:15"
            ),
            array(
                "id" => 29, 
                "order" => 1, 
                "product_id" => 18, 
                "path" => "imgs/products/18/15d3fcbb7717e1.jpg", 
                "square_path" => "imgs/products/18/15d3fcbb7717e1_square.jpg", 
                "thumbnail_path" => "imgs/products/18/15d3fcbb7717e1_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:46:47", 
                "updated_at" => "2019-07-30 04:46:53"
            ),
            array(
                "id" => 30, 
                "order" => 1, 
                "product_id" => 19, 
                "path" => "imgs/products/19/15d3fcbe3164dd.jpg", 
                "square_path" => "imgs/products/19/15d3fcbe3164dd_square.jpg", 
                "thumbnail_path" => "imgs/products/19/15d3fcbe3164dd_thumbnail.jpg", 
                "created_at" => "2019-07-30 04:47:31", 
                "updated_at" => "2019-07-30 04:47:36"
            )


        ]);


    }
}
