window.addEventListener('scroll', function() {

    let images = document.querySelectorAll('.imgs');
    images.forEach(function(image) {
        let position = image.getBoundingClientRect().top;
        let screenHeight = window.innerHeight;

        if (position < screenHeight * 0.75) {
            image.classList.add('fade-in', 'active');
        }
    });

    let texts = document.querySelectorAll('.text');
    texts.forEach(function(text) {
        let position = text.getBoundingClientRect().top;
        let screenHeight = window.innerHeight;

        if (position < screenHeight * 0.75) {
            text.classList.add('fade-in', 'active');
        }
    });
});

let animacion3 = document.querySelectorAll(".text");

function mostrarDatos(){
    let scrollTop3 = document.documentElement.scrollTop;

    for(let i = 0; i < animacion3.length; i++){
        let alturaAnimacion3 = animacion3[i].offsetTop;

        if(alturaAnimacion3 -100 < scrollTop3){;
            animacion3[i].style.opacity = 1;
            animacion3[i].classList.add("fade-in");
        }
    }
} 
window.addEventListener("scroll", mostrarDatos);

