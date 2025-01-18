<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_store_a_book()
    {
        $data = [
            'title' => 'New Book',
            'author' => 'Jane Doe',
            'published_year' => 2023,
            'genre' => 'Non-fiction',
        ];

        $response = $this->post('/books', $data);

        $response->assertStatus(302); // Expecting redirect (after storing)
        $this->assertDatabaseHas('books', ['title' => 'New Book']);
    }

    /** @test */
    public function it_can_fetch_all_books()
    {
        $books = Book::factory()->count(3)->create();

        $response = $this->get('/books');

        $response->assertStatus(200);
        $response->assertSee($books->first()->title); // Check if the book title appears
    }

    /** @test */
    public function it_can_update_a_book()
    {
        $book = Book::factory()->create();
        $data = [
            'title' => 'Updated Book',
            'author' => 'Updated Author',
            'published_year' => 2025,
            'genre' => 'Updated Genre',
        ];

        $response = $this->put('/books/' . $book->id, $data);

        $response->assertStatus(302); // Expecting redirect (after update)
        $this->assertDatabaseHas('books', ['title' => 'Updated Book']);
    }

    /** @test */
    public function it_can_delete_a_book()
    {
        $book = Book::factory()->create();

        $response = $this->delete('/books/' . $book->id);

        $response->assertStatus(302); // Expecting redirect (after delete)
        $this->assertDatabaseMissing('books', ['id' => $book->id]); // Ensure the book was deleted
    }
}
