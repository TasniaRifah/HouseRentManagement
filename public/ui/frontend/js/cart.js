
init();

function init() {
    setTotalItemCount();
    setGrandTotal();
}

const qtyInput = document.querySelectorAll('.qty-input');
qtyInput.forEach((input) => {
    input.addEventListener('change', function () {
        const unitPrice = this.parentElement.previousElementSibling.innerText;
        const qty = this.value;
        const totalPriceElement = this.parentElement.nextElementSibling;
        const updatePrice = parseFloat(unitPrice) * parseInt(qty);
        totalPriceElement.innerText = updatePrice;
        setGrandTotal();
    });
})

const removeBtn = document.querySelectorAll('.remove-btn');
removeBtn.forEach((btn) => {
    console.log(btn);
    btn.addEventListener('click', function () {
        const itemId = this.getAttribute('data-id');
        removeFromCart(itemId);
        this.parentElement.parentElement.remove()
        setTotalItemCount();
        setGrandTotal();
    });
})

function setTotalItemCount() {
    const tbodyElement = qs('tbody');
    const totalItemCount = qs('#totalItem');
    totalItemCount.innerText = tbodyElement.children.length;
}



function setGrandTotal() {
    const tbodyElement = qs('tbody');
    let totalPrice = 0;
    for (let i = 0; i < tbodyElement.children.length; i++) {
        const item = tbodyElement.children[i];
        const price = item.children[6].innerText;
        let discount = item.children[5].innerText;
// console.log('discount', discount);
        discount = (parseFloat(discount/100) * price);
        
       
            totalPrice += parseFloat(price) - parseFloat(discount) ;
        
        // totalPrice += parseInt(price);
    }
    qs('#grandTotal').innerText = totalPrice;
}

async function removeFromCart(id) {
    const res = await fetch(`cart-items/${id}`, {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        method: 'delete'
    });
    const result = await res.json();
    if(result.status){
        const cartItemCountElement = document.querySelector('#cartItemCount');
        cartItemCountElement.innerText = parseInt(cartItemCountElement.innerText) - 1;
        alert(result.message)
    }
}

function qs(selector) {
    return document.querySelector(selector)
}