<template>
    <div>
         <!-- Navbar -->
        <nav class="navbar">
            <div class="container">
                <a href="/books">
                    <h1 class="logo">Book Manager</h1>
                </a>
                <a href="/books/create" class="add-button">Add Book</a>
            </div>
        </nav>
    </div>

    <div>
        <div class="table-top">
            <h1>Lists Of Books</h1>
            <a href="/books/create" class="add-button">Add Book</a>
        </div>
      <table class="styled-table">
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
            <template v-if="books.length">
                <tr v-for="book in books" :key="book.id">
                  <td>{{ book.title }}</td>
                  <td>{{ book.author }}</td>
                  <td>{{ book.published_year }}</td>
                  <td>{{ book.genre }}</td>
                  <td>
                    <a :href="`/books/${book.id}/edit`" class="action-link edit-link">Edit</a>
                    <!-- <button @click="deleteBook(book.id)" class="action-button delete-button">Delete</button> -->
                    <button @click="showDeleteModal(book)" class="action-button delete-button">
                        Delete
                    </button>
                  </td>
                </tr>
            </template>
            <template v-else>
                <tr>
                    <td colspan="5" class="no-books-message">No books available. 😢 <br> click <a href="/books/create" class="inline-link">Add book</a> to start</td>
                </tr>
            </template>
        </tbody>
      </table>

       <!-- Delete Confirmation Modal -->
        <div v-if="isModalVisible" class="modal-overlay">
        <div class="modal">
            <p>Are you sure you want to delete <strong>{{ bookToDelete.title }}</strong>?</p>
            <div class="modal-actions">
            <button @click="confirmDelete" class="confirm-button">Yes</button>
            <button @click="closeModal" class="cancel-button">No</button>
            </div>
        </div>
        </div>
    </div>
  </template>
  
  <script>
  import { useForm } from '@inertiajs/vue3';
  import { ref } from 'vue';

  
  export default {
    props: ['books'],
    setup() {
        const isModalVisible = ref(false);
        const bookToDelete = ref(null);
        const form = useForm();

        const showDeleteModal = (book) => {
        bookToDelete.value = book;
        isModalVisible.value = true;
        };

        const closeModal = () => {
        isModalVisible.value = false;
        bookToDelete.value = null;
        };

        const confirmDelete = async () => {
            if (bookToDelete.value) {
            await form.delete(`/books/${bookToDelete.value.id}`, {
                onFinish: () => {
                closeModal(); // Close the modal after successful deletion
                },
                onError: (errors) => {
                console.error('Delete failed:', errors);
                // Optionally, display an error message to the user
                },
            });
            }
        };

        return {
        isModalVisible,
        bookToDelete,
        showDeleteModal,
        closeModal,
        confirmDelete,
        };
    },
  };
  </script>
  
  <style scoped>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');


/* Basic Styles */
body {
  font-family: 'Roboto', sans-serif;
  margin: 0;
  padding: 0;
}

/* Navbar */
.navbar {
  background-color: #4a90e2;
  color: #fff;
  padding: 1rem 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.logo {
  font-size: 1.5rem;
  font-weight: bold;
  margin: 0;
}

a{
  color: white;
  text-decoration: none;
}

.add-button {
  background-color: #fff;
  color: #4a90e2;
  padding: 0.5rem 1rem;
  text-decoration: none;
  border-radius: 4px;
  font-weight: bold;
}

.add-button:hover {
  background-color: #e6f0ff;
}

.inline-link{
    color: green;
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

.table-top{
    text-align: center;
    width: 100%;
}

.styled-table {
  width: 80%;
  border-collapse: collapse;
  margin: 20px auto;
  font-size: 16px;
  text-align: left;
  border: 1px solid #ddd;
}

.no-books-message{
    text-align: center;
}

/* Header styling */
.styled-table thead tr {
  background-color: #4a90e2;
  color: #fff;
}

.styled-table th,
.styled-table td {
  padding: 12px 15px;
  border: 1px solid #ddd;
}

/* Alternating row colors */
.styled-table tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

/* Hover effect on rows */
.styled-table tbody tr:hover {
  background-color: #f1f1f1;
}

/* Action links and buttons */
.action-link {
  text-decoration: none;
  color: #007bff;
  margin-right: 10px;
}

.action-link:hover {
  text-decoration: underline;
}

.action-button {
  padding: 5px 10px;
  font-size: 14px;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.edit-link {
  color: #28a745;
}

.delete-button {
  background-color: #dc3545;
}

.delete-button:hover {
  background-color: #c82333;
}

.no-books {
  font-size: 1.2rem;
  color: #777;
  margin-top: 2rem;
}

.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}
.modal {
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  width: 300px;
  text-align: center;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
.modal-actions {
  display: flex;
  justify-content: space-between;
  margin-top: 20px;
}
.confirm-button {
  background-color: #dc3545;
  color: #fff;
  border: none;
  padding: 8px 16px;
  border-radius: 4px;
  cursor: pointer;
}
.confirm-button:hover {
  background-color: #bd2130;
}
.cancel-button {
  background-color: #6c757d;
  color: #fff;
  border: none;
  padding: 8px 16px;
  border-radius: 4px;
  cursor: pointer;
}
.cancel-button:hover {
  background-color: #5a6268;
}
  </style>