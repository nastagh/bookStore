const generateBooks = async () => {
    Promise.all([
        fetch('http://localhost/Certificado/bookStore/REST/public/index.php/books').then(res => res.json()),
        fetch('http://localhost/Certificado/bookStore/REST/public/index.php/categories').then(res => res.json())
    ])
        .then(([books, categories]) => {
            const booksSection = document.querySelector('.books_section');

            categories.forEach(category => {
                const categoryContainer = document.createElement('div');
                categoryContainer.classList.add('category_container');

                const categoryTitle = document.createElement('h2');
                categoryTitle.classList.add('category_title');
                categoryTitle.innerText = category.name;
                categoryContainer.appendChild(categoryTitle);

                const containerViewAll = document.createElement('div');
                containerViewAll.classList.add('container_view_all');

                const viewAll = document.createElement('a');
                viewAll.href = "#";
                viewAll.innerText = "View All";
                containerViewAll.appendChild(viewAll);
                categoryContainer.appendChild(containerViewAll);

                const container = document.createElement('div');
                container.classList.add('books_container');

                const categoryBooks = books.filter(book => book.id_categoria == category.id_categoria);

                categoryBooks.splice(0, 5).forEach(book => {
                    container.appendChild(createBookCard(book));;
                });
                booksSection.appendChild(categoryContainer);
                booksSection.appendChild(container);

                containerViewAll.addEventListener('click', (e) => {
                    e.preventDefault();
                    categoryBooks.forEach(book => {
                        container.appendChild(createBookCard(book));
                    });
                })
            });
        })
        .catch(err => console.error('Error loading books:', err));

}

generateBooks();

const createBookCard = (book) => {
    const card = document.createElement('div');
    card.classList.add('book_card');
    card.innerHTML = `<div class="book_image">
                                    <img src="REST/public/assets/images/books/${book.image}" alt="${book.title}" title="${book.title}">
                                    </div>
                                    <div class="book_info">
                                    <h3>${book.title}</h3>
                                    <p class="author">${book.author}</p>
                                    <p class="price">$${book.price}</p>
                                    <button class="btn_buy" onclick="addToCart(${book.id_book})">
                                    <img src="REST/public/assets/images/cart.svg" alt="Cart">
                                    <a href="?c=OrderItem&a=create&id_book=${book.id_book}&quantity=1&price=${book.price}">Add to cart</a></button>
                                    </div>`;
    return card;
}   
