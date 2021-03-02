const darkmode = confirm("Do You Like Dark Mode? ");
if(darkmode){
    darkmodeFunction();
}

function darkmodeFunction(){
    const header=document.getElementById('header');
    const logo = document.getElementById('logo');
    const span = document.getElementById('span');

    //config the color
    header.style.backgroundColor='black';
    logo.style.color='white';
    span.style.color='white';
}