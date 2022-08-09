{include file="template/intro.tpl"}

<h1>Bienvenido a seccion Limpieza</h1>
{literal}

    <div class="container-fluid">
        <section id="vue_productos_limpieza">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <th>
                        <h2>Nombre</h2>
                    </th>
                    <th>
                        <h2>Descripcion</h2>
                    </th>
                    <th>
                        <h2>precio</h2>
                    </th>
                <tbody>
                    <tr v-for="producto in productos">
                        <td class="border-top">{{producto.nombre}}</td>
                        <td class="border-top">{{producto.descripcion}}</td>
                        <td class="border-top">{{producto.precio}}</td>
                        <td class="border-top"><a :data_id="producto.id" :nombre="producto.nombre"
                                :descripcion="producto.descripcion" :precio="producto.precio" v-on:click="editar"
                                href="#">Editar</a></td>
                        <td class="border-top"><a :data_id="producto.id" v-on:click="borrar" href="#">Eliminar</a></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    <div id="productos_para_editar">
    <h2>Estos son los productos a editar = </h2>
     <form id="form_datos_para_editar">
        <input type="text" name="nombre" v-model="nombre"/>
        <input type="text" name="descripcion" v-model="descripcion"/>
        <input type="number" name="precio" v-model="precio"/>
        <input type="hidden" name="id" v-model="id"/>
        <input type="submit">
     </form>
    </div>
    <script src="js/limpieza.js"></script>
{/literal}
{include file="template/footer.tpl"}