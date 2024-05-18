function anadirLista() {
  var palabras = texto.value.split(" ");
  var tieneDe = palabras.includes("de");
  var elemento;
  if (tieneDe) {
    elemento = `<li style="background-color: yellow; width:fit-content">${texto.value}</li>`;
  } else {
    elemento = `<li style="width:fit-content">${texto.value}</li>`;
  }
  lista.innerHTML += elemento;
  texto.value = "";
}
