"use strict";


let tabla_objetos = new Vue({
    el: "#lista_objetos",
    data: {
        objetos: [] 
    }
});

function getObjetos() {
    fetch("api/home")
    .then(
        response => { 
            return response.json()
            //console.log(response);
        })
    .then(objeto => {
        tabla_objetos.objetos = objeto; 
       //  console.log(objeto);
    })
    .catch(error => alert(error));
}


getObjetos();