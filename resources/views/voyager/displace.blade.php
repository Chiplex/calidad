<html>
    <body>
        <ul>
            @for ($i = 0; $i < $count; $i++)
            <li>{{ $data[$i] }}</li>
            @endfor
        </ul>
    </body>
</html>