<!DOCTYPE html><html><head><title>Editar Actividad</title></head><body>
<h2>Editar Actividad</h2>
<form method="POST" action="/actividades/{{ $actividad->id_actividad }}">
  @csrf @method('PUT')
  <label>Nombre: <input type="text" name="nombre" value="{{ $actividad->nombre }}" required></label><br><br>

  <label>Área:
    <select id="sel_area" onchange="cargarComponentes(this.value)">
      <option value="">Seleccione</option>
      @foreach($areas as $a)
        <option value="{{ $a->id_area }}"
          {{ $linea_actual && $linea_actual->componente->id_area == $a->id_area ? 'selected' : '' }}>
          {{ $a->nombre }}
        </option>
      @endforeach
    </select>
  </label><br><br>

  <label>Componente:
    <select id="sel_componente" onchange="cargarLineas(this.value)">
      <option value="">Seleccione</option>
      @foreach($componentes as $c)
        <option value="{{ $c->id_componente }}"
          {{ $linea_actual && $linea_actual->id_componente == $c->id_componente ? 'selected' : '' }}>
          {{ $c->nombre }}
        </option>
      @endforeach
    </select>
  </label><br><br>

  <label>Línea:
    <select id="sel_linea" name="id_linea" required>
      @foreach($lineas as $l)
        <option value="{{ $l->id_linea }}"
          {{ $linea_actual && $linea_actual->id_linea == $l->id_linea ? 'selected' : '' }}>
          {{ $l->nombre }}
        </option>
      @endforeach
    </select>
  </label><br><br>

  <button type="submit">Actualizar</button>
  <a href="/actividades">Cancelar</a>
</form>

<script>
function cargarComponentes(id_area) {
    fetch('/api/componentes/' + id_area)
    .then(r => r.json())
    .then(data => {
        let sel = document.getElementById('sel_componente');
        sel.innerHTML = '<option value="">Seleccione</option>';
        document.getElementById('sel_linea').innerHTML = '<option>Seleccione componente primero</option>';
        data.forEach(c => {
            sel.innerHTML += `<option value="${c.id_componente}">${c.nombre}</option>`;
        });
    });
}
function cargarLineas(id_componente) {
    fetch('/api/lineas/' + id_componente)
    .then(r => r.json())
    .then(data => {
        let sel = document.getElementById('sel_linea');
        sel.innerHTML = '<option value="">Seleccione</option>';
        data.forEach(l => {
            sel.innerHTML += `<option value="${l.id_linea}">${l.nombre}</option>`;
        });
    });
}
</script>
</body></html>