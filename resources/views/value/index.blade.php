@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Valores
        @slot('help') Relaciones de niveles y atributos @endslot
        @slot('icon') ik ik-square bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Calidades</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><a href="value/create"><i class="ik ik-plus text-primary"></i></a></li>
                    </ul>
                </div>
            </div>
            
            @if ($message = Session::get('success'))
            <div class="card-body">
                <div class="alert alert-primary" role="alert">
                    {{ $message }}
                </div>
            </div>
            @endif
            
            <div class="card-body p-0 table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <td>#</td>
                            <td>Atributo</td>
                            <td>Nivel</td>
                            <td>Creado en</td>
                            <td>Actualizado en</td>
                            <td>Acciones</td>
                        </tr>
                        @foreach ($values as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->attribute_id }}</td>
                            <td>{{ $value->level_id }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>{{ $value->updated_at }}</td>
                            <td>
                                <div class="table-actions" style="display: flex;justify-content: flex-end;">
                                    
                                   
                                    <form action="value/{{ $value->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="value/{{ $value->id }}"><i class="ik ik-eye text-blue"></i></a>
                                        <a href="value/{{ $value->id }}/edit"><i class="ik ik-edit text-green"></i></a>
                                        <button type="submit" class="btn btn-link btn-rounded" style="vertical-align: inherit"><i class="ik ik-trash-2 text-red"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    
