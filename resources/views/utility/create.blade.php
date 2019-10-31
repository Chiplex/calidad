@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Utilidades
        @slot('help') Agrega Utilidades que mejorarán el servicio @endslot
        @slot('icon') ik ik-box bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="post" action="/utility">
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
                                <label for="voyager_id">Viajeros</label>
                                <select class="form-control" name="voyager_id">
                                    <option value="">Seleccione una opción</option>
                                    @foreach ($voyagers as $voyager)
                                    <option value="{{ $voyager->id }}">{{ $voyager->username }}</option>
                                    @endforeach
                                </select>                                
                            </div>    
                            <div class="form-group">
                                <label for="ventaja">Ventaja</label>
                                <input id="ventaja" class="form-control" type="text" name="ventaja">
                            </div>
                            <div class="form-group">
                                <label for="desventaja">Desvantaja</label>
                                <input id="desventaja" class="form-control" type="text" name="desventaja">
                            </div>
                        </div>  
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Guardar</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection
