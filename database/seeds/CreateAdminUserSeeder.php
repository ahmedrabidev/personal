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
                'email' => 'admin@admin.com',
                'password' => bcrypt('11111111'),
            ]
        );
        $role = Role::create(['name' => 'owner']);
        $user->assignRole($role);
    }
}
