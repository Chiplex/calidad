@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Atributos
    @slot('help') {{ $attributes->total()}} Atributos que indican caracteristicas @endslot
        @slot('icon') ik ik-feather bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col">
        <form action="/attribute/search" method="post">
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
    
    <div class="col-md-12">
        <div class="card-grid-container">
            @foreach ($attributes as $attribute)
            <div class="card">
                <div class="card-header">
                    <h3>{{ $attribute->name }}</h3>
                    <div class="card-header-right">
                        <form action="attribute/{{ $attribute->id }}" method="post" class="btn-group btn-group-sm">
                            @method('DELETE')
                            @csrf
                            <a href="attribute/{{ $attribute->id }}/edit" class="btn btn-link"><i class="ik ik-edit text-green"></i></a>
                            <button type="submit" class="btn btn-link" style="vertical-align: inherit"><i class="ik ik-trash-2 text-red"></i></button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <tbody>
                            @foreach ($attribute->levels as $level)
                            <tr>
                                <td>{{ $level->positions }}</td>
                                <td class="text-right">
                                    <form action="level/drop/{{ $level->id }}/{{ $attribute->id }}" method="post" class="btn-group btn-group-sm mb-5">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="level_id" value="">
                                        <a href="level/{{ $level->id }}/edit" class="btn btn-link"><i class="ik ik-edit text-green"></i></a>
                                        <button type="submit" class="btn btn-link"><i class="ik ik-trash-2 text-red"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-body float-right">
                    <span class="">Total niveles: {{ $attribute->levels_count }}</span>
                </div>
                <div class="card-footer">
                    <a href="attribute/writedown/{{ $attribute->id }}" class="btn btn-primary btn-block"><i class="ik ik-plus"></i> Nuevo Nivel</a>
                </div>
            </div>
            @endforeach
            <div class="card text-white bg-primary ">
                <div class="card-body d-flex align-items-center">
                    <a href="attribute/create" class="btn btn-primary btn-block"><i class="ik ik-plus"></i> Nuevo Atributo</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{ $attributes->links() }}
            </div>
        </div>
    </div>

@endsection

    
