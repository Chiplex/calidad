@extends('layouts.admin')

@section('page-header-title')
    @component('layouts.components.page-header-title')
        Calidad
        @slot('help') Calidad son referente a la forma final de la trasportación @endslot
        @slot('icon') ik ik-check-circle bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Calidades</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><a href="quality/create"><i class="ik ik-plus text-primary"></i></a></li>
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
                            <td>Creado en</td>
                            <td>Actualizado en</td>
                            <td>Acciones</td>
                        </tr>
                        @foreach ($qualitys as $quality)
                        <tr>
                            <td>{{ $quality->id }}</td>
                            <td>{{ $quality->names }}</td>
                            <td>{{ $quality->created_at }}</td>
                            <td>{{ $quality->updated_at }}</td>
                            <td>
                                <div class="table-actions" style="display: flex;justify-content: flex-end;">
                                    
                                    @if ($quality->deleted_at)
                                    <form action="quality/{{ $quality->id }}/restore" method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="quality" value="{{ $quality->id}}">
                                        <a href="quality/{{ $quality->id }}"><i class="ik ik-eye text-blue"></i></a>
                                        <a href="quality/{{ $quality->id }}/edit"><i class="ik ik-edit text-green"></i></a>                                        
                                        <button type="submit" class="btn btn-link btn-rounded" style="vertical-align: inherit"><i class="ik ik-arrow-up text-warning"></i></button>
                                    </form>
                                    <form action="quality/{{ $quality->id }}/destroy" method="post">
                                        @csrf
                                        <input type="hidden" name="quality" value="{{ $quality->id}}">
                                        <button type="submit" class="btn btn-link btn-rounded" style="vertical-align: inherit"><i class="ik ik-x text-default"></i></button>
                                    </form>
                                    @else
                                    <form action="quality/{{ $quality->id }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="quality/{{ $quality->id }}"><i class="ik ik-eye text-blue"></i></a>
                                        <a href="quality/{{ $quality->id }}/edit"><i class="ik ik-edit text-green"></i></a>
                                        <button type="submit" class="btn btn-link btn-rounded" style="vertical-align: inherit"><i class="ik ik-trash-2 text-red"></i></button>
                                    </form>
                                    @endif
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

    
