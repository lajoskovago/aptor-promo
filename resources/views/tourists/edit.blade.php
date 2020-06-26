@extends('layouts/app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editare turist</h2>
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

<form action="{{ route('tourists.update',$tourist->id) }}" method="POST">
@csrf
@method('PUT')

<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Data si ora plecarii:</strong>
                <input type="text" data-format="dd/MM/yyyy hh:mm:ss" name="checkout_timestamp" id="datetimepicker1"
                class="form-control form-control-warning" value="{{ $tourist->checkout_timestamp }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nume:</strong>
                <input type="text" name="nume" class="form-control" value="{{ $tourist->nume }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prenume:</strong>
                <input type="text" name="prenume" class="form-control"  value="{{ $tourist->prenume }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control"  value="{{ $tourist->email }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefon:</strong>
                <input type="phone" name="telefon" class="form-control"  value="{{ $tourist->telefon }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Checkin:</strong>
                <input type="date" name="checkin_date" class="form-control"  value="{{ $tourist->checkin_date }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Checkout:</strong>
                <input type="date" name="checkout_date" class="form-control"  value="{{ $tourist->checkout_date }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Oras:</strong>
                <input type="text" name="oras" class="form-control"  value="{{ $tourist->oras }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tara:</strong>
                <input type="text" name="tara" class="form-control"  value="{{ $tourist->tara }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Transport:</strong>
                <input type="text" name="transport" class="form-control"  value="{{ $tourist->transport }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Scop:</strong>
                <label for="Turism"><input type="radio" name="scop" value="Turism" class="form-control"
                @if($tourist->scop == 'Turism')
                  checked
                @endif
                >Turism

                </label>
                <label for="Business"><input type="radio" name="scop" value="Business" class="form-control"
                @if($tourist->scop == 'Business')
                  checked
                @endif
                >Business</label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Voucher:</strong>
                <input type="text" name="voucher" class="form-control"  value="{{ $tourist->voucher }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Editare</button>
        </div>
    </div>
</form>

<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>
@endsection
