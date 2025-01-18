<?php

use Tests\TestCase;
use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // public function it_can_create_a_book()
    // {
    //     $book = Book::factory()->create([
    //         'title' => 'Begginer Book',
    //         'author' => 'izzy',
    //         'published_year' => 2022,
    //         'genre' => 'Fiction',
    //     ]);

    //     $this->assertDatabaseHas('books', [
    //         'title' => 'Begginer Book',
    //     ]);
    // }
    public function it_can_create_a_book()
    {
        $book = Book::factory()->create();
        $this->assertDatabaseHas('books', ['title' => $book->title]);
    }

    /** @test */
    // public function it_has_a_title()
    // {
    //     $book = Book::factory()->create([
    //         'title' => 'Begginer Book',
    //     ]);

    //     $this->assertEquals('Begginer Book', $book->title);
    // }
    public function it_has_a_title()
    {
        $book = Book::factory()->create(['title' => 'Sample Title']);
        $this->assertEquals('Sample Title', $book->title);
    }
}