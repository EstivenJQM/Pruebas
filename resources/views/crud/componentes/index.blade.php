<!DOCTYPE html><html><head><title>Componentes</title></head><body>
<h2>Componentes</h2>
<a href="/componentes/create">+ Nuevo Componente</a>
@if(session('success'))<p style="color:green">{{ session('success') }}</p>@endif
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Nombre</th><th>Área</th><th>Acciones</th></tr>
  @foreach($componentes as $c)
  <tr>
    <td>{{ $c->id_componente }}</td>
    <td>{{ $c->nombre }}</td>
    <td>{{ $c->area->nombre ?? '-' }}</td>
    <td>
      <a href="/componentes/{{ $c->id_componente }}/edit">Editar</a> |
      <form method="POST" action="/componentes/{{ $c->id_componente }}" style="display:inline">
        @csrf @method('DELETE')
        <button onclick="return confirm('¿Eliminar?')">Eliminar</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
</body></html>