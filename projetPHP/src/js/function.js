var modal = document.getElementById('id01');
var advert = document.getElementById('advert');
var login = document.getElementById('login');
var logout = document.getElementById('logout');
var signup = document.getElementById('signup');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        advert.style.display='none';
        login.style.display='none';
        logout.style.display='none';
        signup.style.display='none';
    }
}

function Nav(state)
{
    if(state == "destroy")
    {
        modal.style.display='none';
        advert.style.display='none';
        login.style.display='none';
        signup.style.display='none';
        logout.style.display='none';
    }
    else if(state == "login")
    {
        modal.style.display='block';
        login.style.display='block';
    }
    else if(state == "advert")
    {
        modal.style.display='block';
        advert.style.display='block';
    }
    else if(state == "logout")
    {
        modal.style.display='block';
        logout.style.display='block';
    }
    else if(state == "signup")
    {
        modal.style.display='block';
        signup.style.display='block';
    }
    
}


function ouvrirNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function fermerNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "white";
}