<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@raovat.vn',
            'role_id' => 1,
            'password' => Hash::make('phamminh0210'),
        ]);
        User::create([
            'name' => 'pham duc minh',
            'username' => 'phamminh',
            'email' => 'phamminhptit@gmail.com',
            'role_id' => 2,
            'password' => Hash::make('phamminh0210'),
        ]);
    }
}
