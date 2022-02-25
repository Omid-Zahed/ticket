<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $permission= array_keys(config("permissions.list"));
        /**
         * @var $role Role
         */
        $role=  Role::create(['name' => 'super-admin']);
       foreach ($permission as $name) {
           $per=Permission::findOrCreate($name);
           $role->permissions()->attach($per);
       }


       $user=new User();
       $user->email="omid98.ir@gmail.com";
       $user->name="omid98";
       $user->password=Hash::make("123456");
       $user->save();
       $user->roles()->attach($role);
    }
}
