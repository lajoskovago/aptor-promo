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
<div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sparkline13-list shadow-reset">
                                <div class="sparkline13-hd">
                                    <div class="main-sparkline13-hd">
                                        <h1>Lista servicii


                                        </h1>

                                    </div>
                                </div>
                                <div class="sparkline13-graph">
                                @if($user->user_type == 3)
              <div class="pull-left">
                <a class="btn btn-primary" href="{{ route('options.create', $user->parent) }}"> Adaugare</a>
              </div>
            @endif
            <a class="btn btn-primary" href="{{ url()->previous() }}"> Inapoi</a>

        </div>
                                    <div class="datatable-dashv1-list custom-datatable-overright">

                                        <table id="table" data-toggle="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar" data-height="700">
                                            <thead>
                                                <tr>
                                                    <th data-field="id">No</th>
                                                    <th data-field="nume">Nume</th>
                                                    <th data-field="total_folosit">Total Folosit</th>
                                                    <th data-field="action">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
