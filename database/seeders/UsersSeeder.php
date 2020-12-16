<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::Create([
            'name_user' =>'Gustavo Pontes',
            'email_user'=> 'gustavooliveirapontes@gmail.com',
            'password_user' => bcrypt('1234'),
            'admin_user' => 1,
            ]
        );
        
    }
}
