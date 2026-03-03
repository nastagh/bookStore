const categoriesTable = document.querySelector(".categories_table");
const categoryBooksSelect = document.getElementById("category_books");

const CATEGORIES_URL = 'http://localhost/Certificado/bookStore/REST/public/index.php/categories';

const fetchCategories = () =>
    fetch(CATEGORIES_URL).then(res => res.json());

const generateCategories = async () => {
    const categories = await fetchCategories();
    categoriesTable.innerHTML = '';
    categories.forEach(category => {
        const row = document.createElement('tr');
        row.innerHTML = `<td>${category.name}</td>
                       <td class="actions"><button class="edit_category" data-id="${category.id_categoria}" data-name="${category.name}">Edit</button>
                       <button class="delete_category" data-id="${category.id_categoria}">Delete</button></td>`;
        categoriesTable.appendChild(row);
    });
};

const populateCategoryBooksSelect = async () => {
    const categories = await fetchCategories();
    categoryBooksSelect.innerHTML = '';
    const placeholder = document.createElement('option');
    placeholder.value = '';
    placeholder.textContent = 'Select category...';
    placeholder.disabled = true;
    placeholder.selected = true;
    categoryBooksSelect.appendChild(placeholder);
    categories.forEach(category => {
        const option = document.createElement('option');
        option.value = category.id_categoria;
        option.setAttribute('data-id', category.id_categoria);
        option.textContent = category.name;
        categoryBooksSelect.appendChild(option);
    });
};

const initCatalog = async () => {
    await generateCategories();
    await populateCategoryBooksSelect();
};
initCatalog();

const editCategoryForm = document.getElementById('edit_category_form');
const booksTable = document.querySelector(".books_table");
const editBookForm = document.getElementById('edit_book_form');
const bookTitle = document.getElementById('book_title');

const generateBooks = async () => {
    const [books, categories] = await Promise.all([
        fetch('http://localhost/Certificado/bookStore/REST/public/index.php/books').then(res => res.json()),
        fetch('http://localhost/Certificado/bookStore/REST/public/index.php/categories').then(res => res.json())
    ]);
    const categoryById = {};
    categories.forEach(cat => { categoryById[cat.id_categoria] = cat.name; });

    books.forEach(book => {
        const row = document.createElement('tr');
        const categoryName = categoryById[book.id_categoria];
        const hasValidImage = typeof book.image === 'string' && book.image && book.image !== 'Array';
        const imageSrc = hasValidImage
            ? `http://localhost/Certificado/bookStore/REST/public/assets/images/books/${book.image}`
            : 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="60" height="90" viewBox="0 0 60 90"%3E%3Crect fill="%23e0dcf0" width="60" height="90"/%3E%3Ctext x="50%25" y="50%25" fill="%238a7fb8" font-size="10" text-anchor="middle" dy=".3em"%3ENo image%3C/text%3E%3C/svg%3E';
        row.innerHTML = `<td class="image_column"><img src="${imageSrc}" alt="${book.title}" title="${book.title}"></td>
                               <td>${book.title}</td>
                               <td class="author_column">${book.author}</td>
                               <td class="price_column">$${book.price}</td>
                               <td>${book.stock}</td>
                               <td>${categoryName}</td>
                               <td class="actions"><button class="edit_book" data-id="${book.id_book}" data-title="${book.title}" data-author="${book.author}" data-price="${book.price}" data-stock="${book.stock}" data-category="${book.id_categoria}">Edit</button>
                               <button class="delete_book" data-id="${book.id_book}">Delete</button></td>`;
        booksTable.appendChild(row);
    });
};
generateBooks();

document.addEventListener('click', (e) => {
    if(e.target.classList.contains('edit_category')) {
        editCategoryForm.style.display = 'block';
        const nameCategoryEdit = document.getElementById('name_category_edit');
        nameCategoryEdit.value = e.target.dataset.name; 
        nameCategoryEdit.setAttribute('data-id', e.target.dataset.id);
    }

    if(e.target.classList.contains('delete_category')) {
        const categoryId = e.target.dataset.id;
        fetch(`http://localhost/Certificado/bookStore/REST/public/index.php/categories/${categoryId}`, {
            method: 'DELETE',
        })
        .then(() => {
            generateCategories();
            populateCategoryBooksSelect();
        })
        .catch(err => console.error('Error deleting category:', err));
    }

    if(e.target.classList.contains('delete_book')) {
        const bookId = e.target.dataset.id;
        fetch(`http://localhost/Certificado/bookStore/REST/public/index.php/books/${bookId}`, {
            method: 'DELETE',
        })
        .then(() => {
            booksTable.innerHTML = '';
            generateBooks();
        })
        .catch(err => console.error('Error deleting book:', err));
    }

    if(e.target.classList.contains('edit_book')) {
        editBookForm.style.display = 'block';
        bookTitle.textContent = e.target.dataset.title;
        const stockId = e.target.dataset.id;
        const stockInput = document.getElementById('stock_edit');
        stockInput.value = e.target.dataset.stock;
        stockInput.setAttribute('data-id', stockId);
    }
})

document.addEventListener('submit', (e) => {
    if (e.target.id === 'add_new_category') {
        e.preventDefault();
        const nameInput = e.target.elements.name;
        const nameCategory = nameInput ? nameInput.value.trim() : '';

        fetch('http://localhost/Certificado/bookStore/REST/public/index.php/categories', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name: nameCategory })
        })
            .then(() => {
                e.target.reset();
                generateCategories();
                populateCategoryBooksSelect();
            })
            .catch(err => console.error('Error adding category:', err));
    }
    if (e.target.id === 'edit_category_form') {
        e.preventDefault();

        const categoryName = document.getElementById('name_category_edit').value;
        const categoryId = document.getElementById('name_category_edit').dataset.id;

        fetch(`http://localhost/Certificado/bookStore/REST/public/index.php/categories/${categoryId}`, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name: categoryName })
        })
        .then(() => {
            e.target.reset();
            editCategoryForm.style.display = 'none';
            generateCategories();
            populateCategoryBooksSelect();
        })
        .catch(err => console.error('Error editing category:', err));
    }

    if (e.target.id === 'add_new_book_form') {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);
        const fileInput = form.querySelector('input[name="image"]');
        data.image = fileInput.files.length ? fileInput.files[0].name : '';
        fetch('http://localhost/Certificado/bookStore/REST/public/index.php/books', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(() => {
            e.target.reset();
            generateBooks();
        })
        .catch(err => console.error('Error adding book:', err));
    }

    if (e.target.id === 'edit_book_form') {
        const stockCount = document.getElementById('stock_edit').value;
        const stockId = document.getElementById('stock_edit').dataset.id;
        fetch(`http://localhost/Certificado/bookStore/REST/public/index.php/books/${stockId}`, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ stock: stockCount })
        })
        .then(() => {
            e.target.reset();
            editBookForm.style.display = 'none';
            bookTitle.textContent = '';
            booksTable.innerHTML = '';
            generateBooks();
        })
        .catch(err => console.error('Error editing book:', err));
    }
});
