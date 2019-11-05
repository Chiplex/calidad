@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Niveles
        @slot('help') Niveles que evaluarán el atributo @endslot
        @slot('icon') ik ik-bar-chart bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<agregado-component></agregado-component>
<addlevelmodal-component></addlevelmodal-component>
@endsection