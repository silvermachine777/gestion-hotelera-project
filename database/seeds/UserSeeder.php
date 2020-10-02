<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate
        DB::statement('SET foreign_key_checks=0');
            DB::table('role_user')->truncate();
            DB::table('permission_role')->truncate();
            Role::truncate();
            Permission::truncate();
        DB::statement('SET foreign_key_checks=1');    

        //User admin
        $userAdmin = User::where('cedula', '1053826427')->first();
        if($userAdmin){
            $userAdmin->delete();
        }
        $userAdmin = User::create([
            'name'              => 'Sebastian Giraldo Galvis',
            'email'             => 'admin@admin.com',
            'cedula'            => '1053826427',
            'estado_usuario'    => 1,
            'password'          => Hash::make('12345678'),
        ]);

        //Rol admin
        $rolAdmin = Role::create([
            'name'          =>  'Admin',
            'slug'          =>  'admin',
            'description'   =>  'Administrador',
            'full_acces'    =>  'yes',
        ]);
        
        //Table role_user
        $userAdmin->roles()->sync([ $rolAdmin->id]);

        //Permission
        $permissionAll = [];
        
        $permission = Permission::create([
            'name'          =>  'List role',
            'slug'          =>  'role.index',
            'description'   =>  'A user can list role',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Show role',
            'slug'          =>  'role.show',
            'description'   =>  'A user can show role',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Create role',
            'slug'          =>  'role.create',
            'description'   =>  'A user can create role',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Edit role',
            'slug'          =>  'role.edit',
            'description'   =>  'A user can edit role',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Destroy role',
            'slug'          =>  'role.destroy',
            'description'   =>  'A user can destroy role',
        ]);

        $permissionAll[] = $permission->id;
        
        $permission = Permission::create([
            'name'          =>  'List user',
            'slug'          =>  'user.index',
            'description'   =>  'A user can list user',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Show user',
            'slug'          =>  'user.show',
            'description'   =>  'A user can show user',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Create user',
            'slug'          =>  'user.create',
            'description'   =>  'A user can create user',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Edit user',
            'slug'          =>  'user.edit',
            'description'   =>  'A user can edit user',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Destroy user',
            'slug'          =>  'user.destroy',
            'description'   =>  'A user can destroy user',
        ]);

        $permissionAll[] = $permission->id;
        
        //Table permission_role
        // $rolAdmin->permissions()->sync( $permissionAll );
    }
}
