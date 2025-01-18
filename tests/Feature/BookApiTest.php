<?php

// tests/Feature/BookApiTest.php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;


class BookApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_fetch_books_via_api()
    {
        // Create some books in the database
        $books = Book::factory()->count(3)->create();

        $response = $this->getJson('/api/books');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

   
}

