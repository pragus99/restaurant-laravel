<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name="admin";
        $admin->email="admin123@gmail.com";
        $admin->password=bcrypt('password');
        $admin->email_verified_at= NOW();
        $admin->save();
        // \App\Models\User::factory(10)->create();
    }
}
