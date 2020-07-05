@extends('layouts/app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
<div class="main-sparkline13-hd">
                                        <h1>Lista turisti


                                        </h1>

                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                  <div class="dataTables_scroll">
                                    <div class="datatable-dashv1-list custom-datatable-overright">

                                        <table id="table" data-toggle="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" data-height="700">
                                            <thead>
                                                <tr>
                                                    <th data-field="id">No</th>
                                                    <th data-field="nume">Nume</th>
                                                    <th data-field="prenume">Prenume</th>
                                                    <th data-field="email">Email</th>
                                                    <th data-field="telefon">Telefon</th>
                                                    <th data-field="promo_code">Cod Promo</th>
                                                    <th data-field="hotel">Hotel</th>
                                                    <th data-field="check-in">Data checkin</th>
                                                    <th data-field="checkout">Data si ora checkout</th>
                                                    <th data-field="oras">Oras</th>
                                                    <th data-field="tara">Tara</th>
                                                    @if($user->user_type < 3 )
                                                    <th data-field="action">Action</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
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

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection
