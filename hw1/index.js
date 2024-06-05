function onClickTurnRight() {
    const tabs = document.querySelectorAll('.temi-tab');

    for(const tab of tabs) {
        const index = parseInt(tab.dataset.index);

        if(index === 0) {
            tab.classList.add('hidden');
        }
        else if(index === 1) {
          tab.classList.remove('hidden');
        }
    }
}

const turnright_buttons = document.querySelectorAll('.turn-right');
for (const turnright_button of turnright_buttons) {
    turnright_button.addEventListener('click', onClickTurnRight);
}

function onClickTurnLeft() {
    const tabs = document.querySelectorAll('.temi-tab');

    for(const tab of tabs) {
        const index = parseInt(tab.dataset.index);

        if(index === 1) {
            tab.classList.add('hidden');
        }
        else if(index === 0) {
          tab.classList.remove('hidden');
        }
    }
}

const turnleft_buttons = document.querySelectorAll('.turn-left');
for (const turnleft_button of turnleft_buttons) {
    turnleft_button.addEventListener('click', onClickTurnLeft);
}

function onClickNascondi(event) {
    const nascondi_button = event.currentTarget;
    const news_testo = document.querySelector('.news-leggi-testo');
    const news_leggi = document.querySelector('.news-leggi');

    nascondi_button.classList.add('hidden');
    news_testo.classList.add('hidden');
    news_leggi.classList.remove('hidden');
}

function onClickLeggi(event) {
    const news_leggi = event.currentTarget;
    const news_testo = document.querySelector('.news-leggi-testo');
    const nascondi_button = document.querySelector('.nascondi-news');

    news_leggi.classList.add('hidden');
    news_testo.classList.remove('hidden');
    nascondi_button.classList.remove('hidden');

    nascondi_button.addEventListener('click', onClickNascondi);
}

const read_button = document.querySelector('.news-leggi');
read_button.addEventListener('click', onClickLeggi);

const ricezione_iscr = document.createElement('h1');
ricezione_iscr.textContent = 'CONGRATULAZIONI, SEI UFFICIALMENTE ISCRITTO ALLA NOSTRA NEWSLETTER!';
const exit = document.createElement('button');
exit.textContent = 'torna nella homepage';

function onClickExit() {
    const iscrizione_form = document.querySelector('.newsletter-iscrizione');
    const iscrizione_text = document.querySelector('.newsletter-iscrizione div');

    iscrizione_form.classList.add('hidden');
    iscrizione_form.removeChild(ricezione_iscr);
    iscrizione_form.removeChild(exit);
    iscrizione_text.classList.remove('hidden');
}



// API YOUTUBE

var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


var player;
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    height: '260',
    width: '462,2', 
    videoId: '6xDezJD69A0',
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
}

function onPlayerReady(event) {
  event.target.playVideo();
}


var done = false;
function onPlayerStateChange(event) {
  if (event.data == YT.PlayerState.PLAYING && !done) {
    setTimeout(stopVideo, 6000);
    done = true;
  }
}
function stopVideo() {
  player.stopVideo();
}




// SPOTIFY CON CURL

function CloseModale() {
    const modale = document.querySelector('#modale-playlist');
    modale.classList.add('hidden');
}


const exit_playlist = document.querySelector('.exit-button');
exit_playlist.addEventListener('click', CloseModale);

function fetchPlaylistJson(json) {
    console.log('JSON ricevuto');
    console.log(json);
  
    const modale = document.querySelector('#modale-playlist');
    const view = document.querySelector('#playlist-view');
    view.innerHTML = "";
  
    const results = json.items;
    let num_results = results.length;
  
    if (num_results > 6)
      num_results = 6;
  
    for (let i=0; i<num_results; i++) {
      const item = json.items[i];
  
      const name = item.name;
      const thePassenger = "The Passenger";
      if(!name.includes(thePassenger)) {
        num_results = num_results + 1;
      } else {
      const owner = item.owner.display_name;
      const link = item.external_urls.spotify;
      const image_url = item.images[0].url;
  

  
      const playlist = document.createElement('div');
      playlist.classList.add('playlist-format');
    
      const playlist_info = document.createElement('div');
      playlist_info.classList.add('playlist-info');
    
      const playlist_cover = document.createElement('img');
      playlist_cover.src = image_url;
      playlist_cover.classList.add('playlist-cover');
    
      const playlist_owner = document.createElement('div');
      playlist_owner.textContent = 'Di ' + owner;
      playlist_owner.classList.add('playlist-owner');
    
      const playlist_name = document.createElement('div');
      playlist_name.textContent = name;
      playlist_name.classList.add('playlist-name');
    
      const playlist_link = document.createElement('a');
      playlist_link.href = link;
      playlist_link.classList.add('playlist-link');
  
      const playlist_link_img = document.createElement('img');
      playlist_link_img.src = "/hw1/img/icons8-riproduci-24.png";
  
      playlist.appendChild(playlist_cover);
      playlist_link.appendChild(playlist_link_img);
      playlist_info.appendChild(playlist_name);
      playlist_info.appendChild(playlist_owner);
      playlist_info.appendChild(playlist_link);
      playlist.appendChild(playlist_info);
  
      view.appendChild(playlist);
      modale.classList.remove('hidden');
    }
    }
  }

function fetchResponse(response) {
  if (!response.ok) {return null};
  return response.json();
  }

function fetchPlaylist() {
  fetch("searchPlaylist.php").then(fetchResponse).then(fetchPlaylistJson);
}

const spotify_button = document.querySelector('#spotify-button');
spotify_button.addEventListener('click', fetchPlaylist);



