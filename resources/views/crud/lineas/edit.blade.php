<!DOCTYPE html><html><head><title>Editar Línea</title></head><body>
<h2>Editar Línea</h2>
<form method="POST" action="/lineas/{{ $linea->id_linea }}">
  @csrf @method('PUT')
  <label>Nombre: <input type="text" name="nombre" value="{{ $linea->nombre }}" required></label><br><br>

  <label>Área:
    <select id="sel_area" onchange="cargarComponentes(this.value)">
      <option value="">Seleccione</option>
      @foreach($areas as $a)
        <option value="{{ $a->id_area }}"
          {{ $a->id_area == $linea->componente->id_area ? 'selected' : '' }}>
          {{ $a->nombre }}
        </option>
      @endforeach
    </select>
  </label><br><br>

  <label>Componente:
    <select id="sel_componente" name="id_componente" required>
      @foreach($componentes as $c)
        <option value="{{ $c->id_componente }}"
          {{ $c->id_componente == $linea->id_componente ? 'selected' : '' }}>
          {{ $c->nombre }}
        </option>
      @endforeach
    </select>
  </label><br><br>

  <button type="submit">Actualizar</button>
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