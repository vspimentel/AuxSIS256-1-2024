//var nombre = prompt("Ingrese su nombre");
//var cu = prompt("Ingrese su CU");

//mensaje.innerHTML = `Nombre: ${nombre} - CU: ${cu}`;

function cargarMenu() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `menu.html`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      menu.innerHTML = ajax.responseText;
    }
  };
  ajax.send();
}

function pregunta2() {
  fetch("galeria.php")
    .then((response) => response.text())
    .then((data) => {
      menu.innerHTML = data;
      agregarFuncionesLibros();
    });
}

function agregarFuncionesLibros() {
  let botones = menu.querySelectorAll(".imagen");
  botones.forEach((boton) => {
    boton.addEventListener("click", function () {
      let fullSrc = boton.querySelector("img").src;
      let src = fullSrc.split("/").pop();
      principal.innerHTML = `<img src="${fullSrc}" alt="imagen" />`;
      mensaje.innerHTML = src;
    });
  });
}

function pregunta3() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `login.html`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      principal.innerHTML = ajax.responseText;
    }
  };
  ajax.send();
}

function login() {
  let form = document.getElementById("loginForm");
  let data = new FormData(form);
  let container = document.querySelector(".container");
  fetch("autenticar.php", { method: "POST", body: data })
    .then((response) => response.text())
    .then((data) => {
      if (data == "Usuario no autenticado") {
        mensaje.innerHTML = data;
      } else {
        //const containerText = container.innerHTML;
        //container.innerHTML = data;
        //container.innerHTML += containerText;
        let header = document.createElement("div");
        header.classList.add("header");
        header.innerHTML = data;
        container.insertBefore(header, container.firstChild);
      }
    });
}

function pregunta4() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `listar.php`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      principal.innerHTML = ajax.responseText;
    }
  };
  ajax.send();
}
