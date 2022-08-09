"use strict";

let seccion_Peliculas =new Vue({
    el:"#seccion_Peliculas",
    data: {
        peliculas: []
    }
});

function traerlasUltimas15Peliculas(){

   fetch("api/peliculas")
   .then(response => {
    console.log(response);
    return response.json()
})
.then(peli => {

    seccion_Peliculas.peliculas = peli;
    console.log("se logro traer con exito");
})
.catch(error => console.log(error));
}

traerlasUltimas15Peliculas();