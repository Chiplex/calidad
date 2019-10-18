<html>
<body>
    <form action="/attribute" method="post">
        @csrf
        <label for="name">Nombre</label>
        <input type="text" name="name" id="">
        <br>
        <label for="description">Descripción</label>
        <input type="text" name="description" id="">
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>