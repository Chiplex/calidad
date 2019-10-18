<html>
    <body>
        @if ($num1 > 50)
            {{ $num1 }} es mayor a 50
        @else 
            {{ $num1 }} es menor que 50
        @endif
        <br>
        @switch($num3)
            @case(100)
                {{ $num3 }}
                @break
            @case(200)
                {{ $num3 }}
                @break
            @default
                {{ $num3 }} no es ni <strong>100</strong> ni <strong>200</strong>
        @endswitch

        <br>

        {{ $num1 + $num2 }}

        <?php 
        echo 1;
        ?>

    </body>
</html>