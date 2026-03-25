<!DOCTYPE html><html><head><title>Nueva Línea</title></head><body>
<h2>Nueva Línea</h2>
<form method="POST" action="/lineas">
  @csrf
  <label>Nombre: <input type="text" name="nombre" required></label><br><br>

  <label>Área:
    <select id="sel_area" onchange="cargarComponentes(this.value)">
      <option value="">Seleccione</option>
      @foreach($areas as $a)
        <option value="{{ $a->id_area }}">{{ $a->nombre }}</option>
      @endforeach
    </select>
  </label><br><br>

  <label>Componente:
    <select id="sel_componente" name="id_componente" required>
      <option value="">Seleccione área primero</option>
    </select>
  </label><br><br>

  <button type="submit">Guardar</button>
  <a href="/lineas">Cancelar</a>
</form>

<script>
function cargarComponentes(id_area) {
    if (!id_area) return;
    fetch('/api/componentes/' + id_area)
    .then(r => r.json())
    .then(data => {
        let sel = document.getElementById('sel_componente');
        sel.innerHTML = '<option value="">Seleccione</option>';
        data.forEach(c => {
            sel.innerHTML += `<option value="${c.id_componente}">${c.nombre}</option>`;
        });
    });
}
</script>
</body></html>