<?php

declare (strict_types= 1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\RoleNodeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,        RoleNodeSeeder::class, // for node_id transition
            TagSeeder::class,
            ResourceSeeder::class,
            BookmarkSeeder::class,
            LikeSeeder::class
        ]);
    
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}