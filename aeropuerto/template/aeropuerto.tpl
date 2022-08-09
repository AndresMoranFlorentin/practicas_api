{include file="template/intro.tpl"}
<h1>Aeropuerto Argentino el mejor que hay</h1>
<br>
<div>
    <h3>Bueno aqui tiene un extenso formulario donde podra realizar
        diferentes operaciones y especificaciones para los vuelos=</h3>
    <br>
    <div class="caja_form">
        <h3>Agregar vuelo</h3>
        <form id="agregar_vuelo">
            <label>numero de vuelo<input type="text" name="nro" /></label>
            <label>fecha de salida<input type="date" name="fecha"/></label>
            <label>estado<input type="text" name="estado" /></label>

            <label>Ciudad origen</label>
            <select name="nro_vuelo_ori">
                <option>----</option>
                {foreach from=$ciudades item=ciu}
                    <option value="{$ciu.id_ciudad}">{$ciu.nombre}</option>
                {/foreach}
            </select>
            <label>Ciudad Destino</label>
            <select name="nro_vuelo_dest">
                <option>----</option>
                {foreach from=$ciudades item=ciu}
                    <option value="{$ciu.id_ciudad}">{$ciu.nombre}</option>
                {/foreach}
            </select>
            <input type="submit" />
        </form>
    </div>
    <div class="buscar_vuelo">
        <form id="detalle_vuelo">
            <label>Numero de Vuelo:</label>
            <select name="nro_vuelo">
                {foreach from= $vuelos item=num}
                    <option value="{$num.nro_vuelo}">{$num.nro_vuelo}</option>
                {/foreach}
            </select>
            <input type="submit">
        </form>
    </div>
</div>
{literal}
    <div id="lista_de_vuelos" class="buscar_vuelo">
        <div v-if="nada == true">
            <h3>Vuelo =</h3>
            <ul v-for="item in vuelos">
                <li>{{item.nro_vuelo}}</li>
                <li>{{item.fecha_salida}}</li>
                <li>{{item.ciudad_origen_id}}</li>
                <li>{{item.ciudad_destino_id}}</li>
                <li>{{item.estado}}</li>
            </ul>
        </div>
        <div v-else>

        </div>
    </div>
    <button type="button" id="ver_las_ciudades">Ver ciudades</button>
    <div id="lista_de_ciudades">
        <div v-if="vacio == true">
            <h3>Ciudades =</h3>
            <ul v-for="item in ciudades">
                <li>{{item.nombre}}</li>
                <li>{{item.cod_postal}}</li>
            </ul>
        </div>
        <div v-else>

        </div>
    </div>

{/literal}
<script src="js/vuelos.js"></script>
{include file="template/footer.tpl"}
<!--SELECT v.*,c.* FROM vuelos v INNER JOIN ciudad c WHERE v.ciudad_origen_id=c.id_ciudad as
Ciudad_origen AN-->