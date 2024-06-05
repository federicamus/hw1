function data_validation(event)
{


    if(form.nome.value.length == 0 ||
        form.cognome.value.length == 0 ||
        form.email.value.length == 0 ||
        form.username.value.length == 0 ||
       form.password.value.length == 0 ||
       form.confirm_password.value.length == 0)
    {

        event.preventDefault();

        const error = document.querySelector(".generic_error");
        error.innerHTML="";
        error.textContent = "× Compilare tutti i campi";
        const inputs = document.querySelectorAll("#registration_form input");
        for (let input of inputs) 
            if(input.type != "submit")
                input.style.borderColor = "red";
    }

    function onJsonCheckUsername(json) {
        console.log(json);
        

        if (json === "Utente trovato!") {

            event.preventDefault();

            const error = document.querySelector(".username .errore_data");
            error.classList.remove("hidden");

            form.username.style.borderColor = "red";
        }
    }

    function onResponse(response) {
        if (!response.ok) return null;
        return response.json();
    }

    fetch("checkUsername.php?username="+encodeURIComponent(form.username.value)).then(onResponse).then(onJsonCheckUsername);

    

    if(form.password.value.length > 8 || form.password.value.match(/[^a-zA-Z\d]/) || !form.password.value.match(/\d/) || !form.password.value.match(/[A-Z]/)) {

        event.preventDefault();

        const error = document.querySelector(".nota");
       
        error.classList.add("errore_data");
        form.password.style.borderColor = "red";
    }


    if(form.password.value != form.confirm_password.value) {
        
        event.preventDefault();

        const error = document.querySelector(".confirm_password .errore_data");
        error.classList.remove("hidden");

        form.password.style.borderColor = "red";
        form.confirm_password.style.borderColor = "red";
    }

    if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email.value)) {
        event.preventDefault();

        const error = document.querySelector(".email .errore_data");
        error.classList.remove("hidden");

        form.email.style.borderColor = "red";
    }
        
}

const form = document.forms['registration_form'];
form.addEventListener('submit', data_validation);

