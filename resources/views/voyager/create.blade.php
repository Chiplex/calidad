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
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="post" action="/voyager">
                    @csrf
                    @if ($errors->any())
                    <div class="card-body">
                        <div class="alert bg-danger alert-danger text-white" role="alert">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="username">Nombre de usuario</label>
                                <input class="form-control" type="text" name="username">
                            </div>
                            @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-radio">
                                <h4 class="sub-title">Tipo de viajero</h4>
                                <div class="radio radiofill radio-inline">
                                    <label>
                                        <input type="radio" name="type" value="chofer"> <i class="helper"></i>Chofer
                                    </label>
                                </div>
                                <div class="radio radiofill radio-inline">
                                    <label>
                                        <input type="radio" name="type" value="pasajero"> <i class="helper"></i>Pasajero
                                    </label>
                                </div>
                            </div>
                            @error('type')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="linea">Linea</label>
                                <input class="form-control" type="text" name="linea">
                            </div>
                            @error('linea')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection
