"use strict";

let respuesta=new Vue({

    el: "#resultados_vue",
    data: {
       
        resultados:""

    }

})
document.getElementById("suma_y_multiplicacion").addEventListener("submit", (e) => resolverOperacion(e));

function resolverOperacion(e){
    e.preventDefault();

    let dato = {
         accion:document.querySelector("select[name=tipo_operacion]").value,
         numeroX:document.querySelector("input[name=numeroX]").value,
         numeroY:document.querySelector("input[name=numeroY]").value,
    };
    
    fetch('api/operacion/' + dato.accion + '/x/' + dato.numeroX + '/y/' + dato.numeroY)
        .then(response => {
      
            return response.json();
         
         })
        
         .then(resultado=> {
           
             respuesta.resultados = resultado;
             console.log(resultado);
         })
         .catch(error => console.log(error));
}
