{include file="template/intro.tpl"}

{literal}
  <section>
    <form id="suma_y_multiplicacion" action="GET">
      <select name="tipo_operacion">
        <option value="suma">SUMA</option>
        <option value="multiplicacion">MULTIPLICACION</option>
        <option value="division">DIVISION</option>
        <option value="porcentaje">PORCENTAJE</option>
      </select>
      <input type="number" name="numeroX" required>
      <input type="number" name="numeroY" required>

      <input type="submit">
    </form>
    <div id="resultados_vue">
      <h2>El resultado es....{{resultados}}</h2>
      <br>
      <h3></h3>
    </div>
  </section>
  <section id="lista_objetos">
    <table>
      <thead class="thead-dark">
        <th>
          <h2>Id</h2>
        </th>
        <th>
          <h2>Nombre</h2>
        </th>
      <tbody>
        <tr v-for="objeto in objetos">
          <td class="border-top">{{objeto.id}}</td>
          <td>{{objeto.tipo_de_objeto}}</td>
        </tr>
      </tbody>
    </table>
  </section>
  <script src="js/objetos.js"></script>
  <script src="js/operaciones.js"></script>
{/literal}
</main>
<div>
  <button>
    <a href="{$BASE_URL}Ir_seccion_limpieza">IR a seccion Limpieza</a>
  </button>
  <a href="{$BASE_URL}Ir_seccion_Peliculas">IR a seccion Peliculas</a>
  <button>
    <a href="{$BASE_URL}Ir_seccion_aeropuertos">IR a seccion del Aeropuerto</a>
  </button>
</div>
{include file="template/footer.tpl"}