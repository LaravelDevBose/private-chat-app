<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(\App\User::class)->create(
            [
                'name'=>'Arup',
                'email'=>'arup@gm.com',
            ]
        );
        factory(\App\User::class)->create(
            [
            'name'=>'Bose',
            'email'=>'bose@gm.com',
            ]
        );
        factory(\App\User::class)->create(
            [
                'name'=>'joy',
                'email'=>'joy@gm.com'
            ]
        );
    }
}
