@extends('layouts.admin')
@section('content')
<form action="/level/search" method="post">
    @csrf
    <input type="search" name="search" id="">
    <button type="submit">Buscar</button>
</form>
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
                <a href="/level/{{ $level->id }}"><i class="ik ik-eye"></i></a>
                <a href="/level/{{ $level->id }}/edit"><i class="ik ik-edit-2"></i></a>
                <form action="/level" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="level" value="{{ $level->id }}">
                    <button type="submit" class="btn btn-link"><i class="ik ik-trash-2"></i></button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</table>
@endsection

