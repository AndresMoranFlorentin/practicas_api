{include file="template/intro.tpl"}
<h1>Aeropuerto Argentino el mejor que hay</h1>
<h2>La lista de los vuelos con su destino y esas cosas:</h2>
{foreach from = $vuelos  item=item }
    <ul>
        <li>{$item.nro_vuelo}</li>
        <li>{$item.fecha_salida}</li>

        {foreach from= $ciudades item=ciu}
            {$id=$ciu.id_ciudad}
            {if $item.ciudad_origen_id == $id}

                <li select>Ciudad origen = {$ciu.nombre}</li>

            {elseif $item.ciudad_origen_id != $id && $item.ciudad_destino_id==$id}

                <li>Ciudad destino = {$ciu.nombre}</li>

            {/if}

        {/foreach}

        <li>{$item.estado}</li>
    </ul>
{/foreach}
{include file="template/footer.tpl"}