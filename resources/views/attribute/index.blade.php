@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Atributos
        @slot('help') Atributos que indican caracteristicas @endslot
        @slot('icon') ik ik-feather bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Atributos</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><a href="attribute/create"><i class="ik ik-plus text-primary"></i></a></li>
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
                            <td>Nombre</td>
                            <td>Descripción</td>
                            <td>Creado en</td>
                            <td>Actualizado en</td>
                            <td>Acciones</td>
                        </tr>
                        @foreach ($attributes as $attribute)
                        <tr>
                            <td>{{ $attribute->id }}</td>
                            <td>{{ $attribute->name }}</td>
                            <td>{{ $attribute->description }}</td>
                            <td>{{ $attribute->created_at }}</td>
                            <td>{{ $attribute->updated_at }}</td>
                            <td>
                                <div class="table-actions">
                                    <form action="attribute/{{ $attribute->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="attribute/{{ $attribute->id }}"><i class="ik ik-eye text-blue"></i></a>
                                        <a href="attribute/{{ $attribute->id }}/edit"><i class="ik ik-edit text-green"></i></a>
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

    
