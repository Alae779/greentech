<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exclude = ['login', 'register', 'login_form', 'register_form', 'logout', 'home'];

        $routes = Route::getRoutes();

        foreach ($routes as $route) {
            $routeName = $route->getName();

            if (!$routeName || in_array($routeName, $exclude)) {
                continue;
            }

                Permission::firstOrCreate([
                    'name' => $routeName,
                    'guard_name' => 'web'
                ]);
            }
    }
}
