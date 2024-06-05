

function onJson(json) {
    console.log(json);

    const book = json[0];

    const title = book.titolo;
    const author = book.autore;
    const published_date = book.data_di_pubblicazione;
    const pages = book.pagine;
    const isbn = book.ISBN;
    const img = book.img;
    const description = book.descrizione;
    const price = book.costo;

    const book_view = document.querySelector('.book-view');
    book_view.innerHTML = "";

    const book_tab = document.createElement('div');
            book_tab.classList.add('book-tab');
  
            const book_img = document.createElement('img');
            book_img.src = img;
            book_img.classList.add('book-img');
  
            const book_header = document.createElement('div');
            book_header.classList.add('book-header');
  
            const book_view_info = document.createElement('div');
            book_view_info.classList.add('book-view-info');
  
            const book_view_author = document.createElement('h1');
            book_view_author.textContent = author;
            book_view_author.classList.add('book-view-author');
  
            const book_view_like_button = document.createElement('img');
            fetch('checkPreferences.php?isbn=' + isbn).then(response => {
                if (!response.ok) {
                    throw new Error('Errore HTTP ' + response.status);
                }
                return response.text(); 
            })
            .then(data => {
                console.log(data); 
                if (JSON.parse(data) === "Elemento trovato!") {
                    book_view_like_button.src = '/hw1/img/icons8-cuore-96.png';
                } else {
                    book_view_like_button.src = '/hw1/img/icons8-cuore-90.png';
                }
            })
            .catch(error => {
                console.error('Errore durante la richiesta fetch:', error);
            });
            
            book_view_like_button.classList.add('like-button');
            book_view_like_button.addEventListener('click', changeLike);
  
            const book_view_title = document.createElement('h2');
            book_view_title.textContent = title;
            book_view_title.classList.add('book-view-title');
  
            const book_view_data = document.createElement('div');
            book_view_data.textContent = 'PRIMA EDIZIONE: ' + published_date;
            book_view_data.classList.add('book-view-testo');
  
            const book_view_pages = document.createElement('div');
            book_view_pages.textContent = 'PAGINE: ' + pages;
            book_view_pages.classList.add('book-view-testo');
  
            const book_view_isbn = document.createElement('div');
            book_view_isbn.textContent = 'ISBN: ' + isbn;
            book_view_isbn.classList.add('book-view-testo');

            const book_view_price = document.createElement('div');
            book_view_price.textContent = 'COSTO: ' + '€ ' + price + ',00';
            book_view_price.classList.add('book-view-testo');

            const book_view_description = document.createElement('div');
            book_view_description.textContent = description;
            book_view_description.classList.add('book-view-description');


            book_tab.appendChild(book_img);
            book_header.appendChild(book_view_author);         
            book_header.appendChild(book_view_like_button);
            book_view_info.appendChild(book_header);
            book_view_info.appendChild(book_view_title);   
            book_view_info.appendChild(book_view_data);
            book_view_info.appendChild(book_view_pages);
            book_view_info.appendChild(book_view_isbn);
            book_view_info.appendChild(book_view_price);
            book_view_info.appendChild(book_view_description);
            book_tab.appendChild(book_view_info);
            book_view.appendChild(book_tab);
            
            
            function changeLike(event) {
                const like_img = event.currentTarget;
                

                if(like_img.src === "http://localhost/hw1/img/icons8-cuore-90.png") {

    
                let data_preferences = {
                    autore: author,
                    titolo: title,
                    data: published_date,
                    pagine: pages,
                    codice: isbn,
                    img: img,
                    descrizione: description,
                    costo: price
                };

                console.log(data_preferences);
    
                fetch('loadPreferences.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json', 
                    },
                    body: JSON.stringify(data_preferences) 
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Errore HTTP ' + response.status);
                    }
                    return response.text(); 
                })
                .then(data => {
                    console.log(data); 
                    if(JSON.parse(data) === "Non autenticato") {
                        window.location.href = "login.php";
                    } else if (JSON.parse(data) === "Elemento inserito") {
                        like_img.src = 'http://localhost/hw1/img/icons8-cuore-96.png'; 
                    }
                })
                .catch(error => {
                    console.error('Errore durante la richiesta fetch:', error);
                });
              } else {
                    fetch('removePreferences.php?isbn=' + isbn).then(response => {
                        if (!response.ok) {
                            throw new Error('Errore HTTP ' + response.status);
                        }
                        return response.text(); 
                    })
                    .then(data => {
                        console.log(data); 
                        if (JSON.parse(data) === "Elemento rimosso") {
                            like_img.src = 'http://localhost/hw1/img/icons8-cuore-90.png'; 
                        }
                    })
                    .catch(error => {
                        console.error('Errore durante la richiesta fetch:', error);
                    });
                }
            }
            
}

function onResponse(response) {
    if (!response.ok) {return null};
    return response.json();
}

const queryParameters = new URLSearchParams(window.location.search);
const isbn = queryParameters.get('isbn');
console.log(isbn);

fetch('extractBook.php?isbn=' + isbn).then(onResponse).then(onJson);



// SEZIONE RECENSIONI

// TUA RECENSIONE


function OnClickCancella() {

    const search_inputs = document.querySelectorAll('#search-input');
    for (let search_input of search_inputs) {
        search_input.value='';
    }

  }
  
  const cancella_buttons = document.querySelectorAll('.cancella-button');

  for (let cancella_button of cancella_buttons) {
    cancella_button.addEventListener('click', OnClickCancella);
}


function onSubmitReview(event) {

    if(review_form.review.value.length > 500) {
        alert("Hai superato il numero max di 500 caratteri!");

        event.preventDefault();
    }
    
    event.preventDefault();

    let form_data = {
        review_input: review_form.review.value,
        isbn: isbn
    };

    fetch('loadReview.php',  {
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
        if(JSON.parse(data) === "Non autenticato") {
            window.location.href = "login.php";
        } else if (JSON.parse(data) === "Recensione inserita") {
            review_form.review.value = "";

            extractYourReview();

        } else if (JSON.parse(data) === "Recensione già inserita!") {
            alert("Recensione già inserita!");
            review_form.review.value = "";
        } 
    })
    .catch(error => {
        console.error('Errore durante la richiesta fetch:', error);
    });

}

const review_form = document.forms['review-form'];
review_form.addEventListener('submit', onSubmitReview);



const your_review = document.querySelector("#your-review");

function removeReview() {
    fetch('removeReview.php?isbn=' + isbn).then(response => {
        if (!response.ok) {
            throw new Error('Errore HTTP ' + response.status);
        }
        return response.text(); 
    })
    .then(data => {
        console.log(data); 
        if (JSON.parse(data) === "Elemento rimosso") {
            your_review.classList.add("hidden");
        }
    })
    .catch(error => {
        console.error('Errore durante la richiesta fetch:', error);
    });
}

const modifiedReview = document.querySelector("#modale-modifiedReview");



function closeModale() {
    modifiedReview.classList.add("hidden");
    OnClickCancella();

}

const exit_button = document.querySelector(".exit-button");
exit_button.addEventListener('click', closeModale);

function onSubmitModifiedReview(event) {

    event.preventDefault();

    removeReview();

    let form_data = {
        review_input: modifiedReview_form.review.value,
        isbn: isbn
    };

    fetch('loadReview.php',  {
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
        if(JSON.parse(data) === "Non autenticato") {
            window.location.href = "login.php";
        } else if (JSON.parse(data) === "Recensione inserita") {
            modifiedReview_form.review.value = "";

            extractYourReview();

        } else if (JSON.parse(data) === "Recensione già inserita!") {
            alert("Recensione già inserita!");
            modifiedReview_form.review.value = "";
        } 
    })
    .catch(error => {
        console.error('Errore durante la richiesta fetch:', error);
    });

}

const modifiedReview_form = document.forms['modifiedReview-form'];

function modifyReview() {
    modifiedReview.classList.remove("hidden");

    
    
    modifiedReview_form.addEventListener('submit', onSubmitModifiedReview);

}



function extractYourReview() {

    fetch('extractYourReview.php?isbn=' + isbn).then(response => {
        if (!response.ok) {
            throw new Error('Errore HTTP ' + response.status);
        }
        return response.text(); 
    })
    .then(data => {
        console.log(data); 
        const json_review = JSON.parse(data);
        console.log(json_review);
        if (json_review != "Nessun elemento!") {

            your_review.classList.remove("hidden");
            your_review.innerHTML="";
    
            const review = json_review[0];
            const username = review.username;
            const text = review.testo;
    
            console.log(username);
            console.log(text);

            const your_review_title = document.createElement('h2');
            your_review_title.textContent = 'La tua recensione:';
    
            const review_tab = document.createElement('div');
            review_tab.classList.add('review-tab');
    
            const review_username = document.createElement('div');
            review_username.textContent = username + ":";
            review_username.classList.add('review-username');
    
            const review_text = document.createElement('p');
            review_text.textContent = text;
            review_text.classList.add('review-text');
    
            const review_buttons = document.createElement('div');
            review_buttons.classList.add('review-buttons');
    
            const rimuovi = document.createElement('input');
            rimuovi.type = "button";
            rimuovi.value = "Rimuovi";
            rimuovi.addEventListener('click', removeReview);
    
            const modifica = document.createElement('input');
            modifica.type = "button";
            modifica.value = "Modifica";
            modifica.addEventListener('click', modifyReview);
                
            review_tab.appendChild(review_username);
            review_tab.appendChild(review_text);
            review_buttons.appendChild(rimuovi);
            review_buttons.appendChild(modifica);
            review_tab.appendChild(review_buttons);
            
            your_review.appendChild(your_review_title);
            your_review.appendChild(review_tab);          
        
    }
        
    })
    .catch(error => {
        console.error('Errore durante la richiesta fetch:', error);
    });
}

extractYourReview();

// RECENSIONI ALTRI UTENTI


const extract_url = 'extractReviews.php?isbn=' + isbn;
console.log(extract_url);

fetch('extractReviews.php?isbn=' + isbn).then(response => {
    if (!response.ok) {
        throw new Error('Errore HTTP ' + response.status);
    }
    return response.text(); 
})
.then(data => {
    console.log(data); 
    const reviews_added = document.querySelector('#reviews-added');
    const json_reviews = JSON.parse(data);
    console.log(json_reviews);
    if (json_reviews === "Nessun elemento!") {
        const no_reviews = document.createElement('div');
        no_reviews.textContent = "Nessuna recensione disponibile";
        reviews_added.appendChild(no_reviews);
    } else {
    
    for (let i = 0; i < json_reviews.length; i++) {
        const review = json_reviews[i];
        console.log(review);
        

        const username = review.username;
        const text = review.testo;

        console.log(username);
        console.log(text);
        

        const review_tab = document.createElement('div');
        review_tab.classList.add('review-tab');

        const review_username = document.createElement('div');
        review_username.textContent = username + ":";
        review_username.classList.add('review-username');

        const review_text = document.createElement('p');
        review_text.textContent = text;
        review_text.classList.add('review-text');

        review_tab.appendChild(review_username);
        review_tab.appendChild(review_text);

        reviews_added.appendChild(review_tab);
        
    }
}
    
})
.catch(error => {
    console.error('Errore durante la richiesta fetch:', error);
});


// AGGIUNGI AL CARRELLO


function addToCart() {
    fetch('addToCart.php?isbn=' + isbn).then(response => {
        if (!response.ok) {
            throw new Error('Errore HTTP ' + response.status);
        }
        return response.text(); 
    })
    .then(data => {
        console.log(data); 
        if (JSON.parse(data) === "Elemento già nel carrello!") {
            alert("Elemento già nel carrello!");
        } else if (JSON.parse(data) === "Non autenticato") {
            window.location.href = "login.php";
        }
        
    })
    .catch(error => {
        console.error('Errore durante la richiesta fetch:', error);
    });
}

const cart = document.querySelector(".add-cart");
cart.addEventListener('click', addToCart);



