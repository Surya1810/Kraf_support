<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Super Admin',
            'email' => 'hi@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Trendy Cayous',
            'email' => 'trendy@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Alfazri',
            'email' => 'alfazri@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Surya Dinarta Halim',
            'email' => 'surya@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Iqbal Yusra Karim',
            'email' => 'iqbalyk@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Fadjar',
            'email' => 'fadjar@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Muhammad Ilham',
            'email' => 'ilham@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Agus Setianto',
            'email' => 'thio@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Enza',
            'email' => 'enza@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Irpan',
            'email' => 'irpan@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Aris Resmono',
            'email' => 'aris@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
    }
}
