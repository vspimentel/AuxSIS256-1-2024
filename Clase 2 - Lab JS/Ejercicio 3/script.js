function reducir() {
  var widthActual = parseInt(imagen.style.width);
  widthActual -= parseInt(pxs.value);
  imagen.style.width = `${widthActual}px`;
}

function aumentar() {
  var widthActual = parseInt(imagen.style.width);
  widthActual += parseInt(pxs.value);
  imagen.style.width = `${widthActual}px`;
}
