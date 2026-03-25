<!DOCTYPE html><html><head><title>Líneas</title></head><body>
<h2>Líneas</h2>
<a href="/lineas/create">+ Nueva Línea</a>
@if(session('success'))<p style="color:green">{{ session('success') }}</p>@endif
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Nombre</th><th>Componente</th><th>Área</th><th>Acciones</th></tr>
  @foreach($lineas as $l)
  <tr>
    <td>{{ $l->id_linea }}</td>
    <td>{{ $l->nombre }}</td>
    <td>{{ $l->componente->nombre ?? '-' }}</td>
    <td>{{ $l->componente->area->nombre ?? '-' }}</td>
    <td>
      <a href="/lineas/{{ $l->id_linea }}/edit">Editar</a> |
      <form method="POST" action="/lineas/{{ $l->id_linea }}" style="display:inline">
        @csrf @method('DELETE')
        <button onclick="return confirm('¿Eliminar?')">Eliminar</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
</body></html>