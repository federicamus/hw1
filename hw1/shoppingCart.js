
// CARRELLO MAIN PAGE

let totale = parseInt(0);

function onJson(json) {
    console.log(json);

    function checkCartItems() {

        fetch('checkCartItems.php').then(response => {
            if (!response.ok) {
                throw new Error('Errore HTTP ' + response.status);
            }
            return response.text(); 
        })
        .then(data => {
            console.log(data); 
            if (JSON.parse(data) != "Elemento trovato!") {
                const proceed_with_order = document.querySelector("#proceed_order");
                proceed_with_order.classList.add("hidden");

                const subtotale = document.querySelector("#subtotale");
                subtotale.classList.add("hidden");                    
            }
        })
        .catch(error => {
            console.error('Errore durante la richiesta fetch:', error);
        });
    }

    const cart = document.querySelector("#carrello-box");
    cart.innerHTML = "";

    let item_price = parseInt(0);

    if (json === "Nessun elemento!" || json === "Non autenticato") {
        checkCartItems();           
    } else {

        for (let i = 0; i < json.length; i++) {
            const item = json[i];
            console.log(item);

            const author = item.autore;
            const title = item.titolo;
            const price = item.costo;
            const isbn = item.ISBN;
            let copie = item.copie;

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
            book_cover.src = item.img;
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

            const cart_buttons = document.createElement('div');
            cart_buttons.classList.add("cart-text");
            const add_button = document.createElement('img');
            add_button.src = "/hw1/img/icons8-più-24.png";
            add_button.addEventListener('click', addCopy);

            const remove_button = document.createElement('img');
            remove_button.src = "/hw1/img/icons8-meno-24.png";
            remove_button.addEventListener('click', removeCopy);


            const delete_button = document.createElement('img');
            delete_button.src = "/hw1/img/icons8-rimuovere-24.png";
            delete_button.addEventListener('click', deleteFromCart);


            cart_buttons.appendChild(add_button);
            cart_buttons.appendChild(remove_button);
            cart_buttons.appendChild(delete_button);
            cart_row.appendChild(cart_buttons);

            let item_total_price = document.createElement('div');
            item_total_price.classList.add("cart-text");
            item_total_price.textContent = "€ " + parseInt(price)*copie + ",00";
            cart_row.appendChild(item_total_price);
            item_price = parseInt(price)*copie;

            cart.appendChild(cart_row);

            function addCopy() {

                let data = {
                    copie: copie,
                    isbn: isbn
                }

                fetch("addCopy.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json', 
                    },
                    body: JSON.stringify(data)
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Errore HTTP ' + response.status);
                    }
                    return response.text(); 
                })
                .then(data => {
                    console.log(data); 
                    if(JSON.parse(data) === "Copia aggiunta") {
                        item_price = parseInt(copie)*price;
                        copie = parseInt(copie) + 1;
                        n_copie.textContent = copie + " copie";
                        let new_item_price = parseInt(price)*copie;
                        console.log(item_price);
                        console.log(new_item_price);
                        item_total_price.textContent = "€ " +  new_item_price + ",00";
                        aggiornaTotale(new_item_price, item_price);
                    }
                })
                .catch(error => {
                    console.error('Errore durante la richiesta fetch:', error);
                });
            }

            function removeCopy() {
                let data = {
                    copie: copie,
                    isbn: isbn
                }

                fetch("removeCopy.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json', 
                    },
                    body: JSON.stringify(data)
                }).then(response => {
                    if (!response.ok) {
                        throw new Error('Errore HTTP ' + response.status);
                    }
                    return response.text(); 
                })
                .then(data => {
                    console.log(data); 
                    if(JSON.parse(data) === "Copia rimossa") {
                        item_price = parseInt(copie)*price;
                        copie = parseInt(copie) - 1;
                        if(copie === 0) {
                            deleteFromCart();
                        }
                        n_copie.textContent = copie + " copie";
                        let new_item_price = parseInt(price)*copie;
                        console.log(item_price);
                        console.log(new_item_price);
                        item_total_price.textContent = "€ " +  new_item_price + ",00";
                        aggiornaTotale(new_item_price, item_price);
                    }
                })
                .catch(error => {
                    console.error('Errore durante la richiesta fetch:', error);
                });
            }

            function deleteFromCart() {
                fetch('deleteFromCart.php?isbn=' + isbn).then(response => {
                    if (!response.ok) {
                        throw new Error('Errore HTTP ' + response.status);
                    }
                    return response.text(); 
                })
                .then(data => {
                    console.log(data); 
                    if (JSON.parse(data) === "Elemento eliminato dal carrello") {
                        cart_row.innerHTML="";
                        item_price = parseInt(copie)*price;
                        const new_item_price = "";
                        aggiornaTotale(new_item_price, item_price);

                        checkCartItems();
                        

                    }
                    
                })
                .catch(error => {
                    console.error('Errore durante la richiesta fetch:', error);
                });
            }



            totale = totale + item_price;

            function aggiornaTotale(new_item_price, item_price) {
                console.log(totale);
                totale = totale + new_item_price - item_price;
                console.log(totale);
                stampaTotale();
            }
            
        }

   
        console.log(totale);
        function stampaTotale() {
        const subtotale = document.querySelector("#subtotale");
        subtotale.innerHTML="";

        const bill = document.createElement("div");
        bill.textContent = 'SUBTOTALE: ' + "€ " + totale + ",00";
        
        subtotale.appendChild(bill);
        }

        stampaTotale();
        
        
    }
}

function onResponse(response) {
    if (!response.ok) {return null};
    return response.json();
}

fetch("extractFromCart.php").then(onResponse).then(onJson);

// ORDINE

const payment = document.querySelector("#payment");
const order_checking = document.querySelector("#order-checking");


// PROCEDI CON L'ORDINE

function onClickProceedOrder() {
    const cart_view = document.querySelector("#carrello");
    cart_view.innerHTML="";

    
    fetch('checkBilling.php').then(response => {
        if (!response.ok) {
            throw new Error('Errore HTTP ' + response.status);
        }
        return response.text(); 
    })
    .then(data => {
        console.log(data); 
        if (JSON.parse(data) === "Elemento trovato!") {
            checkPaymentMethods();
        } else {
            const billing = document.querySelector("#billing");
            billing.classList.remove("hidden");
        }
    })
    .catch(error => {
        console.error('Errore durante la richiesta fetch:', error);
    });
}

const proceed_order = document.querySelector("#proceed_order");
proceed_order.addEventListener('click', onClickProceedOrder);

// FATTURAZIONE

function billingData_validation(event) {
    if(billing_form.nome.value.length === 0 || billing_form.cognome.value.length === 0 || billing_form.indirizzo.value.length === 0 || billing_form.cap.value.length === 0 ||  billing_form.citta.value.length === 0 || billing_form.cf.value.length === 0 || billing_form.tel_princ.value.length === 0) {

        alert("Compilare tutti i campi obbligatori!");

        event.preventDefault();

    } else if (billing_form.cap.value.length != 5) {
        alert("CAP non valido");

        event.preventDefault();

    } else if (billing_form.cf.value.length != 16) {
        alert("CF non valido");

        event.preventDefault();

    } else if (billing_form.tel_princ.value.length > 15) {
        alert("Numero di telefono non valido");

        event.preventDefault();
    } else 
        onSubmitBilling(event);
}

function onSubmitBilling(event) {
   

    event.preventDefault();

    let form_data = {
        nome: billing_form.nome.value,
        cognome: billing_form.cognome.value,
        indirizzo: billing_form.indirizzo.value,
        info_aggiuntiva: billing_form.fac.value,
        cap: billing_form.cap.value,
        citta: billing_form.citta.value,
        provincia: billing_form.provincia.value,
        CF: billing_form.cf.value,
        telefono: billing_form.tel_princ.value,
        tel_sec: billing_form.tel_sec.value
    };

    fetch('loadBilling.php',  {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', 
        },
        body: JSON.stringify(form_data) 
    }).then(response => {
        if (!response.ok) {
            throw new Error('Errore HTTP ' + response.status);
        }
        return response.text(); 
    })
    .then(data => {
        console.log(data); 
        if (JSON.parse(data) === "Fatturazione inserita") {
            const billing = document.querySelector("#billing");

            billing.classList.add("hidden");

            checkPaymentMethods();
        }
    })
    .catch(error => {
        console.error('Errore durante la richiesta fetch:', error);
    });

}

const billing_form = document.forms['billing_form'];
billing_form.addEventListener('submit', billingData_validation);

// METODO DI PAGAMENTO

// CONTROLLA METODO DI PAGAMENTO

function checkPaymentMethods() {
    fetch('checkPaymentMethods.php').then(response => {
        if (!response.ok) {
            throw new Error('Errore HTTP ' + response.status);
        }
        return response.text(); 
    })
    .then(data => {
        console.log(data); 
        if (JSON.parse(data) === "Elemento trovato!") {
            order_checking.classList.remove("hidden");
            onOrderChecking();

        } else {
            payment.classList.remove("hidden");
        }
    })
    .catch(error => {
        console.error('Errore durante la richiesta fetch:', error);
    });
}

function paymentData_validation(event) {
    if(payment_form.numero.value.length === 0 || payment_form.nome.value.length === 0 || payment_form.mese.value.length === 0 || payment_form.anno.value.length === 0 | payment_form.cvv.value.length === 0) {
      

        alert("Compilare tutti i campi");
        
        event.preventDefault();

    } else if(payment_form.numero.value.length != 16) {
        alert("Carta non valida!");
        event.preventDefault();
    } else if(payment_form.cvv.value.length != 3) {
        alert("CVV non valido");
        event.preventDefault();
    } else
        onSubmitPayment(event);
}


function onSubmitPayment(event) {
    

    event.preventDefault();

        let form_data = {
            numero_carta: payment_form.numero.value,
            nome: payment_form.nome.value,
            mese: payment_form.mese.value,
            anno: payment_form.anno.value,
            cvv: payment_form.cvv.value
        };

        fetch('loadPaymentMethod.php',  {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json', 
            },
            body: JSON.stringify(form_data) 
        }).then(response => {
            if (!response.ok) {
                throw new Error('Errore HTTP ' + response.status);
            }
            return response.text(); 
        })
        .then(data => {
            console.log(data); 
            if (JSON.parse(data) === "Metodo di pagamento inserito") {
            
                payment.classList.add("hidden");
                order_checking.classList.remove("hidden");
                onOrderChecking();
            }
        })
        .catch(error => {
            console.error('Errore durante la richiesta fetch:', error);
        });
    
    
}

const payment_form = document.forms['payment_form'];
payment_form.addEventListener('submit', paymentData_validation);



function deleteCart() {
    fetch('deleteWholeCart.php').then(response => {
        if (!response.ok) {
            throw new Error('Errore HTTP ' + response.status);
        }
        return response.text(); 
    })
    .then(data => {
        console.log(data); 
        if (JSON.parse(data) === "Carrello svuotato") {
            window.location.href = "orders.php";
           
        }
    })
    .catch(error => {
        console.error('Errore durante la richiesta fetch:', error);
    });
}

// PAGINA CONTROLLO ORDINE

// AGGIUNGI CARTA

function onClickAddCard() {
    payment.classList.remove("hidden");
    order_checking.classList.add("hidden");
}

// MODIFICA FATTURAZIONE

function onClickModifica() {
    fetch('removeBilling.php').then(response => {
        if (!response.ok) {
            throw new Error('Errore HTTP ' + response.status);
        }
        return response.text(); 
    })
    .then(data => {
        console.log(data); 
        if (JSON.parse(data) === "Elemento rimosso") {
            const billing = document.querySelector("#billing");

            order_checking.classList.add("hidden");
            billing.classList.remove("hidden");
        }
        
    })
    .catch(error => {
        console.error('Errore durante la richiesta fetch:', error);
    });
}

function onJsonChecking(json) {
    console.log(json);
    const cart = document.querySelector("#cart-summary");
    cart.innerHTML = "";

    if (json === "Nessun elemento!") {
        alert("Nessun elemento presente nel carrello");
    } else {

        for (let i = 0; i < json.length; i++) {
            const item = json[i];
            console.log(item);

            const author = item.autore;
            const title = item.titolo;
            const price = item.costo;
            const isbn = item.ISBN;
            let copie = item.copie;

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
            book_cover.src = item.img;
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

            cart.appendChild(cart_row);
            
        }

   
        console.log(totale);

        const subtotale = document.querySelector("#subtotale");
        subtotale.innerHTML = "";

        const bill = document.createElement("div");
        bill.textContent = 'SUBTOTALE: ' + "€ " + totale + ",00";
        
        subtotale.appendChild(bill);


        // ESTRAZIONE DATI FATTURAZIONE
        
        const info_spedizione = document.querySelector(".indirizzo-spedizione");

        fetch('extractBilling.php').then(response => {
            if (!response.ok) {
                throw new Error('Errore HTTP ' + response.status);
            }
            return response.text(); 
        })
        .then(data => {
            console.log(data); 
            json_data = JSON.parse(data);
            billing = json_data[0];

            info_spedizione.innerHTML="";

            const spedizione_title = document.createElement("h2");
            spedizione_title.textContent ="INDIRIZZO DI SPEDIZIONE";
            info_spedizione.appendChild(spedizione_title);

            const modifica_spedizione = document.createElement("img");
            modifica_spedizione.src = "/hw1/img/icons8-creare-nuovo-64.png";
            spedizione_title.appendChild(modifica_spedizione);
            modifica_spedizione.addEventListener('click', onClickModifica);

            const nome_cognome = document.createElement('div');
            nome_cognome.textContent = billing.nome + ' ' + billing.cognome;

            const indirizzo = document.createElement('div');
            indirizzo.textContent = billing.indirizzo;

            const residenza = document.createElement('div');
            residenza.textContent = billing.CAP + ' ' + billing.citta + ' (' + billing.provincia + ')';
        
            const cf = document.createElement('div');
            cf.textContent = billing.CF;

            info_spedizione.appendChild(nome_cognome);
            info_spedizione.appendChild(indirizzo);
            info_spedizione.appendChild(residenza);
            info_spedizione.appendChild(cf);

        })
        .catch(error => {
            console.error('Errore durante la richiesta fetch:', error);
        });

        // ESTRAZIONE DATI PAGAMENTO

        const info_pagamento = document.querySelector(".metodo-pagamento");

        fetch('extractPaymentMethods.php').then(response => {
            if (!response.ok) {
                throw new Error('Errore HTTP ' + response.status);
            }
            return response.text(); 
        })
        .then(data => {
            console.log(data); 
            json_data = JSON.parse(data);

            info_pagamento.innerHTML="";

            const payment_title = document.createElement("h2");
            payment_title.textContent ="METODO DI PAGAMENTO";
            info_pagamento.appendChild(payment_title);
            
            for (let i = 0; i < json_data.length; i++) {
                const card = json_data[i]; 
                const card_number = card.numero_carta;
                const last_digits = card_number.substring(12, 16);
                console.log(last_digits);
                const first_digit = card_number.charAt(0);
                console.log(first_digit);

            const card_info = document.createElement("div");
            card_info.classList.add("card_info");

            const card_radio = document.createElement("input");
            card_radio.type = "radio";
            card_radio.name = "card_choice";
            card_radio.value = card_number;
            card_radio.classList.add("card_info");

            card_info.appendChild(card_radio);

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

                // ELIMINA CARTA


                function onClickDeleteCard(event) {
                    fetch('removePaymentMethod.php?numero_carta=' + card_number).then(response => {
                        if (!response.ok) {
                            throw new Error('Errore HTTP ' + response.status);
                        }
                        return response.text(); 
                    })
                    .then(data => {
                        console.log(data); 
                        if(JSON.parse(data) === "Elemento rimosso") {
                            event.target.parentNode.remove();
                        }
                    })
                    .catch(error => {
                        console.error('Errore durante la richiesta fetch:', error);
                    });
                }


                const delete_card = document.createElement("img");
                delete_card.src = "/hw1/img/icons8-rimuovere-24.png";
                delete_card.classList.add("delete_card");
                delete_card.addEventListener('click', onClickDeleteCard);

               

                card_info.appendChild(card_img);
                card_info.appendChild(card_type);
                card_info.appendChild(delete_card);

                info_pagamento.appendChild(card_info);

            }

            const add_card = document.createElement('div');
                add_card.textContent = "Aggiungi carta di credito/debito";
                add_card.classList.add("add_card");
                add_card.addEventListener('click', onClickAddCard);

                info_pagamento.appendChild(add_card);

        })
        .catch(error => {
            console.error('Errore durante la richiesta fetch:', error);
        });

    }
}

function onOrderChecking() {
    fetch("extractFromCart.php").then(onResponse).then(onJsonChecking);
}

// PAGAMENTO E FINE ORDINE


function orderData_validation(event) {
    if(order_form.card_choice.value === "") {
        alert("Scegli un metodo di pagamento!");

        event.preventDefault();
    } else 
        onSubmitPay(event);
}


function onSubmitPay(event) {

    event.preventDefault();
    console.log(totale);
    console.log(order_form.card_choice.value);

    let form_data = {
        totale: totale,
        carta: order_form.card_choice.value
    }

    fetch('loadOrder.php',  {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', 
        },
        body: JSON.stringify(form_data) 
    }).then(response => {
        if (!response.ok) {
            throw new Error('Errore HTTP ' + response.status);
        }
        return response.text(); 
    })
    .then(data => {
        console.log(data); 
        if (JSON.parse(data) === "Ordine inserito") {
            alert("Ordine inserito correttamente");

            deleteCart();
        }
    })
    .catch(error => {
        console.error('Errore durante la richiesta fetch:', error);
    });

}

const order_form = document.forms['order_form'];
order_form.addEventListener('submit', orderData_validation);

