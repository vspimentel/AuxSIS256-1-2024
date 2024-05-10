let inputParrafo = document.getElementById('inputParrafo')
let parrafos = document.getElementById("parrafos");

inputParrafo.addEventListener('keypress', (e) => {
    if(e.key == 'Enter'){
        let parrafo = inputParrafo.value
        inputParrafo.value = ""
        parrafos.innerHTML +=  `<p>${parrafo}</p>`
    }
})