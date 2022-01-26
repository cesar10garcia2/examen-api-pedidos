<?php

use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'nombre' => 'Lentejas al curry con verduras y pollo',
            'descripcion' => 'Ingredientes: Pollo (carne pulpa), Lenteja bebe, Yuca amarilla fresca sin cáscara, Zucchini, Zanahoria fresca sin cáscara, Tomate, Pimiento rojo, Apio sin hojas, Cebolla roja, Curry, Orégano fresco, Ajo sin cáscara, Zucchini, Zanahoria fresca sin cáscara, Tomate, Pimiento rojo, Apio sin hojas, Curry',
            'url_imagen' => 'https://cms-manzanaverde.s3.amazonaws.com/storage/images/500x293-626-lentejas-al-curry-con-verduras-y-pollor.jpeg',
            'precio_venta' => '11',
            'costo_total' => '6'
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Lomo de res horneado',
            'descripcion' => 'Ingredientes: Bistec de res, Papa blanca, Ajo en polvo, Pimienta negra, Paprika, Tomillo, Sal, Orégano molido, Sillao, Mantequilla con sal (No margarina), Romero, vinagre de manzana, Cebolla roja, Pimiento rojo, Pimiento Amarillo, Pimiento verde, Champiñones, Arroz integral',
            'url_imagen' => 'https://cms-manzanaverde.s3.amazonaws.com/storage/images/500x293-806-lomo-de-res-horneador.jpeg',
            'precio_venta' => '11',
            'costo_total' => '6'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Croquetas de atún',
            'descripcion' => 'Ingredientes: Filete o trozos de atún, Huevo, Perejil sin tallo, Pan molido, Cebolla blanca, Tomate, Pimiento rojo, Papa blanca, Arveja fresca sin vaina, Zanahoria fresca sin cáscara, Pimiento rojo, Choclo, Perejil sin tallo, Aceite de olivo',
            'url_imagen' => 'https://cms-manzanaverde.s3.amazonaws.com/storage/images/500x293-603-croquetas-de-atunr.jpeg',
            'precio_venta' => '11',
            'costo_total' => '6'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Ensalada fizz',
            'descripcion' => 'Ingredientes: Filete o trozos de atún, Espinaca, Tomate, Zanahoria fresca sin cáscara, Cebolla blanca, Maracuya, Sal, Pimienta negra, Azúcar rubia, Vinagre Blanco, Aceite de olivo, Semillas de chía',
            'url_imagen' => 'https://cms-manzanaverde.s3.amazonaws.com/storage/images/500x293-634-ensalada-fizz.jpeg',
            'precio_venta' => '11',
            'costo_total' => '6'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Ensalada de fideos',
            'descripcion' => 'Ingredientes: Jamón de pavita, Queso fresco de vaca, Pasta Fusilli, Zanahoria fresca sin cáscara, Arveja fresca sin vaina, Jugo de Limón, Aceite vegetal, Ajo sin cáscara, Sal, Perejil sin tallo, Pimiento rojo',
            'url_imagen' => 'https://cms-manzanaverde.s3.amazonaws.com/storage/images/500x293-118-ensalada-de-fideos.jpeg',
            'precio_venta' => '11',
            'costo_total' => '6'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Ensalada de beterraga',
            'descripcion' => 'Ingredientes: Filete de pechuga de pollo, Betarraga, Espinaca, Cebolla blanca, Miel de abeja, Vinagre balsámico, Aceite de olivo, Perejil sin tallo',
            'url_imagen' => 'https://cms-manzanaverde.s3.amazonaws.com/storage/images/500x293-251-ensalada-de-beterraga.jpeg',
            'precio_venta' => '11',
            'costo_total' => '6'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Lentejas al curry con verduras y pollo',
            'descripcion' => 'Ingredientes: Pollo (carne pulpa), Lenteja bebe, Yuca amarilla fresca sin cáscara, Zucchini, Zanahoria fresca sin cáscara, Tomate, Pimiento rojo, Apio sin hojas, Cebolla roja, Curry, Orégano fresco, Ajo sin cáscara, Zucchini, Zanahoria fresca sin cáscara, Tomate, Pimiento rojo, Apio sin hojas, Curry',
            'url_imagen' => 'https://cms-manzanaverde.s3.amazonaws.com/storage/images/500x293-626-lentejas-al-curry-con-verduras-y-pollor.jpeg',
            'precio_venta' => '11',
            'costo_total' => '6'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Lomo de res horneado',
            'descripcion' => 'Ingredientes: Bistec de res, Papa blanca, Ajo en polvo, Pimienta negra, Paprika, Tomillo, Sal, Orégano molido, Sillao, Mantequilla con sal (No margarina), Romero, vinagre de manzana, Cebolla roja, Pimiento rojo, Pimiento Amarillo, Pimiento verde, Champiñones, Arroz integral',
            'url_imagen' => 'https://cms-manzanaverde.s3.amazonaws.com/storage/images/500x293-806-lomo-de-res-horneador.jpeg',
            'precio_venta' => '11',
            'costo_total' => '6'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Croquetas de atún',
            'descripcion' => 'ngredientes: Filete o trozos de atún, Huevo, Perejil sin tallo, Pan molido, Cebolla blanca, Tomate, Pimiento rojo, Papa blanca, Arveja fresca sin vaina, Zanahoria fresca sin cáscara, Pimiento rojo, Choclo, Perejil sin tallo, Aceite de olivo',
            'url_imagen' => 'https://cms-manzanaverde.s3.amazonaws.com/storage/images/500x293-603-croquetas-de-atunr.jpeg',
            'precio_venta' => '11',
            'costo_total' => '6'
        ]);

        DB::table('productos')->insert([
            'nombre' => 'Refresco de piña',
            'descripcion' => 'Refresco de piña',
            'url_imagen' => 'https://cms-manzanaverde.s3.amazonaws.com/storage/images/500x293-905-refresco-de-pina.jpeg',
            'precio_venta' => '11',
            'costo_total' => '6'
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Cebada',
            'descripcion' => 'Cebada',
            'url_imagen' => 'https://cms-manzanaverde.s3.amazonaws.com/storage/images/500x293-52-cebada.png',
            'precio_venta' => '11',
            'costo_total' => '6'
        ]);
    }
}
