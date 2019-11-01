<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name' => 'Super-Administrator'
            ],
            [
                'name' => 'administrator'
            ],
            [
                'name' => 'voyager'
            ]
        ]);
    }
}
