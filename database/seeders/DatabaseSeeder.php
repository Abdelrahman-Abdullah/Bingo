<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Service;
use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         User::factory(10)->create();
         Post::factory(5)->create();
         Service::factory(8)->create();
         Gallery::factory(8)->create();
    }
}
