<!DOCTYPE html>
<html>
<head>
    <title>Eventos</title>
</head>
<body>

<h2>Filtro jerárquico</h2>

<select id="area">
    <option value="">Seleccione área</option>
    @foreach($areas as $area)
        <option value="{{ $area->id_area }}">{{ $area->nombre }}</option>
    @endforeach
</select>

<select id="componente">
    <option value="">Seleccione componente</option>
</select>

<select id="linea">
    <option value="">Seleccione línea</option>
</select>

<select id="actividad">
    <option value="">Seleccione actividad</option>
</select>

<script>
document.getElementById('area').addEventListener('change', function() {
    fetch('/componentes/' + this.value)
    .then(res => res.json())
    .then(data => {
        let comp = document.getElementById('componente');
        comp.innerHTML = '<option>Seleccione</option>';
        data.forEach(c => {
            comp.innerHTML += `<option value="${c.id_componente}">${c.nombre}</option>`;
        });
    });
});

document.getElementById('componente').addEventListener('change', function() {
    fetch('/lineas/' + this.value)
    .then(res => res.json())
    .then(data => {
        let lin = document.getElementById('linea');
        lin.innerHTML = '<option>Seleccione</option>';
        data.forEach(l => {
            lin.innerHTML += `<option value="${l.id_linea}">${l.nombre}</option>`;
        });
    });
});

document.getElementById('linea').addEventListener('change', function() {
    fetch('/actividades/' + this.value)
    .then(res => res.json())
    .then(data => {
        let act = document.getElementById('actividad');
        act.innerHTML = '<option>Seleccione</option>';
        data.forEach(a => {
            act.innerHTML += `<option value="${a.id_actividad}">${a.nombre}</option>`;
        });
    });
});
</script>

</body>
</html>