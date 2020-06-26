@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Servicii</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('options.index', $serviceOption->service_id) }}"> Inapoi</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nume:</strong>
                {{ $serviceOption->nume_serviciu }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descriere:</strong>
                {{ $serviceOption->descriere_serviciu }}
            </div>
        </div>
    </div>
@endsection
