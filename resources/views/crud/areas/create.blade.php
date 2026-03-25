<!DOCTYPE html><html><head><title>Nueva Área</title></head><body>
<h2>Nueva Área</h2>
<form method="POST" action="/areas">
  @csrf
  <label>Nombre: <input type="text" name="nombre" required></label><br><br>
  <button type="submit">Guardar</button>
  <a href="/areas">Cancelar</a>
</form>
</body></html>