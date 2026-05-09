<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'name' => 'tag-1'
        ]);
        Tag::create([
            'name' => 'tag-2'
        ]);
        Tag::create([
            'name' => 'tag-3'
        ]);
        
    }
}
