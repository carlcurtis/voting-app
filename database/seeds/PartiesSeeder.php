<?php

use Illuminate\Database\Seeder;

class PartiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('voting.parties')->insert([
          'name' => 'Party One',
      ]);
      DB::table('voting.parties')->insert([
          'name' => 'Party Two',
      ]);
      DB::table('voting.parties')->insert([
          'name' => 'Party Three',
      ]);
    }
}
