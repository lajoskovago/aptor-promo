@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Adaugare turist nou</h2>
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

<form action="{{ route('tourists.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nume:</strong>
                <input type="text" name="nume" class="form-control" placeholder="Nume" required value={{ old('nume') }} >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prenume:</strong>

                <input type="text" name="prenume" class="form-control" placeholder="Prenume" required value={{ old('prenume') }} >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Email" required value={{ old('email') }} >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefon:</strong>
                <input type="phone" name="telefon" class="form-control" placeholder="Telefon" required value={{ old('telefon') }} >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Checkin:</strong>
                <input type="date" name="checkin_date" class="form-control" placeholder="data checkin" required value={{ old('checkin_date') }} >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Checkout:</strong>
                <input type="date" name="checkout_date" class="form-control" placeholder="data checkout" required value={{ old('checkout_date') }} >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Oras:</strong>
                <input type="text" name="oras" class="form-control" placeholder="Oras" required value={{ old('oras') }} >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tara:</strong>
                <input type="text" name="tara" class="form-control" placeholder="Tara" required value={{ old('tara') }} >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Transport:</strong>
                <input type="text" name="transport" class="form-control" placeholder="Tara" required value={{ old('transport') }} >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Scop:</strong>
                <label for="Turism"><input type="radio" name="scop" value="Turism" class="form-control" @if(old('scop') == 'Turism') checked @endif>Turism</label>
                <label for="Business"><input type="radio" name="scop" value="Business" class="form-control" @if(old('scop') == 'Business') checked @endif>Business</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Voucher:</strong>
                <input type="text" name="voucher" class="form-control" placeholder="Voucher agentie turism(optional)" required value={{ old('voucher') }} >
            </div>
        </div>
        <input type="hidden" name="hotel" class="form-control" value={{ $hotelId }}>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Adaugare</button>
        </div>
    </div>

</form>
@endsection
