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
        factory(App\User::class, 9)->create();
        App\User::create([
        	'name' => 'Javier Castro',
            'email'=> 'javiercastro.ik@gmail.com',
            'email_verified_at' => now(),
        	'password' => bcrypt('123')
        ]);
    }
}
