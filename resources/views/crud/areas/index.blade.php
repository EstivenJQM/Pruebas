<!DOCTYPE html><html><head><title>Áreas</title></head><body>
<h2>Áreas</h2>
<a href="/areas/create">+ Nueva Área</a>
@if(session('success'))<p style="color:green">{{ session('success') }}</p>@endif
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Nombre</th><th>Acciones</th></tr>
  @foreach($areas as $a)
  <tr>
    <td>{{ $a->id_area }}</td>
    <td>{{ $a->nombre }}</td>
    <td>
      <a href="/areas/{{ $a->id_area }}/edit">Editar</a> |
      <form method="POST" action="/areas/{{ $a->id_area }}" style="display:inline">
        @csrf @method('DELETE')
        <button onclick="return confirm('¿Eliminar?')">Eliminar</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
</body></html>