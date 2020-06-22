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
        $user = App\User::create([
            'name' => 'Ibroh24',
            'email' => 'admin@faajs.com',
            'password' => bcrypt('Password@1'),
            'avatar'=> 'images/defaultAvatar.png',
            'isAdmin' => 1,
            'phone' => '07063543872',
            'address' => 'Ikeja, Lagos State',
            'slug' => 'Ibroh24'
        ]);

        $user = App\User::create([
            'name' => 'Demo',
            'email' => 'demo@faajs.com',
            'password' => bcrypt('demo'),
            'avatar'=> 'images/defaultAvatar.png',
            // 'isAdmin' => 1,
            'phone' => '07063543872',
            'address' => 'Ikeja, Lagos State',
            'slug' => 'demo'
        ]);
    }
}
