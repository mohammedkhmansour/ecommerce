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
        User::create([
            'name'          => 'mohammed',
            'email'         => 'm@mansour.ps',
            'password'      => Hash::make(123456),
            'phone'  => '0597823611',
            'statuse'   => 'active',
            'type'      => 'super-admin'
        ]);

        User::create([
            'name'          => 'osama',
            'email'         => 'osama@gmail.com',
            'password'      => Hash::make(123456789),
            'phone'  => '0597823211',
            'statuse'   => 'active'

        ]);

        User::create([
            'name'          => 'baraa',
            'email'         => 'baraa@gmail.com',
            'password'      => Hash::make(123456789),
            'phone'  => '0597888611',
            'statuse'   => 'active'

        ]);
    }
}
