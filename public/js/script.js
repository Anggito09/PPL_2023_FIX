let main = document.querySelector('#main-btn');
let navbar = document.querySelector('.header .nav');
let header = document.querySelector('.header');

main.onclick = () =>{
    main.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () =>{
    main.classList.remove('fa-times');
    navbar.classList.remove('active');

    if(window.scrollY > 0){
        header.classList.add('active');
    }else{
        header.classList.remove('active');
    }

}
