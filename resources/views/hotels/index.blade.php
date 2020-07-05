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
                                        <h1>Lista hoteluri


                                        </h1>

                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">

                                        <table id="table" data-toggle="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" data-height="700">
                                            <thead>
                                                <tr>
                                                    <th data-field="id">No</th>
                                                    <th data-field="nume">Nume</th>
                                                    <th data-field="email">Email</th>
                                                    <th data-field="nume_contact">Nume Contact</th>
                                                    <th data-field="email_contact">Email Contact</th>
                                                    <th data-field="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
                                                          @if($user['user_type'] == 1 || $user->parent == $hotel->id)
                                                            <a class="btn btn-primary" href="{{ route('hotels.edit',$hotel->id) }}">Edit</a>
                                                            <a class="btn btn-success" href="{{ route('tourists.create',$hotel->id) }}"> Adaugare turist</a>
                                                          @endif
                                                            <a class="btn btn-success" href="{{ route('tourists.index',$hotel->id) }}"> Listare turisti</a>
                                                            @csrf
                                                            @if($user['user_type'] == 1)
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            @endif
                                                        </form>
                                                    </td>

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

@endsection
