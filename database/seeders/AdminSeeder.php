<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{

    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [

            [   
                'name' => 'Dalton Phan',
                'email' => 'dphan369@coding.net',
                'role' => 'superadmin',

            ],

            [   
                'name' =>'Noah Phan',
                'email' => 'nphan369@coding.net',
                'role' => 'admin',

            ],

            [   
                'name' => 'Gemma Phan',
                'email' => 'gphan369@coding.net',
                'role' => 'user',

            ],
        ];

        foreach($admins as $admin) {
            User::create([
                'name' => $admin['name'],
                'email' => $admin['email'],
                'role' => $admin['role'],
                'email_verified_at' => now(),
                'password' => static::$password ??= Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);
        }
            

        
    }
}
