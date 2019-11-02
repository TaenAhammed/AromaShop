<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_customer = Role::where('name', 'customer')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $customer = new User();
        $customer->name = 'customer';
        $customer->email = 'taenahammed7@gmail.com';
        $customer->password = bcrypt('customer secret');
        $customer->save();
        $customer->roles()->attach($role_customer);

        $admin = new user();
        $admin->name = 'admin';
        $admin->email = 'taenahammed@gmail.com';
        $admin->password = bcrypt('admin secret');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
