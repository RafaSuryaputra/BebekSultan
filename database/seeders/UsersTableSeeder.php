<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        Role::firstOrCreate(['name' => 'user']);
        Role::firstOrCreate(['name' => 'admin']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $admin->assignRole('admin');

        $user1 = User::create([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('user'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $user1->assignRole('user');

        $user2 = User::create([
            'name' => 'User 2',
            'email' => 'user2@example.com',
            'password' => Hash::make('user'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        $user2->assignRole('user');

        // Add more users as needed and assign roles accordingly
    }
}
