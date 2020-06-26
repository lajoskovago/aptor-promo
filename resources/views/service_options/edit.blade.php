@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit service</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('options.index', $serviceOption->service_id) }}"> Inapoi</a>
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

<form action="{{ route('options.update', $serviceOption->id) }}" method="POST">
@csrf
@method('PUT')

<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>Nume:</strong>
           <input type="text" name="nume_serviciu" class="form-control" placeholder="Nume" value="{{ $serviceOption->nume_serviciu }}">
       </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>Descriere:</strong>
           <input type="text" name="descriere_serviciu" class="form-control" placeholder="Descriere" value="{{ $serviceOption->descriere_serviciu }}">
       </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12 text-center">
           <button type="submit" class="btn btn-primary">Actualizare</button>
   </div>
</div>
</form>
@endsection
