<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0)
        {
            DB::table('users')->insert([
                'name' => 'Juvenal Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(60),
                'created_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
