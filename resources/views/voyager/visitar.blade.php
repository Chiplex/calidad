<html>
    <body>
        <ol>
            @foreach ($lugares as $lugar)
            @if ($loop->first)
                <li>{{ $lugar }} - origen</li>
            @endif
            <li>{{ $lugar }}</li>

            @if ($loop->last)
            <li>{{ $lugar }} - destino</li>
            @endif
            
            
            
            @endforeach
        </ol>
    </body>
</html>