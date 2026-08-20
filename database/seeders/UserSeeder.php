<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $role1 = Role::create(['name' => 'owner']);
        $role2 = Role::create(['name' => 'admin']);
        $role3 = Role::create(['name' => 'client']);
        $role3 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('role-list');
        $role1->givePermissionTo('role-create');
        $role1->givePermissionTo('role-edit');
        $role1->givePermissionTo('role-delete');
        $role1->givePermissionTo('highlight-list');
        $role1->givePermissionTo('highlight-create');
        $role1->givePermissionTo('highlight-edit');
        $role1->givePermissionTo('highlight-delete');
        $role1->givePermissionTo('channel-list');
        $role1->givePermissionTo('channel-create');
        $role1->givePermissionTo('channel-edit');
        $role1->givePermissionTo('channel-delete');
        $role1->givePermissionTo('new-list');
        $role1->givePermissionTo('new-create');
        $role1->givePermissionTo('new-edit');
        $role1->givePermissionTo('new-delete');
        $role1->givePermissionTo('bot-list');
        $role1->givePermissionTo('bot-create');
        $role1->givePermissionTo('bot-edit');
        $role1->givePermissionTo('bot-delete');
        $role1->givePermissionTo('category-list');
        $role1->givePermissionTo('category-create');
        $role1->givePermissionTo('category-edit');
        $role1->givePermissionTo('category-delete');
        $role1->givePermissionTo('banner-list');
        $role1->givePermissionTo('banner-create');
        $role1->givePermissionTo('banner-edit');
        $role1->givePermissionTo('banner-delete');
        $role1->givePermissionTo('logo-list');
        $role1->givePermissionTo('logo-create');
        $role1->givePermissionTo('logo-edit');
        $role1->givePermissionTo('logo-delete');
        $role1->givePermissionTo('social-list');
        $role1->givePermissionTo('social-create');
        $role1->givePermissionTo('social-edit');
        $role1->givePermissionTo('social-delete');
        $role1->givePermissionTo('user-list');
        $role1->givePermissionTo('user-create');
        $role1->givePermissionTo('user-edit');
        $role1->givePermissionTo('user-delete');
        $role1->givePermissionTo('client-list');
        $role1->givePermissionTo('client-create');
        $role1->givePermissionTo('client-edit');
        $role1->givePermissionTo('client-delete');
        User::create([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'phone' => '0000000000',
            'photo' =>'/icon/null.png',
            'email_verified_at' => now(),
            'password' => bcrypt('123456')
        ])->assignRole('owner');
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0000000000',
            'photo' =>'/icon/null.png',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ])->assignRole('admin');
        User::create([
            'name' => 'client',
            'email' => 'client@gmail.com',
            'phone' => '0000000000',
            'photo' =>'/icon/null.png',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ])->assignRole('client');
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'phone' => '0000000000',
            'photo' =>'/icon/null.png',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ])->assignRole('user');
    }
}
