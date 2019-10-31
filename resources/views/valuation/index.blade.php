@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Valoraciones
        @slot('help') Evaluaciones del viaje @endslot
        @slot('icon') ik ik-square bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Valoraciones</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><a href="value/create"><i class="ik ik-plus text-primary"></i></a></li>
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
            
            <div class="card-body">
                <div class="row">
                    @foreach ($valuations as $valuation)
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                {{ $valuation->utility->voyager->username }} como {{ $valuation->utility->voyager->type }} viajó en la linea {{ $valuation->utility->voyager->linea}}, ha tenido {{$valuation->value->attribute->name }} {{ $valuation->value->level->positions }} con {{ $valuation->quality->names }}
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    
