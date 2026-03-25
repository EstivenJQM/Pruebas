<!DOCTYPE html><html><head><title>Editar Área</title></head><body>
<h2>Editar Área</h2>
<form method="POST" action="/areas/{{ $area->id_area }}">
  @csrf @method('PUT')
  <label>Nombre: <input type="text" name="nombre" value="{{ $area->nombre }}" required></label><br><br>
  <button type="submit">Actualizar</button>
  <a href="/areas">Cancelar</a>
</form>
</body></html>