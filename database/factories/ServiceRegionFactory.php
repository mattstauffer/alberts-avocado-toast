<?php

use Faker\Generator as Faker;

$factory->define(App\ServiceRegion::class, function (Faker $faker) {
    return [
        'name' => $faker->country,
        'shape' => function ($raw) use ($faker) {
            // Set the center in Gainesville
            $pointOne = [
                $faker->randomFloat(8, -82.422468, -82.255709),
                $faker->randomFloat(8, 29.617588, 29.702352),
            ];

            // Offset the center by up to a from Gainesville
            $pointOne[0] += $faker->randomFloat(2, -1, 1);
            $pointOne[1] += $faker->randomFloat(2, -1, 1);

            // Go east one quarter degree
            $pointTwo = [
                $pointOne[0] + 0,
                $pointOne[1] + 0.25,
            ];

            // Go south one degree
            $pointThree = [
                $pointOne[0] - 0.25,
                $pointOne[1] + 0.25,
            ];

            return DB::raw(sprintf(
                "ST_PointFromText('POLYGON((%s %s, %s %s, %s %s, %s %s))', 4326)",
                $pointOne[0],
                $pointOne[1],
                $pointTwo[0],
                $pointTwo[1],
                $pointThree[0],
                $pointThree[1],
                $pointOne[0],
                $pointOne[1]
            ));
        },
    ];
});
