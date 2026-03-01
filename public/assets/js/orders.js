const delete_item = document.getElementsByClassName("delete_item");
[...delete_item].forEach(item => {
    item.addEventListener("click", (e) => {
        const id_order = e.target.getAttribute("data-id-order");
        const id_book = e.target.getAttribute("data-id-book");
        const price = e.target.getAttribute("data-price");
        const quantity = e.target.getAttribute("data-quantity");
        const token = localStorage.getItem("token");
        window.location.href = BASE_URL + "index.php?c=OrderItem&a=delete&id_order=" + id_order + "&id_book=" + id_book + "&price=" + price + "&quantity=" + quantity + "&token=" + token;
    })
})

document.addEventListener("click", (e) => {
    if(e.target.classList.contains("decrease_quantity") || e.target.classList.contains("increase_quantity")) {
        let quantity = Number(e.target.getAttribute("data-quantity"));
        const id_order = e.target.getAttribute("data-id-order");
        const id_book = e.target.getAttribute("data-id-book");
        const price = e.target.getAttribute("data-price");
        if(e.target.classList.contains("decrease_quantity")) {
            quantity = quantity > 1 ? quantity - 1 : 1;
            const increaseBtn = document.querySelector(`.increase_quantity[data-id-book="${id_book}"]`);
            increaseBtn.setAttribute("data-quantity", quantity);
        } else if(e.target.classList.contains("increase_quantity")) {
            quantity = quantity + 1;
            const decreaseBtn = document.querySelector(`.decrease_quantity[data-id-book="${id_book}"]`);
            decreaseBtn.setAttribute("data-quantity", quantity);
        }
        e.target.setAttribute("data-quantity", quantity);

        const quantitySpan = document.querySelector(`.quantity_value[data-id-book="${id_book}"]`);
        quantitySpan.textContent = quantity;

        const token = localStorage.getItem("token");
        fetch(BASE_URL + "index.php?c=OrderItem&a=updateQuantity&id_order=" + id_order + "&id_book=" + id_book + "&quantity=" + quantity + "&price=" + price + "&token=" + token)
        .then(response => response.text())
        .then(data => {
            const totalPrice = document.querySelector(".total_price");
            totalPrice.textContent = data;
        });
    }
})

