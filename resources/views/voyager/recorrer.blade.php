<html>
    <body>
        @while ($count--)
            {{ $calles[$count] }} <br>
        @endwhile

        @csrf
    </body>
</html>

