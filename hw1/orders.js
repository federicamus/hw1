
function onJson(json) {
    console.log(json);
    const orders_box = document.querySelector("#orders-box");
    orders_box.innerHTML = "";

    for (let i = 0; i < json.length; i++) {
        const order = json[i];
        const data_aquisto = order.data_spedizione;
        
        const order_tab = document.createElement("div");
        order_tab.classList.add("order_tab");

        const order_title = document.createElement("h2");
        order_title.textContent = "ORDINE DEL GIORNO: " + data_aquisto;

        const cartInfo = JSON.parse(order.cart_content);
        console.log(cartInfo);

        order_tab.appendChild(order_title);

        for (let j = 0; j < cartInfo.length; j++) {
            cart_item = cartInfo[j];
            const author = cart_item.autore;
            const title = cart_item.titolo;
            const price = cart_item.costo;
            const isbn = cart_item.ISBN;
            let copie = cart_item.copie;

            function onClickBook() {
                window.location.href = "book.php?isbn=" + isbn;
            }

            const cart_row = document.createElement("div");
            cart_row.classList.add("cart-row");

            const book = document.createElement('div');
            book.classList.add('libro-format');
            book.addEventListener('click', onClickBook);

    
            const book_info = document.createElement('div');
            book_info.classList.add('info-libro');
    
            const book_cover = document.createElement('img');
            book_cover.src = cart_item.img;
            book_cover.classList.add('cop-libro');
    
            const book_author = document.createElement('div');
            book_author.textContent = author;
            book_author.classList.add('autore-libro');
    
            const book_title = document.createElement('div');
            book_title.textContent = title;
            book_title.classList.add('titolo-libro');
    
            const book_price = document.createElement('div');
            book_price.textContent = '€ ' + price + ',00';
            book_price.classList.add('data-libro');

            book.appendChild(book_cover);
            book_info.appendChild(book_author);
            book_info.appendChild(book_title);
            book_info.appendChild(book_price);
            book.appendChild(book_info);
            cart_row.appendChild(book);

            let n_copie = document.createElement('div');
            n_copie.textContent = copie + ' copie';
            n_copie.classList.add("cart-text");
            cart_row.appendChild(n_copie);

            
            let item_total_price = document.createElement('div');
            item_total_price.classList.add("cart-text");
            item_total_price.textContent = "€ " + parseInt(price)*copie + ",00";
            cart_row.appendChild(item_total_price);
            item_price = parseInt(price)*copie;

            order_tab.appendChild(cart_row);
        }

        const order_info = document.createElement("div");
        order_info.classList.add("order_info");

        const shippingJson = JSON.parse(order.billing_content);
        const billing = shippingJson[0];

        const shipping_info = document.createElement("div");
        shipping_info.classList.add("shipping_info");

        const spedizione_title = document.createElement("h2");
        spedizione_title.textContent ="INDIRIZZO DI SPEDIZIONE";
        shipping_info.appendChild(spedizione_title);

        const nome_cognome = document.createElement('div');
        nome_cognome.textContent = billing.nome + ' ' + billing.cognome;

        const indirizzo = document.createElement('div');
        indirizzo.textContent = billing.indirizzo;

        const residenza = document.createElement('div');
        residenza.textContent = billing.CAP + ' ' + billing.citta + ' (' + billing.provincia + ')';
        

        const totale = document.createElement("h2");
        totale.textContent = "TOTALE: " + "€ " + order.totale + ",00";
        totale.classList.add("totale");

        shipping_info.appendChild(nome_cognome);
        shipping_info.appendChild(indirizzo);
        shipping_info.appendChild(residenza);

        order_info.appendChild(shipping_info);
        order_info.appendChild(totale);
        order_tab.appendChild(order_info);

        const card_number = order.numero_carta;
        const last_digits = card_number.substring(12, 16);
        console.log(last_digits);
        const first_digit = card_number.charAt(0);
        console.log(first_digit);

        const card_data = document.createElement("div");
        card_data.classList.add("card_data");
        card_data.textContent = "Pagamento effettuato con:";

        const card_img = document.createElement("img");
        const card_type = document.createElement("div");

        if(first_digit === "3") {
            card_type.textContent = "American Express termina con " + last_digits;
            card_img.src = "/hw1/img/icons8-amex-48.png";
        }

        else if (first_digit === "4") {
            card_type.textContent = "Visa termina con " + last_digits;
            card_img.src = "/hw1/img/icons8-visa-48.png";
        }

        else if (first_digit === "5") {
            card_type.textContent = "Mastercard termina con " + last_digits;
            card_img.src = "/hw1/img/icons8-logo-mastercard-48.png";
        }

        else if (first_digit === "6") {
            card_type.textContent = "Discover Card termina con " + last_digits;
            card_img.src = "/hw1/img/icons8-discover-48.png";
        }
                
        else {
            card_type.textContent = "Carta termina con " + last_digits;
            card_img.src = "/hw1/img/icons8-fronte-carta-di-credito-50.png";
        }

        card_data.appendChild(card_img);
        card_data.appendChild(card_type);

        order_tab.appendChild(card_data);

        const arrival_date = document.createElement("div");
        arrival_date.textContent = "Data di arrivo prevista per il giorno: " + order.data_arrivo;

        order_tab.appendChild(arrival_date);
        orders_box.appendChild(order_tab);

    }
}

function onResponse(response) {
    if (!response.ok) {return null};
    return response.json();
}

fetch("extractFromOrders.php").then(onResponse).then(onJson);
