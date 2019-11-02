@extends('layouts.admin')
@section('page-header-title')
    @component('layouts.components.page-header-title')
        NIveles
        @slot('help') {{ $levels->total() }} Niveles que evaluarán el atributo  @endslot
        @slot('icon') ik ik-bar-chart bg-blue @endslot
    @endcomponent
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card-grid-container">
            @foreach ($levels as $level)
            <div class="card">
                <div class="card-body mr-0">
                    <h5 class="card-title">{{ $level->positions }}</h5>
                    <form action="/level/{{ $level->id }}" method="post">
                        @method('delete')
                        @csrf
                        <a href="/level/{{ $level->id }}"><i class="ik ik-eye text-blue"></i></a>
                        @can('update', $level)
                        <a href="/level/{{ $level->id }}/edit">
                            <i class="ik ik-edit-2 text-green"></i>
                        </a>
                        @endcan
                        <input type="hidden" name="level" value="{{ $level->id }}">
                        <button type="submit" class="btn btn-link btn-rounded" style="vertical-align: inherit"><i class="ik ik-trash-2 text-red"></i></button>
                    </form>
                </div>
            </div>
            @endforeach            
        </div>
        <div class="card">
            <div class="card-body d-flex justify-content-center">
                {{ $levels->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

