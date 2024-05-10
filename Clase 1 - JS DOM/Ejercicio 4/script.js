let img = document.querySelector('img')


img.addEventListener("mouseover", () => {
    img.style.height = "200px";
});

img.addEventListener("mouseleave", () => {
    img.style.height = "150px";
});


let imagenes = ['image.jpg', 'image2.jpg', 'image3.webp']
var posicion = 0

function anterior(){
    if(posicion != 0){
        posicion--
    } else {
        posicion = 2;
    }
    img.src = `images/${imagenes[posicion]}`;
}

function siguiente(){
    if (posicion != 2) {
      posicion++;
    } else {
      posicion = 0;
    }
    img.src = `images/${imagenes[posicion]}`;
}