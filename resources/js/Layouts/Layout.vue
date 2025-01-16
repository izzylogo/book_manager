<template>
    <div>
        <!-- Navbar -->
        <nav class="navbar">
            <div class="container">
            <h1 class="logo">Book Manager</h1>
            <a href="/books/create" class="add-button">Add Book</a>
            </div>
        </nav>

       hello
    </div>
</template>

<style>
/* Navbar */
.navbar {
    background-color: #4a90e2;
    color: #fff;
    padding: 1rem 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .container{
    width: 100%;
    display: flex;
    justify-content: space-between;
  }
  
  .logo {
    font-size: 1.5rem;
    font-weight: bold;
    margin: 0;
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
</style>