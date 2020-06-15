@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 6 CRUD Example from scratch - APtor.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('services.create') }}"> Create new service</a>
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
        @foreach ($services as $service)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $service->nume }}</td>
            <td>{{ $service->email }}</td>
            <td>{{ $service->nume_contact }}</td>
            <td>{{ $service->email_contact }}</td>
            <td>
                <form action="{{ route('services.destroy',$service->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>



@endsection
