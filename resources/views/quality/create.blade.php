@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Calidad
        @slot('help') Agrega un refente final de Calidad @endslot
        @slot('icon') ik ik-check-circle bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="post" action="/quality">
                    @csrf
                    <div class="form-group row">
                        <label for="positions" class="col-sm-3 col-form-label">Calidad</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="position" placeholder="Ingresa una calidad" name="names">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection