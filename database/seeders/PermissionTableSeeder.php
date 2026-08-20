<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'highlight-list',
           'highlight-create',
           'highlight-edit',
           'highlight-delete',
           'channel-list',
           'channel-create',
           'channel-edit',
           'channel-delete',
           'new-list',
           'new-create',
           'new-edit',
           'new-delete',
           'bot-list',
           'bot-create',
           'bot-edit',
           'bot-delete',
           'category-list',
           'category-create',
           'category-edit',
           'category-delete',
           'banner-list',
           'banner-create',
           'banner-edit',
           'banner-delete',
           'logo-list',
           'logo-create',
           'logo-edit',
           'logo-delete',
           'social-list',
           'social-create',
           'social-edit',
           'social-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'client-list',
           'client-create',
           'client-edit',
           'client-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}