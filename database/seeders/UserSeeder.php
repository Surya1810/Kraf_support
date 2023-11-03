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
            'username' => 'Super Admin',
            'email' => 'hi@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Trendy Cayous, S,Kom.',
            'username' => 'Trendy',
            'email' => 'trendy@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Alfazri',
            'username' => 'Fajri',
            'email' => 'alfazri@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Surya Dinarta Halim',
            'username' => 'Surya',
            'email' => 'surya@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Iqbal Yusra Karim',
            'username' => 'Iqbal',
            'email' => 'iqbalyk@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Muhammad Fadjar Maulana',
            'username' => 'Fadjar',
            'email' => 'fadjar@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Muhammad Ilham',
            'username' => 'Ilham',
            'email' => 'ilham@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Agus Setiyanto',
            'username' => 'Thio',
            'email' => 'thio@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Encep Zainul Syah',
            'username' => 'Enza',
            'email' => 'enza@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Irpan Taufik Rusmana',
            'username' => 'Irpan',
            'email' => 'irpan@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
        $admin = User::create([
            'role_id' => '1',
            'position_id' => '1',
            'department_id' => '1',
            'name' => 'Aris Resmono',
            'username' => 'Aris',
            'email' => 'aris@madebykraf.com',
            'password' => bcrypt('password'),
            'level' => '1'
        ]);
    }
}
