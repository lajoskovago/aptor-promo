@extends('layouts/app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Detalii turist</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tourists.index', 0) }}"> Lista turisti</a>
                <a class="btn btn-success" href="{{ route('services.used', $tourist->id) }}"> Locatii Folosire Cod</a>
                <a class="btn btn-success" href="{{ route('options.used', $tourist->id) }}"> Servicii Folosite</a>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ url()->previous() }}"> Inapoi</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $tourist->nume }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prenume</strong>
                {{ $tourist->prenume }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                {{ $tourist->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefon</strong>
                {{ $tourist->telefon }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hotel</strong>
                {{ $tourist->hotel }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data checkin:</strong>
                {{ $tourist->checkin_date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data checkout:</strong>
                {{ $tourist->checkout_date }}
            </div>
        </div>
        @if($tourist->checkout_timestamp)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Momentul checkoutului:</strong>
                {{ $tourist->checkout_timestamp }}
            </div>
        </div>
        @endif
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Oras</strong>
                {{ $tourist->oras }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tara</strong>
                {{ $tourist->tara }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Transport</strong>
                {{ $tourist->transport }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Scop</strong>
                {{ $tourist->scop }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Voucher</strong>
                {{ $tourist->voucher }}
            </div>
        </div>
    </div>
@endsection
