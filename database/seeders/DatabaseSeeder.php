<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        \App\Models\Editor::factory(3)->create();
        \App\Models\Book::factory(10)->create();
        \App\Models\Author::factory(5)->create();
        
       
        foreach (\App\Models\Book::all() as $book) {
            $authors = \App\Models\Author::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $book->authors()->attach($authors);
        }
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
