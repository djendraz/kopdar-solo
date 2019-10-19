<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Select2;
use Faker\Generator as Faker;

$factory->define(Select2::class, function (Faker $faker) {
	return [
		'nama'	 => $faker->name,
		'no_hp'		 => $faker->e164PhoneNumber,
		'email' 	 => $faker->unique()->safeEmail,
	];
});
