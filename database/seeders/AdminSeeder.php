<?php

namespace Database\Seeders;

use App\Models\Admin;
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
                'email' => 'dphan369@lonecoding.com',
                

            ],

            [   
                'name' =>'Noah Phan',
                'email' => 'nphan369@lonecoding.com',
               

            ],

            [   
                'name' => 'Gemma Phan',
                'email' => 'gphan369@lonecoding.com',
                

            ],
        ];

        foreach($admins as $admin) {
            Admin::create([
                'name' => $admin['name'],
                'email' => $admin['email'],
                'email_verified_at' => now(),
                'password' => static::$password ??= Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);
        }
            

        
    }
}
