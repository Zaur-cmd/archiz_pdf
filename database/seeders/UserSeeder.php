<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Create user
         * */
        User::create([
            'name'          => 'Amber Ernser',
            'phone'         => '123456789',
            'password'      => 'password',
            'email'         => 'amber@mail.com',
        ]);

        User::create([
            'name'          => 'Amber Ernser',
            'email'         => 'new@gmail.com',
            'phone'         => '902222900',
            'password'      => 'password',
        ]);
    }
}
