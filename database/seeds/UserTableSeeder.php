<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => bcrypt('query')
        ]);
        $role = Role::where('name', 'Super-Administrator')->first();
        $user->roles()->attach($role);
    }
}
