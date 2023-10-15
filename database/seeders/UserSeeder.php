<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = new User();
        $users->name = 'admin';
        $users->email = 'admin@gmail.com';
        $users->password = bcrypt('admin');
        $users->role = 'admin';
        $users->save();
    }
}