@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Valores
        @slot('help') Agrega relaciones de niveles y atributos @endslot
        @slot('icon') ik ik-square bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="post" action="/value">
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
                            <div class="form-radio">
                                <h4 class="sub-title">Attributos</h4>
                                @error('attribute_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @foreach ($attributes as $attribute)
                                <div class="radio radiofill">
                                    <label>
                                        <input type="radio" name="attribute_id" value="{{ $attribute->id }}">
                                        <i class="helper"></i>{{ $attribute->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>                            
                        </div>
                        <div class="col">
                            <div class="form-radio">
                                <h4 class="sub-title">Niveles</h4>
                                @error('level_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                @foreach ($levels as $level)
                                <div class="radio radiofill">
                                    <label>
                                        <input type="radio" name="level_id" value="{{ $level->id }}">
                                        <i class="helper"></i>{{ $level->positions }}
                                    </label>
                                </div>
                                @endforeach                                
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
