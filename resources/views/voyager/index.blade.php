@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Viajeros
        @slot('help') Listado de viajes realizados @endslot
        @slot('icon') ik ik-map bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Viajeros</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><a href="voyager/create"><i class="ik ik-plus text-primary"></i></a></li>
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
                            <td>Nombre de usuario</td>
                            <td>Tipo</td>
                            <td>Linea</td>
                            <td>Utilidades</td>
                            <td>Actualizado en</td>
                            <td>Acciones</td>
                        </tr>
                        @foreach ($voyagers as $voyager)
                        <tr>
                            <td>{{ $voyager->id }}</td>
                            <td>{{ $voyager->username }}</td>
                            <td>{{ $voyager->type }}</td>
                            <td>{{ $voyager->linea }}</td>
                            <td>{{ $voyager->utility }} </td>
                            <td>{{ $voyager->created_at }}</td>
                            <td>{{ $voyager->updated_at }}</td>
                            <td>
                                <div class="table-actions">
                                    <form action="voyager/{{ $voyager->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="voyager/{{ $voyager->id }}"><i class="ik ik-eye text-blue"></i></a>
                                        <a href="voyager/{{ $voyager->id }}/edit"><i class="ik ik-edit text-green"></i></a>
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

    
