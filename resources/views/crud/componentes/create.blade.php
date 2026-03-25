<!DOCTYPE html><html><head><title>Nuevo Componente</title></head><body>
<h2>Nuevo Componente</h2>
<form method="POST" action="/componentes">
  @csrf
  <label>Nombre: <input type="text" name="nombre" required></label><br><br>
  <label>Área:
    <select name="id_area" required>
      <option value="">Seleccione</option>
      @foreach($areas as $a)
        <option value="{{ $a->id_area }}">{{ $a->nombre }}</option>
      @endforeach
    </select>
  </label><br><br>
  <button type="submit">Guardar</button>
  <a href="/componentes">Cancelar</a>
</form>
</body></html>