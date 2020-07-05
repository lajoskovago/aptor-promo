@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Prestatori de servicii</h2>
            </div>
            @if($user->user_type == 1)
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('services.create') }}"> Adaugare prestator</a>
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
<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
<div class="pull-left">
                <a class="btn btn-success" href="{{ route('services.create') }}"> Adaugare prestator</a>
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
                                                    <th data-field="turisti_cod">Turisti cu cod</th>
                                                    <th data-field="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           @foreach ($services as $service)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $service->nume }}</td>
            <td>{{ $service->email }}</td>
            <td>{{ $service->nume_contact }}</td>
            <td>{{ $service->email_contact }}</td>
            <td>{{ $service->total }}</td>
            <td>
                <form action="{{ route('services.destroy',$service->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>

                    <a class="btn btn-success" href="{{ route('options.create',$service->id) }}">Adaugare Serviciu</a>

                    <a class="btn btn-success" href="{{ route('options.index',$service->id) }}">Listare Servicii</a>

                    <a class="btn btn-success" href="{{ route('tourists.used',$service->id) }}">Listare Turisti</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
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
