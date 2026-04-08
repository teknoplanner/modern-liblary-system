<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Member;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User for Login
        \App\Models\User::create([
            'name' => 'Admin Library',
            'email' => 'admin@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);

        // Sample Books
        Book::create(['title' => 'The Great Gatsby', 'isbn' => '978-0743273565', 'stock' => 10]);
        Book::create(['title' => 'To Kill a Mockingbird', 'isbn' => '978-0061120084', 'stock' => 5]);
        Book::create(['title' => '1984', 'isbn' => '978-0451524935', 'stock' => 8]);
        Book::create(['title' => 'The Catcher in the Rye', 'isbn' => '978-0316769488', 'stock' => 12]);

        // Sample Members
        Member::create(['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'phone' => '08123456789', 'address' => '123 Maple St']);
        Member::create(['name' => 'Bob Smith', 'email' => 'bob@example.com', 'phone' => '08987654321', 'address' => '456 Oak Ave']);
        Member::create(['name' => 'Charlie Brown', 'email' => 'charlie@example.com', 'phone' => '0877555333', 'address' => '789 Pine Rd']);
    }
}
