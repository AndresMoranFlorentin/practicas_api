"use strict";

let form_editar = new Vue({
    el: "#productos_para_editar",
    data: {
        nombre: "",
        descripcion: "",
        precio: "",
        id: ""
    }
});
let productos_de_limpieza = new Vue({
    el: "#vue_productos_limpieza",
    data: {
        productos: []
    },
    methods: {
        editar: function (event) {
            event.preventDefault();
            if (event) {
                // console.log(event.target.attributes.data_id.value)
                let id = event.target.attributes.data_id.value;
                let nombre = event.target.attributes.nombre.value;
                let descripcion = event.target.attributes.descripcion.value;
                let precio = event.target.attributes.precio.value;
                Editar(id, nombre, descripcion, precio);
            }
        },
        borrar: function (event) {
            event.preventDefault();
            if (event) {
                // console.log(event.target.attributes.data_id.value)
                Borrar(event.target.attributes.data_id.value);
                console.log("aqui se muestra el id del boton borrar: ");
                console.log(event.target.attributes.data_id.value);
            }
        }
    }
});

/**borrar: function (event) {
            event.preventDefault();
            if (event) {
                // console.log(event.target.attributes.data_id.value)
                borrarComentario(event.target.attributes.data_id.value);
                console.log("aqui se muestra el id del boton borrar: ");
                console.log(event.target.attributes.data_id.value);
            }
        } */

function traer_Productos() {
    fetch("api/limpieza")
        .then(response => {
            return response.json()
            //console.log(response);
        })
        .then(producto => {

            productos_de_limpieza.productos = producto;
            console.log(producto);
        })
        .catch(error => console.log(error));
}


traer_Productos();

function Borrar(id) {
    fetch("api/limpieza/" + id, {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
        // body: JSON.stringify(data)

    })
        .then(response => {
            return response.json()
        })
        .then(respuesta => {
            alert(respuesta);
            traer_Productos();
        })
        .catch(error => console.log(error));

}
document.getElementById("form_datos_para_editar").addEventListener("submit", (e) => Actualizar(e));

function Actualizar(e) {

    e.preventDefault();


    let datos = ({
        nombre: document.querySelector("input[name=nombre]").value,
        descripcion: document.querySelector("input[name=descripcion]").value,
        precio: document.querySelector("input[name=precio]").value,
        id: document.querySelector("input[name=id]").value,
    });

    fetch("api/limpieza/" + datos.id, {
        method: 'PUT', // Method itself
        headers: { "Content-Type": "application/json" },// Indicates the content 
        body: JSON.stringify(datos) // We send data in JSON format
    })
        .then(response => {

            console.log(response);

            return response.json();

        })
        .then(response => {
            console.log("se actualizo con exito!!!");
            traer_Productos();
           
        })
        .catch(error => console.log(error));


}

function Editar(id, nombre, descripcion, precio) {

    form_editar.nombre = nombre;
    form_editar.descripcion = descripcion;
    form_editar.precio = precio;
    form_editar.id = id;


    console.log("se llego a ver en los inputs???");



    Actualizar(event);

}


/**function Editar(id, nombre, descripcion, precio) {

      

    let data = {
        nombre: nombre,
        descripcion:descripcion,
        precio: precio
    };

    console.log(data);

    fetch("api/limpieza/" + id, {
        method: 'PUT', // Method itself
        headers: {
            'Content-type': 'application/json; charset=UTF-8' // Indicates the content 
        },
        body: JSON.stringify(data) // We send data in JSON format
    })
        .then(response => {
            return response.json()
        })
        .then(respuesta => {
            alert(respuesta);
            traer_Productos();
        })
        .catch(error => console.log(error));

}
 */
