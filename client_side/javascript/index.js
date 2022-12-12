const bar = document.getElementById('bar');
const nav = document.getElementById('navbar');
const close = document.getElementById("close");

// open the navbar
if(bar){
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    })
}

// close the navbar
if(close){
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    })
}