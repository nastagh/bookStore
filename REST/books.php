<section class="books_section">
    <script>
        fetch('http://localhost/Certificado/bookStore/index.php/books')
            .then(res => res.json())
            .then(data => {
                const booksSection = document.querySelector('.books_section');

                data.forEach(book => {
                    const card = document.createElement('div');
                    card.classList.add('book_card');
                    card.innerHTML = `<div class="book_image">
                                    <img src="public/assets/images/books/${book.image}" alt="${book.title}">
                                    </div>
                                    <div class="book_info">
                                    <h3>${book.title}</h3>
                                    <p class="author">${book.author}</p>
                                    <p class="price">$${book.price}</p>
                                    <button class="btn_buy">Add to cart</button>
                                    </div>`;
                    booksSection.appendChild(card);
                    });
            })
            .catch(err => console.error('Error loading books:', err));
    </script>

</section>