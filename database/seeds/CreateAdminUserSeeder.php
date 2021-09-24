<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /*** Run the database seeds.** @return void**/
    public function run()
    {
        $user = User::create([
                'name' => 'Ahmed Rabi owner',
                'email' => 'a@a.com',
                'password' => bcrypt('123456'),
            ]
        );
        $role = Role::create(['name' => 'owner']);
        $user->assignRole($role);
    }
}
