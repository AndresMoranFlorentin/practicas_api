"use strict";

let aerolineas_vue = new Vue({
    el: "#lista_de_vuelos",
    data: {
        nada: false,
        vuelos: []
    }
})
let ciudades_vue = new Vue({
    el: "#lista_de_ciudades",
    data: {
        vacio: false,
        ciudades: []
    }
})

function traer_vuelo(e) {

    e.preventDefault();

    let data = {
        nro: document.querySelector("select[name=nro_vuelo]").value
    }

    fetch("api/vuelo/" + data.nro)
        .then(response => {
            return response.json()
            //console.log(response);
        })
        .then(vuelo => {
            aerolineas_vue.nada = true;
            aerolineas_vue.vuelos = vuelo;

            console.log(vuelo);
        })
        .catch(error => console.log(error));
}
function traer_ciudades(e) {
    e.preventDefault();

    fetch("api/ciudad/ciudades").then(response => {
        return response.json()
    }).then(ciudades => {
        ciudades_vue.vacio = true;
        ciudades_vue.ciudades = ciudades;
    })
        .catch(error => console.log(error));
}

function agregar_vuelo(e) {
    e.preventDefault();

    let cuerpo = {
        nro: document.querySelector("input[name=nro]").value,
        fecha: document.querySelector("input[name=fecha]").value,
        estado: document.querySelector("input[name=estado]").value,
        origen: document.querySelector("select[name=nro_vuelo_ori]").value,
        destino: document.querySelector("select[name=nro_vuelo_dest]").value
    }

    console.log("nro= ", cuerpo.nro);
    console.log("fecha= ", cuerpo.fecha);
    console.log("estado= ", cuerpo.estado);  
    console.log("origen= ", cuerpo.origen);
    console.log("destino= ", cuerpo.destino);

    fetch("api/vuelo", {
        method:"POST",
        headers: { "Content-Type":"application/json"},
        body: JSON.stringify(cuerpo),
    })
        .then(response => {
            console.log(response);
        })
        .catch((error) => console.log(error));
    }
    
document.getElementById("detalle_vuelo").addEventListener("submit", (e) => traer_vuelo(e));

    document.getElementById("ver_las_ciudades").addEventListener("click", (e) => traer_ciudades(e));

    document.getElementById("agregar_vuelo").addEventListener("submit", (e) => agregar_vuelo(e));

