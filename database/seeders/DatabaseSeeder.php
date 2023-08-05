<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\Comment::factory(10)->create();
//         SocialLink::factory(10)->create();
//        Gallery::factory(5)->create();

//        Service::factory(8)->create();

         \App\Models\User::factory(1)->create();
    }
}
