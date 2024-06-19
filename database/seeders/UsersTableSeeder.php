<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds for admin.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@ideas.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => '-',
            'created_at' => now(),
            'updated_at' => now(),
            'bio' => 'Admin',
            'image' => 'https://i.pravatar.cc/100',
            'is_admin' => true,
        ]);

        DB::table('users')->insert([
            'name' => 'Jack',
            'email' => 'jack@ideas.com',
            'email_verified_at' => now(),
            'password' => Hash::make('jack'),
            'remember_token' => '-',
            'created_at' => now(),
            'updated_at' => now(),
            'bio' => 'Jack',
            'image' => 'https://i.pravatar.cc/150',
            'is_admin' => false,
        ]);
    }
}
