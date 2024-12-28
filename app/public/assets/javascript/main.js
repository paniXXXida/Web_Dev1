let mobile = document.querySelector('.mobile');
let menu = document.querySelector('.wrap-menu');
let close = document.querySelector('.close');

mobile.onclick = function () {
    menu.style.display = 'block';
}

close.onclick = function () {
    menu.style.display = 'none';
}
