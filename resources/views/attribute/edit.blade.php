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
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="post" action="/attribute/{{ $attribute->id }}">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" placeholder="Ingrese un nombre" name="name" value="{{ $attribute->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" id="description" placeholder="Ingrese una descripción" name="description" value="{{ $attribute->description }}">
                    </div>                   
                    <button type="submit" class="btn btn-primary mr-2">Almacenar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
