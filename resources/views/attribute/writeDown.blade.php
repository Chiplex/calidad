@extends('layouts.admin')
@section('page-header-title')
    @component('layouts.components.page-header-title')
        Atributos
        @slot('help')
            Incluye niveles en el atributo {{ $attribute->name }}
        @endslot
        @slot('icon') ik ik-feather bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample form-inline" method="post" action="/attribute/insert/{{ $attribute->id }}" id="insert" class="">
                    @csrf                    
                    <input type="text" class="form-control mr-2" placeholder="Busca o crea una posicion" name="positions" required>
                    <button type="submit" class="btn btn-primary mr-2" form="insert">Insertar</button>
                </form>
            </div>
            <form action="/attribute/include/{{ $attribute->id }}" method="post" id="include">
                @csrf
                <div class="table-responsive table-bordered">
                    <table class="table table-hover mb-0">
                        @foreach ($levels as $level)
                            @if ( !$attribute->levels->contains($level->id))
                            <tr>
                                <td><input type="checkbox" name="level[]" value="{{ $level->id }}"></td>
                                <td>{{ $level->positions }}</td>
                            </tr>    
                            @endif
                        @endforeach
                    </table>
                </div>
            </form>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2" form="include">Incluir</button>
            </div>
        </div>
    </div>
</div>
@endsection
