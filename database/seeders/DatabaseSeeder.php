<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $u= User::create([
            'name' => "Admin",
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
//            CategoriesSeeder::class,
//            RoleSeeder::class,
        ]);
        $u->roles()->sync([1]);
        Role::find(1)->permissions()->sync([1,2,3,4,5,6,7,8.9,10,11,12,13,14,15]);
    }
}
