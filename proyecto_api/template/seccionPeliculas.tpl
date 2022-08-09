{include file="template/intro.tpl"}
<h1>Hola Mundo</h1>
<br><br>
<h2>Presentando el listado de peliculas que se encontraron en wikipedia =</h2>

<h2>de las ultimas peliculas hasta la <form ><button>15</button></form></h2>

{literal}

    <div>
        <section id="seccion_Peliculas">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <th>
                        <h2>Titulo</h2>
                    </th>
                    <th>
                        <h2>Genero</h2>
                    </th>
                    <th>
                        <h2>Estudio</h2>
                    </th>
                    <th>
                        <h2>Audiencia</h2>
                    </th>
                    <th>
                        <h2>Rentabilidad</h2>
                    </th>
                    <th>
                        <h2>Año</h2>
                    </th>
                <tbody>
                    <tr v-for="pelicula in peliculas">
                        <td class="border-top">{{ pelicula.titulo}}</td>
                        <td class="border-top">{{ pelicula.genero}}</td>
                        <td class="border-top">{{ pelicula.estudio}}</td>
                        <td class="border-top">{{ pelicula.audiencia}}</td>
                        <td>{{ pelicula.rentabilidad}}</td>
                        <td>{{ pelicula.año}}</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    <script src="js/peliculas.js"></script>
{/literal}
{include file="template/footer.tpl"}