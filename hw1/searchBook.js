
function OnClickCancella() {
    const library_view = document.querySelector('#SearchResults-view');
    const search_input = document.querySelector('#search-input');
  
    library_view.innerHTML='';
    search_input.value='';
  }
  
  const cancella_button = document.querySelector('.cancella-button');
  cancella_button.addEventListener('click', OnClickCancella);

  

function onJson(json) {
    console.log('Json ricevuto');
    console.log(json);
    const library = document.querySelector('#SearchResults-view');
    library.innerHTML = '';
  
    let num_results = json.totalItems;
  
    if(num_results > 10)
        num_results = 10;
  
    for (let i = 0; i < num_results; i++) {
  
        const item = json.items[i];
  
        const title = item.volumeInfo.title;
        const author = item.volumeInfo.authors[0];
        const published_date = item.volumeInfo.publishedDate;
        const pages = item.volumeInfo.pageCount;
        const isbn = item.volumeInfo.industryIdentifiers[0].identifier;
        const id = item.id;
  
        const book = document.createElement('div');
        book.classList.add('libro-format');
  
        const book_info = document.createElement('div');
        book_info.classList.add('info-libro');
  
        const book_cover = document.createElement('img');
        book_cover.src = item.volumeInfo.imageLinks.thumbnail;
        book_cover.classList.add('cop-libro');
  
        const book_author = document.createElement('div');
        book_author.textContent = author;
        book_author.classList.add('autore-libro');
  
        const book_title = document.createElement('div');
        book_title.textContent = title;
        book_title.classList.add('titolo-libro');
  
        const book_date = document.createElement('div');
        book_date.textContent = published_date;
        book_date.classList.add('data-libro');
  
        book.appendChild(book_cover);
        book_info.appendChild(book_author);
        book_info.appendChild(book_title);
        book_info.appendChild(book_date);
        book.appendChild(book_info);
  
        library.appendChild(book);

        const url = 'https://www.googleapis.com/books/v1/volumes/' + id + '?key=AIzaSyAQGQRdu8vV-7ce8vqd-id_XlBU_7foFig';
        console.log(url);

        fetch(url).then(onResponseID).then(onJsonID);

        let books_data = null;

        function onJsonID(json) {
          console.log(json);
          const description = json.volumeInfo.description;
          
          books_data = {
            autore: author,
            titolo: title,
            data: published_date,
            pagine: pages,
            codice: isbn,
            img: item.volumeInfo.imageLinks.thumbnail,
            descrizione: description
        };    
      }
         
      function onResponseID(response) {
          console.log('Risposta ricevuta');
          return response.json();
      }

      book.addEventListener('click', OnClickBook);
  
      function OnClickBook() {
        fetch('loadBooks.php', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json', 
          },
          body: JSON.stringify(books_data) 
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
              window.location.href = "hw1_login.php";
          } else if (JSON.parse(data) === "Elemento già in wishlist!") {
              alert("Elemento già in wishlist!");
          }
      })
      .catch(error => {
          console.error('Errore durante la richiesta fetch:', error);
      }); 
        window.location.href = "book.php?isbn=" + isbn;
      }  

  }
}
  
  function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }
  
  
  
  function onSubmitSearch(event) {
    event.preventDefault();
  
    const search_input = document.querySelector('#search-input');
    const search_value = encodeURIComponent(search_input.value);
    console.log('Eseguo ricerca: ' + search_value);
  
    googleBooks_url = 'https://www.googleapis.com/books/v1/volumes?q=' + search_value + '+inpublisher:iperborea&key=AIzaSyAQGQRdu8vV-7ce8vqd-id_XlBU_7foFig';
    console.log('URL: ' + googleBooks_url);
  
    fetch(googleBooks_url).then(onResponse).then(onJson);
  }
  
  
  const search_form = document.querySelector('#full-page-search-form');
  search_form.addEventListener('submit', onSubmitSearch);