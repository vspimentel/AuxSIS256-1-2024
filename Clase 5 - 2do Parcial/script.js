let libros;

function pregunta3() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `galeria.php`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      barraLatOpciones.innerHTML = ajax.responseText;
      agregarFuncionesLibros();
    }
  };
  ajax.send();
}

function agregarFuncionesLibros() {
  libros = document.querySelectorAll(".imagen-libro");
  libros.forEach((libro) => {
    libro.addEventListener("click", (e) => {
      seleccionarLibro(e);
    });
  });
}

function seleccionarLibro(e) {
  let libro = e.target;
  libros.forEach((libro) => {
    libro.classList.remove("selected");
  });
  const id = e.target.id;
  libro.classList.add("selected");
  fetch("detalles_libro.php?id=" + id)
    .then((response) => response.text())
    .then((data) => {
      contenido.innerHTML = data;
    });
}

function pregunta4() {
  let botones = barraLatOpciones.querySelectorAll(".btn-materias");
  if (botones.length > 0) {
    botones[0].innerHTML = "Listar";
    botones[1].innerHTML = "Insertar";
  } else {
    barraLatOpciones.innerHTML = `
      <button class="btn-materias btn-opciones btn-op-secundarios">
          Listar
      </button>
      <button class="btn-materias btn-opciones btn-op-secundarios">
          Insertar
      </button>`;
  }
  agregarFuncionesBotones();
}

function agregarFuncionesBotones() {
  let botones = barraLatOpciones.querySelectorAll(".btn-materias");
  botones[0].addEventListener("click", () => {
    listarLibros();
  });
  botones[1].addEventListener("click", () => {
    formularioLibro();
  });
}

function listarLibros() {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", `listar.php`, false);
  ajax.onreadystatechange = function () {
    if (ajax.readyState == 4 && ajax.status == 200) {
      contenido.innerHTML = ajax.responseText;
    }
  };
  ajax.send();
}

function formularioLibro() {
  fetch("formulario.php")
    .then((response) => response.text())
    .then((data) => {
      contenido.innerHTML = data;
    });
}

function insertarLibro() {
  let form = document.querySelector(".insert-libro");
  let data = new FormData(form);
  fetch("insertar.php", { method: "POST", body: data })
    .then((response) => response.text())
    .then((data) => {
      listarLibros();
    });
}

function pregunta5() {
  barraLatOpciones.innerHTML = `
  <div class="selects-cal">
            <select name="mes">
              <option value="1">Enero</option>
              <option value="2">Febrero</option>
              <option value="3">Marzo</option>
              <option value="4">Abril</option>
              <option value="5">Mayo</option>
              <option value="6">Junio</option>
              <option value="7">Julio</option>
              <option value="8">Agosto</option>
              <option value="9">Septiembre</option>
              <option value="10">Octubre</option>
              <option value="11">Noviembre</option>
              <option value="12">Diciembre</option>
            </select>
            <select name="anio">
              <option value="1975">1975</option>
              <option value="1976">1976</option>
              <option value="1977">1977</option>
              <option value="1978">1978</option>
              <option value="1979">1979</option>
              <option value="1980">1980</option>
              <option value="1981">1981</option>
              <option value="1982">1982</option>
              <option value="1983">1983</option>
              <option value="1984">1984</option>
              <option value="1985">1985</option>
              <option value="1986">1986</option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
            </select>
          </div>
  `;
  let subMenu = document.querySelector("#sub-menu");
  subMenu.style.backgroundColor = "yellow";
  agregarFuncionesBotones();
}

function agregarFuncionesBotones() {
  let subMenu = document.querySelector("#sub-menu");
  let opciones = subMenu.querySelectorAll("select");
  opciones.forEach((opcion) => {
    opcion.addEventListener("change", () => {
      fetch(`calendario.php?mes=${opciones[0].value}&anio=${opciones[1].value}`)
        .then((response) => response.text())
        .then((data) => {
          contenido.innerHTML = data;
        });
    });
  });
}
