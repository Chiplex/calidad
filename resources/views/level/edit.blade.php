@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Niveles
        @slot('help') Niveles que evaluarán el atributo @endslot
        @slot('icon') ik ik-bar-chart bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <form class="forms-sample" method="POST" action="/level/{{$level->id}}">
                    @method('put')
                    @csrf
                    <div class="form-group row">
                        <label for="positions" class="col-sm-3 col-form-label">Posición</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="position" placeholder="Ingresa una posición" name="positions" value="{{$level->positions}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection