<!DOCTYPE html><html><head><title>Actividades</title></head><body>
<h2>Actividades</h2>
<a href="/actividades/create">+ Nueva Actividad</a>
@if(session('success'))<p style="color:green">{{ session('success') }}</p>@endif
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Nombre</th><th>Línea</th><th>Componente</th><th>Área</th><th>Acciones</th></tr>
  @foreach($actividades as $act)
  @php $linea = $act->lineas->first(); @endphp
  <tr>
    <td>{{ $act->id_actividad }}</td>
    <td>{{ $act->nombre }}</td>
    <td>{{ $linea->nombre ?? '-' }}</td>
    <td>{{ $linea->componente->nombre ?? '-' }}</td>
    <td>{{ $linea->componente->area->nombre ?? '-' }}</td>
    <td>
      <a href="/actividades/{{ $act->id_actividad }}/edit">Editar</a> |
      <form method="POST" action="/actividades/{{ $act->id_actividad }}" style="display:inline">
        @csrf @method('DELETE')
        <button onclick="return confirm('¿Eliminar?')">Eliminar</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
</body></html>