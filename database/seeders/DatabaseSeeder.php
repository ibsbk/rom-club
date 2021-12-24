<?php

namespace Database\Seeders;

use App\Models\History;
use App\Models\User;
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
        User::insert([
            'login'=>'admin',
            'password'=>Hash::make('admin'),
        ]);

        for ($i = 1; $i<=10; $i++){
            History::insert([
                'name'=>'name'.$i,
                'description'=>'description'.$i,
            ]);
        }
    }
}
