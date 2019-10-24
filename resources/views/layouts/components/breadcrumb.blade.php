<div class="col-lg-4">
    <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><i class="ik ik-home"></i></a></li>
            @foreach (Route::getRoutes()->getRoutesByName() as $item)
                {{-- <li class="breadcrumb-item"><a href="#">{{$item->name}}</a></li>
                @if (Route::is($item->route->url))
                    <li class="breadcrumb-item active"><a href="#">{{$item->name}}</a></li>
                @endif --}}
            @endforeach
        </ol>
    </nav>
</div>