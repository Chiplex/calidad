@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Utilidades
        @slot('help') Permite mejoras en el transporte @endslot
        @slot('icon') ik ik-box bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Utilidades</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><a href="utility/create"><i class="ik ik-plus text-primary"></i></a></li>
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
                            <td>Viajero</td>
                            <td>Tipo de viajero</td>
                            <td>Linea</td>
                            <td>Creado en</td>
                            <td>Actualizado en</td>
                            <td>Acciones</td>
                        </tr>
                        @foreach ($utilitys as $utility)
                        <tr>
                            <td>{{ $utility->id }}</td>
<td>{{ $utility->voyager->username }}</td>
<td>{{ $utility->voyager->type }}</td>
<td>{{ $utility->voyager->linea }}</td>
                            <td>{{ $utility->created_at }}</td>
                            <td>{{ $utility->updated_at }}</td>
                            <td>
                                <div class="table-actions" style="display: flex;justify-content: flex-end;">
                                    <form action="utility/{{ $utility->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="utility/{{ $utility->id }}"><i class="ik ik-eye text-blue"></i></a>
                                        <a href="utility/{{ $utility->id }}/edit"><i class="ik ik-edit text-green"></i></a>
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
