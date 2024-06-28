<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{

    public function run(): void
    { {
            $users = array(
                array(
                    'id' => '1',
                    'name' => 'moin',
                    'email' => 'moinpuccse@gmail.com',
                    'password' => Hash::make('password'),
                    'role' => 'admin',
                ),

            );

            foreach ($users as $user) {
                $r = $user['role'];
                unset($user['role']);

                $u = User::create($user);

                $role = Role::where('name', $r)->first();

                if ($role) {
                    $u->assignRole($role);
                }
            }
        }
    }
}
