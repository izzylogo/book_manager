<template>
      <!-- Navbar -->
      <nav class="navbar">
            <div class="container">
              <a href="/books">
                <h1 class="logo">Book Manager</h1>
              </a>
              <a href="/books/create" class="add-button">Add Book</a>
            </div>
        </nav>
        <div class="form-container">
          <h1 class="form-header">
            {{ book ? 'Edit' : 'Add' }} Book
          </h1>
          <form @submit.prevent="submitForm" class="form">
            <div class="form-group">
              <label for="title">Title</label>
              <input id="title" v-model="form.title" placeholder="Enter book title" />
            </div>
            <div class="form-group">
              <label for="author">Author</label>
              <input id="author" v-model="form.author" placeholder="Enter author's name" />
            </div>
            <div class="form-group">
              <label for="year">Published Year</label>
              <input id="year" v-model="form.published_year" type="number" placeholder="Enter published year" />
            </div>
            <div class="form-group">
              <label for="genre">Genre</label>
              <input id="genre" v-model="form.genre" placeholder="Enter book genre" />
            </div>
            <button type="submit" class="form-button">
              {{ book ? 'Update' : 'Create' }}
            </button>
          </form>
        </div>
  </template>
  
  <script>
  import { useForm } from '@inertiajs/vue3';
  
  export default {
    props: ['book'],
    setup(props) {
      const form = useForm(props.book || { title: '', author: '', published_year: '', genre: '' });
  
      const submitForm = () => {
        if (props.book) {
          form.put(`/books/${props.book.id}`);
        } else {
          form.post('/books');
        }
      };
  
      return { form, submitForm };
    },
  };
  </script>
  
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');


  .form-container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  font-family: "Roboto", sans-serif;
  
}

.form-header {
  text-align: center;
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
  color: #333;
}

.form-group {
  margin-bottom: 15px;
}

.form-group label {
  display: block;
  font-size: 14px;
  font-weight: bold;
  color: #555;
  margin-bottom: 5px;
}

a{
  color: white;
  text-decoration: none;
}

.form-group input {
  width: 100%;
  padding: 10px;
  font-size: 14px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  transition: border-color 0.3s ease;
}

.form-group input:focus {
  border-color: #007bff;
  outline: none;
}

.form-button {
  display: block;
  width: 100%;
  padding: 10px;
  font-size: 16px;
  font-weight: bold;
  color: #fff;
  background-color: #007bff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.form-button:hover {
  background-color: #0056b3;
}
</style>