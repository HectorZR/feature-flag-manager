<?php

namespace Database\Seeders;

use App\Models\Environment;
use App\Models\FeatureFlag;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->has(
            Project::factory()->count(3)->has(
                Environment::factory()->count(3)->has(
                    FeatureFlag::factory()->count(3)
                ),
                'environments'
            ),
            'projects'
        )->state([
            'email' => 'admin@admin.com',
            'password' => 'admin'
        ])->create();
    }
}
