<!DOCTYPE html><html><head><title>Editar Componente</title></head><body>
<h2>Editar Componente</h2>
<form method="POST" action="/componentes/{{ $componente->id_componente }}">
  @csrf @method('PUT')
  <label>Nombre: <input type="text" name="nombre" value="{{ $componente->nombre }}" required></label><br><br>
  <label>Área:
    <select name="id_area" required>
      @foreach($areas as $a)
        <option value="{{ $a->id_area }}" {{ $a->id_area == $componente->id_area ? 'selected' : '' }}>
          {{ $a->nombre }}
        </option>
      @endforeach
    </select>
  </label><br><br>
  <button type="submit">Actualizar</button>
  <a href="/componentes">Cancelar</a>
</form>
</body></html>