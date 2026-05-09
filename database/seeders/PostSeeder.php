<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Post 1',
            'slug' => 'slug test',
            'content' => 'Post 1 content',
            'cover' => 'https://discord.com/channels/@me/1500581102400831549/1502720199328272504',
            'status' => 'PUBLISHED',
            'authorId' => '1'
        ]);
    }
}
