<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</head>

<h1> Seccion Animales</h1>
{include file="app/template/navegadorAdmin.tpl"}

<label></label>
<label></label>
<button><a action="mostrarFormAnimales" href="{$BASE_URL}mostrarFormAnimales">Agregar info a Tabla
        Animal</a></button>
<label></label>
<label></label>
<div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <th>
                <h2>Nombre</h2>
            </th>
            <th>
                <h2>Especie</h2>
            </th>
            <th>
                <h2>Descripcion</h2>
            </th>
            <th>
                <h2>Alimentacion</h2>
            </th>
            <th>
                <h2>Habitat</h2>
            </th>
            <th>
                <h2>Extinto</h2>
            </th>
            <th>
                <h2>Borrar</h2>
            </th>
            <th>
                <h2>Editar</h2>
            </th>
            {foreach $animales  item=animal}
                <tr>
                    {$id = $animal.id_animales}
                    <td class="border-top">{$animal.nombre}</td>
                    <td>{$animal.especies}</td>
                    <td class="border-top">{$animal.descripcion}</td>
                    <td>{$animal.alimentacion}</td>
                    <td>{$animal.habitat}</td>
                    {if $animal.extinto == "0"}
                        <td>No extinto</td>

                    {else}
                        <td>Extinto</td>
                    {/if}
                    <td><a action="borrar" href="{$BASE_URL}borrarAnimal/{$id}">Borrar</a></td>
                    <td><a action="editar" href="{$BASE_URL}editarAnimal/{$id}">Editar</a></td>
                    </td>

                </tr>
            {{/foreach}}
    </table>
</div>

</div>