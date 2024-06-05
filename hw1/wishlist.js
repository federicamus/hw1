
function onJson(json) {
    console.log(json);

    const library = document.querySelector('#SearchResults-view');
    library.innerHTML = '';
    
    
    for(let i = 0; i < json.length; i++) {
        const item = json[i];
  
        const title = item.titolo;
        const author = item.autore;
        const published_date = item.data_di_pubblicazione;
        const pages = item.pagine;
        const isbn = item.ISBN;
        const description = item.description;

        const book = document.createElement('div');
        book.classList.add('libro-format');
  
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
  
        const book_date = document.createElement('div');
        book_date.textContent = published_date;
        book_date.classList.add('data-libro');
  
        book.appendChild(book_cover);
        book_info.appendChild(book_author);
        book_info.appendChild(book_title);
        book_info.appendChild(book_date);
        book.appendChild(book_info);
  
        library.appendChild(book);

        book.addEventListener('click', OnClickBook);
  
        function OnClickBook() {
            window.location.href = "book.php?isbn=" + isbn;
        }
  
    }
}

function onResponse(response) {
    if (!response.ok) {return null};
    return response.json();
}

fetch('extractPreferences.php').then(onResponse).then(onJson);
