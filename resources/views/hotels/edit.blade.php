@extends('layouts/app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Hotel</h2>
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

<form action="{{ route('hotels.update',$hotel->id) }}" method="POST">
@csrf
@method('PUT')

<div class="row">
   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>Nume:</strong>
           <input type="text" name="nume" class="form-control" placeholder="Name" value="{{ $hotel->nume }}">
       </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>Email:</strong>
           <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $hotel->email }}">
       </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>Nume Contact:</strong>
           <input type="text" name="nume_contact" class="form-control" placeholder="Name Contact" value="{{ $hotel->nume_contact }}">
       </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prenume Contact:</strong>
                <input type="text" name="prenume_contact" class="form-control" placeholder="Prenume persoana contact" value="{{ $hotel->prenume_contact }}">
            </div>
        </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="form-group">
           <strong>Email Contact:</strong>
           <input type="text" name="email_contact" class="form-control" placeholder="Email contact" value="{{ $hotel->email_contact }}">
       </div>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-12 text-center">
           <button type="submit" class="btn btn-primary">Editare</button>
   </div>
</div>
</form>
@endsection
