<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Train;

class TrainTableSeeder extends Seeder
{
    public function run()
    {
        
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            $train = new Train();

           
            $train->azienda = $faker->company;
            $train->stazione_di_partenza = $faker->city;
            $train->stazione_di_arrivo = $faker->city;

            $orarioPartenza = $faker->time();
            $orarioArrivo = $faker->time();

            while ($orarioArrivo === $orarioPartenza) {
                $orarioArrivo = $faker->time();
            }

            $train->orario_di_partenza = $orarioPartenza;
            $train->orario_di_arrivo = $orarioArrivo;
            $train->codice_treno = $faker->bothify('??####');
            $train->numero_carrozze = $faker->numberBetween(4, 12);
            $train->in_orario = $faker->boolean();
            $train->cancellato = $faker->boolean();

            $train->save();
        }
    }
}