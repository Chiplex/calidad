@extends('layouts.admin')
@section('page-header-title')
    @component('layouts.components.page-header-title')
        NIveles
        @slot('help') Niveles que evaluarán el atributo  @endslot
        @slot('icon') ik ik-bar-chart bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<form action="/level/search" method="post">
    @csrf
    <input type="search" name="search" id="">
    <button type="submit">Buscar</button>
</form>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Niveles</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><a href="level/create"><i class="ik ik-plus text-primary"></i></a></li>
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
                            <td>Posición</td>
                            <td>Creado en</td>
                            <td>Actualizado en</td>
                            <td>Opciones</td>
                        </tr>
                        @foreach ($levels as $level)
                        <tr>
                            <td>{{ $level->id }}</td>
                            <td>{{ $level->positions }}</td>
                            <td>{{ $level->created_at }}</td>
                            <td>{{ $level->updated_at }}</td>
                            <td>
                                <div class="table-actions">
                                    <form action="/level/{{ $level->id }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="/level/{{ $level->id }}"><i class="ik ik-eye text-blue"></i></a>
                                        <a href="/level/{{ $level->id }}/edit"><i class="ik ik-edit-2 text-green"></i></a>
                                        <input type="hidden" name="level" value="{{ $level->id }}">
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

