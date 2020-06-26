@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista turisti</h2>
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
            <th>Prenume</th>
            <td>Email</td>
            <td>Telefon</td>
            <th>Cod Promo</th>
            <th>Hotel</th>
            <th>Data checkin</th>
            <th>Data si ora checkout</th>
            <th>Oras</th>
            <th>Tara</th>
            @if($user->user_type < 3 )
              <th width="280px">Action</th>
            @endif
        </tr>
        @foreach ($tourists as $tourist)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tourist->nume }}</td>
            <td>{{ $tourist->prenume }}</td>
            <td>{{ $tourist->email }}</td>
            <td>{{ $tourist->telefon }}</td>
            <td>{{ $tourist->promo_code }}</td>
            <td>{{ $tourist->hotel_name }}</td>
            <td>{{ $tourist->checkin_date }}</td>
            <td>{{ $tourist->checkout_timestamp }}</td>
            <td>{{ $tourist->oras }}</td>
            <td>{{ $tourist->tara }}</td>
             @if($user->user_type < 3 )
            <td>

                <form action="{{ route('tourists.destroy',$tourist->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('tourists.show',$tourist->id) }}">Show</a>
                  @if(($user->parent == $tourist->hotel) || $user->user_type == 1 )
                    <a class="btn btn-primary" href="{{ route('tourists.edit',$tourist->id) }}">Edit</a>

                    <a class="btn btn-success" href="{{ route('tourists.promo',$tourist->id) }}">Cod nou</a>
                    <a class="btn btn-warning" href="{{ route('tourists.checkout',$tourist->id) }}">Checkout</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                  @endif
                </form>

            </td>
             @endif
        </tr>
        @endforeach
    </table>



@endsection
