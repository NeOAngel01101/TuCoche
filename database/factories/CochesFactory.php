<?php
/**
 * Created by PhpStorm.
 * User: Rayzzer
 * Date: 01/01/2018
 * Time: 11:42
 */
use Faker\Generator as Faker;
use \Carbon\Carbon;


$factory->define(App\Coche::class, function (Faker $faker) {
    $timeyear = Carbon::createFromTimestamp($faker->dateTimeThisYear()->getTimestamp());

    return [
        'nombre' => $faker->sentence($nbWords = 3, $variableNbWords = true) ,
        'localidad' => $faker->country,
        'descripcion'     => $faker->word,
        'marca' =>$faker->word,
        'tipo' => $faker->numberBetween(2,6),
        'repostaje' =>$faker->word,
        'year' => $timeyear,
        'cambio' => $faker->word,
        'imagen1' => $faker->word,
        'kilometros' => $faker->numberBetween(0,900000),
        'cv' => $faker->numberBetween(0,600),
        'precio' => $faker->numberBetween(0,200000),
        'imagen1'  => 'https://motor.elpais.com/wp-content/uploads/2017/04/17112517/2017_04_17_f-pace3-500x308.jpg',

    ];
});