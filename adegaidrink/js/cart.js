document.addEventListener('DOMContentLoaded', () => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartItems = document.getElementById('cart-items');
    const cartTotal = document.getElementById('cart-total');

    function updateCart() {
        cartItems.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            total += item.price * item.quantity;
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.name}</td>
                <td>R$${item.price.toFixed(2)}</td>
                <td>${item.quantity}</td>
                <td><button type="button" class="remove-item" data-index="${index}">Remover</button></td>
            `;
            cartItems.appendChild(row);
        });

        cartTotal.textContent = `R$${total.toFixed(2)}`;
    }

    function addToCart(name, price) {
        const existingItem = cart.find(item => item.name === name);
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ name, price, quantity: 1 });
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCart();
    }

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', (e) => {
            const productName = e.target.dataset.name;
            const productPrice = parseFloat(e.target.dataset.price);
            addToCart(productName, productPrice);
        });
    });

    cartItems.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-item')) {
            const index = e.target.dataset.index;
            removeFromCart(parseInt(index, 10));
        }
    });

    // Atualiza o carrinho ao carregar a página
    updateCart();
});


function addToCart(name, price) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const existingItem = cart.find(item => item.name === name);
    
    if (existingItem) {
        // Atualiza a quantidade se o item já existir no carrinho
        existingItem.quantity += 1;
    } else {
        // Adiciona novo item ao carrinho
        cart.push({ name, price, quantity: 1 });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCart();
}


// Função para atualizar o total do carrinho
function updateTotal() {
    const cartItems = document.querySelectorAll('#cart-items tr');
    let total = 0;

    cartItems.forEach(item => {
        const price = parseFloat(item.querySelector('.cart-item-price').textContent.replace('R$', '').replace(',', '.'));
        const quantity = parseInt(item.querySelector('.quantity-input').value);
        total += price * quantity;
    });

    document.getElementById('cart-total').textContent = `R$${total.toFixed(2).replace('.', ',')}`;
}

// Função para remover itens do carrinho
function removeItem(event) {
    if (event.target.classList.contains('remove-button')) {
        const row = event.target.closest('tr');
        row.remove();
        updateTotal();
    }
}

// Adiciona eventos aos botões de adicionar ao carrinho
document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', () => {
        const name = button.getAttribute('data-name');
        const price = parseFloat(button.getAttribute('data-price'));
        addToCart(name, price);
    });
});

// Adiciona evento ao carrinho para remover itens
document.getElementById('cart-items').addEventListener('click', removeItem);

// Adiciona evento ao botão de finalizar compra (opcional)
document.getElementById('finalize-purchase').addEventListener('click', () => {
    alert('Compra finalizada!');
    // Limpa o armazenamento local
    localStorage.removeItem('cart');
    // Recarrega a página
    window.location.reload();
});