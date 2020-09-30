<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->delete();

        $roles = [
            ['name' => 'author', 'label' => 'Yazar'],
            ['name' => 'admin', 'label' => 'Editör'],
            ['name' => 'superAdmin', 'label' => 'Site Sahibi']
        ];
    
        DB::table('roles')->insert($roles);
    }
}
