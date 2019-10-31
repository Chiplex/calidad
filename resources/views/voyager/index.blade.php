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
    <div class="col">
        <form action="/voyager/search" method="post">
            @csrf
            <div class="form-group">
                <input type="search" name="search" class="form-control">                
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </div>
    @if ($message = Session::get('success'))
    <div class="col-md-12">
        <div class="alert alert-primary" role="alert">
            {{ $message }}
        </div>
    </div>
    @endif

    <div class="card-columns">
        @foreach ($voyagers as $voyager)
        <div class="card">
            <div class="card-header">
                <div class="card-header-right">
                    <form action="voyager/{{ $voyager->id }}" method="post" class="btn-group btn-group-sm">
                        @method('DELETE')
                        @csrf
                        <a href="voyager/{{ $voyager->id }}/edit" class="btn btn-link"><i class="ik ik-edit text-green"></i></a>
                        <button type="submit" class="btn btn-link" style="vertical-align: inherit"><i class="ik ik-trash-2 text-red"></i></button>
                    </form>
                </div>
            </div>
            <div class="card-body mb-0">
                <dl class="row">
                    <dt class="col-sm-4">Nombre</dt>
                    <dd class="col-sm-8">{{ $voyager->username }}</dd>
                    <dt class="col-sm-4">Tipo</dt>
                    <dd class="col-sm-8">{{ $voyager->type }}</dd>
                    <dt class="col-sm-4">Linea</dt>
                    <dd class="col-sm-8">{{ $voyager->linea }}</dd>
                </dl>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0 table-bordered">
                    <tbody>
                        @foreach ($voyager->utilities as $utility)
                        <tr>
                            <td>{{ $utility->ventaja }}</td>
                            <td>{{ $utility->desventaja }}</td>
                            <td class="text-right">
                                <form action="utility/drop/{{ $utility->id }}/{{ $voyager->id }}" method="post" class="btn-group btn-group-sm mb-5">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" name="utility_id" value="">
                                    <a href="utility/{{ $utility->id }}/edit" class="btn btn-link"><i class="ik ik-edit text-green"></i></a>
                                    <button type="submit" class="btn btn-link"><i class="ik ik-trash-2 text-red"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                <a href="voyager/writedown/{{ $voyager->id }}" class="btn btn-primary btn-block"><i class="ik ik-plus"></i> Nuevo Utilidad</a>
            </div>
        </div>
        @endforeach
        <div class="card text-white bg-primary">
            <div class="card-body">
                <a href="voyager/create" class="btn btn-primary btn-block"><i class="ik ik-plus"></i> Nuevo Viajero</a>
            </div>
        </div>
    </div>
@endsection

    
