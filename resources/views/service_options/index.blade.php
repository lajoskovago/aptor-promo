@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listare servicii</h2>
            </div>
            @if($user->user_type == 3)
              <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('options.create', $user->parent) }}"> Adaugare</a>
              </div>
            @endif
            <div class="pull-right">
            <a class="btn btn-primary" href="{{ url()->previous() }}"> Inapoi</a>
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
            <th>Total Folosit</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($serviceOptions as $service)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $service->nume_serviciu }}</td>
            <td>{{ $service->totalCount }}</td>
            <td>
                <form action="{{ route('options.destroy',$service->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('options.show',$service->id) }}">Show</a>
                @if($user->user_type == 3 && $service->id == $user->parent)
                    <a class="btn btn-primary" href="{{ route('options.edit',$service->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                @endif
                </form>
            </td>
        </tr>
        @endforeach
    </table>



@endsection
