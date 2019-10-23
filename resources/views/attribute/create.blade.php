@extends('layouts.admin')
@section('content')
@component('layouts.components.page-header-title')
    Atributos
    @slot('help')
        Coloca que atributos son los que se deben calificar durante el viaje
    @endslot
@endcomponent
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="post" action="/attribute?a=1">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" placeholder="Ingrese un nombre" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" id="description" placeholder="Ingrese una descripción" name="description">
                    </div>                   
                    <button type="submit" class="btn btn-primary mr-2">Almacenar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
