<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Customer',
            'email' => 'customer@domain.com',
            'is_admin' => '0',
            'normal_user_type'=>'customer',
            'password' => Hash::make('12345678'),
            'active' => '1',
        ]);
    }
}
