
function data_validation(event)
{
    
    if(form.username.value.length == 0 ||
       form.password.value.length == 0)
    {
        
        event.preventDefault();

        const error = document.querySelector(".errore_data");
        error.classList.remove("hidden");

        const inputs = document.querySelectorAll("#login_form input");
        for (let input of inputs) 
            if(input.type != "submit")
                input.style.borderColor = "red";

    }
        
}



const form = document.forms['login_form'];
form.addEventListener('submit', data_validation);



function OnClickModale() {
    const modale = document.querySelector('.modale');

    modale.classList.add('hidden');
    modale.innerHTML='';
}

const exit_modale = document.querySelector('.esci-modale');
exit_modale.addEventListener('click', OnClickModale);

