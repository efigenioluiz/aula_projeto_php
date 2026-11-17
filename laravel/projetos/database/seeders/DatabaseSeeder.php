<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Book::create([
            'title' => 'Noites Brandas',
            'author' => 'Machado de Assis',
            'description' => 'Livro de contos',
            'isbn' => '978-85-359-0277-0',
            'gender' => 'Romance'
        ]);

        Book::create([
            'title' => 'Dom Casmurro',
            'author' => 'Machado de Assis',
            'description' => 'Romance brasileiro',
            'isbn' => '978-85-359-0277-1',
            'gender' => 'Romance'
        ]);

        Book::create([
            'title' => 'Memórias Póstumas de Brás Cubas',
            'author' => 'Machado de Assis',
            'description' => 'Romance brasileiro',
            'isbn' => '978-85-359-0277-2',
            'gender' => 'Romance'
        ]);
    }
}
