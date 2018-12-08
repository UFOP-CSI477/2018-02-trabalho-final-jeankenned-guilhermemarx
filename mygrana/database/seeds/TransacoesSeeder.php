<?php

use Illuminate\Database\Seeder;
use App\Transacao;
use Faker\Factory as Faker;

class TransacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transacoes')->truncate();
        $faker = Faker::create();

        foreach(range(1,2) as $i){

          Transacao::create([
            'user_id' => '1',
            'valor' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.50 , $max = 1000),
            'tipo' => $i%2,
            'categoria_id' => $i%8+1,
            'data' => $faker->dateTimeThisYear( $max = 'now', $timezone = null)
          ]);
        }

        foreach(range(1,10) as $i){

          Transacao::create([
            'user_id' => '1',
            'valor' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.50 , $max = 100),
            'tipo' => $i%2,
            'categoria_id' => $i%8+1,
            'data' => $faker->dateTimeThisYear( $max = 'now', $timezone = null)
          ]);
        }
        foreach(range(1,100) as $i){

          Transacao::create([
            'user_id' => '1',
            'valor' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0.50 , $max = 20),
            'tipo' => $i%2,
            'categoria_id' => $i%8+1,
            'data' => $faker->dateTimeThisYear( $max = 'now', $timezone = null)
          ]);
        }

    }
}
