@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add new service</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url()->previous() }}"> Inapoi</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('options.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nume serviciu:</strong>
                <input type="text" name="nume_serviciu" class="form-control" placeholder="Nume serviciu">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descriere serviciu:</strong>
                <input type="text" name="descriere_serviciu" class="form-control" placeholder="Descriere serviciu">
            </div>
        </div>
        <input type="hidden" name="service_id" class="form-control" value={{ $serviceId }}>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Adaugare</button>
        </div>
    </div>

</form>
@endsection
