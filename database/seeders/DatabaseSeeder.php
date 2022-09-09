<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\PhotoController;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'yym',
             'email' => 'yym@gmail.com',
             'role'=> 'admin',
             'password'=>Hash::make('asdffdsa')

         ]);

         $this->call([
             UserSeeder::class,
             CategorySeeder::class,
            PostSeeder::class,
             PhotoSeeder::class
         ]);
    }
}
