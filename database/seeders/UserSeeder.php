<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role'=> 'admin',
            'password'=>Hash::make('asdffdsa')
        ]);

        User::factory()->create([
            'name' => 'author',
            'email' => 'author@gmail.com',
            'role'=> 'author',
            'password'=>Hash::make('asdffdsa')
        ]);

        User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@gmail.com',
            'role'=> 'editor',
            'password'=>Hash::make('asdffdsa')
        ]);
    }
}
