@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista servicii</h2>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
        </div>
        <div class="pull-right">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
        </div>
        <div class="pull-right">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
        </div>
        <div class="pull-right">

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
  <div class="container-fluid">
<form action="{{ route('options.apply') }}" method="POST">
    @csrf


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Denumire</th>
            <th>Descriere</th>
            <th width="280px">Aplica?</th>
        </tr>
        @foreach ($serviceOption as $service)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $service->nume_serviciu }}</td>
            <td>{{ $service->descriere_serviciu }}</td>
            <td>
              <input name="servicii[]" type="checkbox" value="{{$service->id}}">
            </td>
        </tr>
        @endforeach
    </table>
        <input name="tourist" type="hidden" value="{{$touristId}}">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Aplica cod</button>
        </div>
    </form>
</div>


@endsection
