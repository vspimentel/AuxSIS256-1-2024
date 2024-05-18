class Estudiante {
  constructor(nombres, edad, calificacion) {
    this.nombres = nombres;
    this.edad = edad;
    this.calificacion = calificacion;
  }
}

class Calificacion {
  constructor(materia, nota) {
    this.nota = nota;
    this.materia = materia;
  }
}

var estudiantes = [];

estudiantes.push(
  new Estudiante("Juan Perez", 25, new Calificacion("SIS-256", 83))
);
estudiantes.push(
  new Estudiante("Ricardo Luna", 30, new Calificacion("SIS-258 ", 70))
);
estudiantes.push(
  new Estudiante("Teresa Tomasa", 26, new Calificacion("SIS-256", 84))
);
estudiantes.push(
  new Estudiante("Favian Umbre", 24, new Calificacion("SIS-258", 70))
);

let tabla = document.getElementById("tabla");

estudiantes.forEach((estudiante, i) => {
  let fila;
  if (i % 2 != 0) {
    fila = `<tr id="${i + 1}" style="background-color:gray">
        <td>${i + 1}</td>
        <td>${estudiante.nombres}</td>
        <td>${estudiante.edad}</td>
        <td>${estudiante.calificacion.materia}</td>
        <td>${estudiante.calificacion.nota}</td>
    </tr>`;
  } else {
    fila = `<tr id="${i + 1}">
        <td>${i + 1}</td>
        <td>${estudiante.nombres}</td>
        <td>${estudiante.edad}</td>
        <td>${estudiante.calificacion.materia}</td>
        <td>${estudiante.calificacion.nota}</td>
    </tr>`;
  }
  tabla.innerHTML += fila;
});

function agregarEstudiante() {
  var estudiante = new Estudiante(
    nombres.value,
    edad.value,
    new Calificacion(materia.value, parseInt(nota.value))
  );
  estudiantes.push(estudiante);
  let fila;
  if ((estudiantes.length - 1) % 2 != 0) {
    fila = `<tr id="${estudiantes.length}" style="background-color:gray">
        <td>${estudiantes.length}</td>
        <td>${estudiante.nombres}</td>
        <td>${estudiante.edad}</td>
        <td>${estudiante.calificacion.materia}</td>
        <td>${estudiante.calificacion.nota}</td> 
    </tr>`;
  } else {
    fila = `<tr id="${estudiantes.length}">
        <td>${estudiantes.length}</td>
        <td>${estudiante.nombres}</td>
        <td>${estudiante.edad}</td>
        <td>${estudiante.calificacion.materia}</td>
        <td>${estudiante.calificacion.nota}</td> 
    </tr>`;
  }
  tabla.innerHTML += fila;
}

function encontrarMejorEstudiante() {
  var mejorNota = 0;
  var mejorEstudiante = 0;
  estudiantes.forEach((estudiante, i) => {
    if (estudiante.calificacion.nota > mejorNota) {
      mejorNota = estudiante.calificacion.nota;
      mejorEstudiante = i + 1;
    }
  });
  let filas = document.querySelectorAll("tr");
  filas.forEach((fila) => {
    fila.style.backgroundColor = "white";
  });
  document.getElementById(mejorEstudiante).style.backgroundColor = "red";
}
