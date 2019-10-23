@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="POST" action="/level">
                    @csrf
                    <div class="form-group row">
                        <label for="positions" class="col-sm-3 col-form-label">Posición</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="position" placeholder="Username" name="positions">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lugar" class="col-sm-3 col-form-label">Lugar</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="position" placeholder="Username" name="lugar">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiempo" class="col-sm-3 col-form-label">Tiempo</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="position" placeholder="Username" name="tiempo">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection