let tareas = document.querySelectorAll('.tarea')
let tareasDiv = document.getElementById('tareas')
let inputTarea = document.getElementById("inputTarea");

tareas.forEach((tarea) => {
    let boton = tarea.querySelector("button");
    boton.addEventListener("click", () => {
      tareasDiv.removeChild(tarea);
    });
});
    

inputTarea.addEventListener("keypress", (e) => {
  if (e.key == "Enter") {
    let tareaValue = inputTarea.value;
    inputTarea.value = "";
    let newElement = document.createElement("div")
    newElement.innerHTML = `<div class="tarea">
        <div>${tareaValue}</div>
        <button>Borrar</button>
    </div>`;
    tareasDiv.appendChild(newElement)
    let boton = newElement.querySelector("button");
    boton.addEventListener("click", () => {
      tareasDiv.removeChild(newElement);
    });
  }
});