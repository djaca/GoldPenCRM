<?php

use Illuminate\Database\Seeder;

class FunnelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('funnels')->insert([
            'status' => 'Hot',
        ]);

        DB::table('funnels')->insert([
            'status' => 'Warm',
        ]);

        DB::table('funnels')->insert([
            'status' => 'Cold',
        ]);

        DB::table('funnels')->insert([
            'status' => 'Dead',
        ]);

    }
}
