<?php
require_once __DIR__ . '/../app/core/Config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog Managment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+NZ+Basic:wght@100..400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>REST/public/assets/css/catalog.scss">
</head>

<body class="catalog_body">
    <?php include __DIR__ . '/../app/views/layout/header.php'; ?>
    <main class="main_container">
        <section class="categories_section">
            <h2 class="categories_title">Categories</h2>
            <form id="add_new_category">
                <input id="name_category" type="text" name="name" placeholder="Category Name" required>
                <button type="submit">Add Category</button>
            </form>
            <table class="categories_table">
            </table>
            <form id="edit_category_form">
                <input id="name_category_edit" type="text" name="name" placeholder="Category Name" required>
                <button type="submit">Edit Category</button>
            </form>
        </section>
        <section class="books_section">
            <h2 class="books_title">Books</h2>

            <form id="add_new_book_form">
                <input id="image_book" type="file" name="image" placeholder="Book image" required>
                <input id="title_book" type="text" name="title" placeholder="Book title" required>
                <input id="author_book" type="text" name="author" placeholder="Book author" required>
                <input id="price_book" type="number" name="price" placeholder="Book price" required>
                <input id="stock_book" type="number" name="stock" placeholder="Book stock" required>
                <select id="category_books" name="category">
                </select>
                <!-- <input id="category_book" type="number" name="category" placeholder="Book category" required> -->
                <button type="submit">Add Book</button>
            </form>

            <table class="books_table_wrapper">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="books_table">
                </tbody>
            </table>
        </section>
    </main>
    <?php include __DIR__ . '/../app/views/layout/footer.php'; ?>
    <script src="<?= BASE_URL ?>REST/public/assets/js/catalog.js"></script>
</body>

</html>