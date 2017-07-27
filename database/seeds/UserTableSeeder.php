<?php

use CodeDelivery\Models\Client;
use CodeDelivery\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'name'  => 'Rogerio Munhoz',
            'email' => 'rogerio@email.com',
            'role'  => 'admin'
        ]);

        factory(User::class, 1)->create([
            'name'  => 'User Client',
            'email' => 'user@user.com',
        ]);


        factory(User::class, 8)->create()->each(function ($u){
            $u->client()->save(factory(Client::class)->make());
        });
    }
}
