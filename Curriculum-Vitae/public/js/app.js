$(document).ready(function () {
    $(window).bind('scroll', function () {
        var gap = 400;
        if ($(window).scrollTop() > gap) {
            $('.navbar').removeClass('navbar-transparent');
        }
        else {
            $('.navbar').addClass('navbar-transparent');
        }
    });
});

let formControl = document.querySelectorAll('.form-control');
let inputGroup = document.querySelectorAll('.input-group');

for(let i=0; i<formControl.length; i++){
    formControl[i].addEventListener('click', function(){
        for(let j=0; j<inputGroup.length; j++)
            inputGroup[j].classList.remove('input-group-focus');
        inputGroup[i].classList.add('input-group-focus');
    })
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})