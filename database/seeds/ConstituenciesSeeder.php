<?php

use Illuminate\Database\Seeder;

class ConstituenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('voting.constituencies')->insert([
            'name' => 'Constit One',
        ]);
        DB::table('voting.constituencies')->insert([
            'name' => 'Constit Two',
        ]);
        DB::table('voting.constituencies')->insert([
            'name' => 'Constit Three',
        ]);
    }
}
