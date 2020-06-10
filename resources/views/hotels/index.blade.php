@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 6 CRUD Example from scratch - APtor.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('hotels.create') }}"> Create New Hotel</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nume</th>
            <th>Email</th>
            <th>Nume Contact</th>
            <th>Email Contact</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($hotels as $hotel)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $hotel->nume }}</td>
            <td>{{ $hotel->email }}</td>
            <td>{{ $hotel->nume_contact }}</td>
            <td>{{ $hotel->email_contact }}</td>
            <td>
                <form action="{{ route('hotels.destroy',$hotel->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('hotels.show',$hotel->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('hotels.edit',$hotel->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>



@endsection
