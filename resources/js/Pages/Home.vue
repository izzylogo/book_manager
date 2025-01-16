<template>
    <div>
      <!-- Navbar -->
      <nav class="navbar">
        <div class="container">
          <h1 class="logo">Book Manager</h1>
          <a href="/books/create" class="add-button">Add Book</a>
        </div>
      </nav>

      <main>
        <div>
            <h1>Books</h1>
            <a href="/books/create">Add Book</a>
            <table>
            <thead>
                <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="book in books" :key="book.id">
                <td>{{ book.title }}</td>
                <td>{{ book.author }}</td>
                <td>{{ book.published_year }}</td>
                <td>{{ book.genre }}</td>
                <td>
                    <a :href="`/books/${book.id}/edit`">Edit</a>
                    <button @click="deleteBook(book.id)">Delete</button>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
      </main>        
    </div>
  </template>
  
<script>
    import Layout from '../Layouts/Layout.vue';
    import { useForm } from '@inertiajs/vue3';

    export default {
  props: ['books'],
  setup() {
    const form = useForm();
    const deleteBook = (id) => {
      form.delete(`/books/${id}`);
    };
    return { deleteBook };
  },
};
</script>
  
  <style scoped>
  /* Basic Styles */
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }
  
  
  
  /* Content */
  .content {
    padding: 2rem;
    text-align: center;
  }
  
  .title {
    font-size: 2rem;
    margin-bottom: 1rem;
  }
  
  .book-list table {
    width: 100%;
    border-collapse: collapse;
    margin: 1rem auto;
  }
  
  .book-list th,
  .book-list td {
    border: 1px solid #ddd;
    padding: 0.5rem;
    text-align: left;
  }
  
  .book-list th {
    background-color: #f4f4f4;
  }
  
  .no-books {
    font-size: 1.2rem;
    color: #777;
    margin-top: 2rem;
  }
  </style>
  