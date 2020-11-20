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
        
        //User permission
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

        //Categories permission
        $permission = Permission::create([
            'name'          =>  'List categoria',
            'slug'          =>  'categoria.index',
            'description'   =>  'A user can list categoria',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Show categoria',
            'slug'          =>  'categoria.show',
            'description'   =>  'A user can show categoria',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Create categoria',
            'slug'          =>  'categoria.create',
            'description'   =>  'A user can create categoria',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Edit categoria',
            'slug'          =>  'categoria.edit',
            'description'   =>  'A user can edit categoria',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Destroy categoria',
            'slug'          =>  'categoria.destroy',
            'description'   =>  'A user can destroy categoria',
        ]);

        $permissionAll[] = $permission->id;
        
        //Habitaciones permission
        $permission = Permission::create([
            'name'          =>  'List habitaciones',
            'slug'          =>  'habitaciones.index',
            'description'   =>  'A user can list habitaciones',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Show habitaciones',
            'slug'          =>  'habitaciones.show',
            'description'   =>  'A user can show habitaciones',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Create habitaciones',
            'slug'          =>  'habitaciones.create',
            'description'   =>  'A user can create habitaciones',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Edit habitaciones',
            'slug'          =>  'habitaciones.edit',
            'description'   =>  'A user can edit habitaciones',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Destroy habitaciones',
            'slug'          =>  'habitaciones.destroy',
            'description'   =>  'A user can destroy habitaciones',
        ]);

        $permissionAll[] = $permission->id;

        //reservas permission
        $permission = Permission::create([
            'name'          =>  'List reservas',
            'slug'          =>  'reservas.index',
            'description'   =>  'A user can list reservas',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Show reservas',
            'slug'          =>  'reservas.show',
            'description'   =>  'A user can show reservas',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Create reservas',
            'slug'          =>  'reservas.create',
            'description'   =>  'A user can create reservas',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Edit reservas',
            'slug'          =>  'reservas.edit',
            'description'   =>  'A user can edit reservas',
        ]);

        $permissionAll[] = $permission->id;

        $permission = Permission::create([
            'name'          =>  'Destroy reservas',
            'slug'          =>  'reservas.destroy',
            'description'   =>  'A user can destroy reservas',
        ]);

        $permissionAll[] = $permission->id;
        
        //Table permission_role
        // $rolAdmin->permissions()->sync( $permissionAll );
    }
}
