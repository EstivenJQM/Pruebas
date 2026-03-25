<!DOCTYPE html><html><head><title>Actividades</title></head><body>
<h2>Actividades</h2>
<a href="/actividades/create">+ Nueva Actividad</a>
@if(session('success'))<p style="color:green">{{ session('success') }}</p>@endif
<table border="1" cellpadding="6">
  <tr><th>ID</th><th>Nombre</th><th>Línea(s)</th><th>Componente(s)</th><th>Área(s)</th><th>Acciones</th></tr>
  @foreach($actividades as $act)
  <tr>
    <td>{{ $act->id_actividad }}</td>
    <td>{{ $act->nombre }}</td>
    <td>
      @foreach($act->lineas as $linea)
        {{ $linea->nombre }}<br>
      @endforeach
    </td>
    <td>
      @foreach($act->lineas as $linea)
        {{ $linea->componente->nombre ?? '-' }}<br>
      @endforeach
    </td>
    <td>
      @foreach($act->lineas as $linea)
        {{ $linea->componente->area->nombre ?? '-' }}<br>
      @endforeach
    </td>
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