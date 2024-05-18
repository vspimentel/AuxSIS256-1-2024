function enviar() {
  let formMensaje = document.getElementById("formMensaje");
  let inputs = formMensaje.querySelectorAll(".input");
  if (confirm("¿Desea enviar el mensaje?")) {
    inputs.forEach((input) => {
      if (input.value.length <= 0) {
        let nombre = input.name;
        alert(`El campo ${nombre} está vació`);
        return;
      }
    });
    console.log("Enviado");
  }
}
