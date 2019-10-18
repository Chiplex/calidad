<html>
<body>
    <table border="">
        <tr>
            <td>#</td>
            <td>Nombre</td>
            <td>Descripción</td>
            <td>Creado en</td>
            <td>Actualizado en</td>
        </tr>
        @foreach ($attributes as $attribute)
        <tr>
            <td>{{ $attribute->id }}</td>
            <td>{{ $attribute->name }}</td>
            <td>{{ $attribute->description }}</td>
            <td>{{ $attribute->created_at }}</td>
            <td>{{ $attribute->updated_at }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>