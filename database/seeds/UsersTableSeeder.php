<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'ABC',
            'email' => 'abc@abc.com',
            'password'  => bcrypt('secret'),
        ]);
    }
}
