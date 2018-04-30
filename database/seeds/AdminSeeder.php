<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql')->table('users')->insert([
            'name' => 'admin',
            'email' => 'admin',
            'password' => 'admin'
        ]);
    }
}
