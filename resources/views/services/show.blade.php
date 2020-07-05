@extends('layouts/app')

@section('content')

<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mg-b-15">
            <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="pull-left">
                          <h2> Detalii Prestator</h2>
                      </div>
                  </div>
              </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <h2> Detalii Prestator <a class="btn btn-primary" href="{{ url()->previous() }}"> Inapoi</a></h2>
                            </div>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                            <p><b>Detalii Prestator</b><br /></p>
                                        </div>
                                        <div class="address-hr">
                                            <p><b>Nume</b><br />{{ $service->nume }}</p>
                                        </div>
                                        <div class="address-hr">
                                            <p><b>Email</b><br />{{ $service->email }}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                            <p><b>Detalii Contact</b><br /></p>
                                        </div>
                                        <div class="address-hr">
                                            <p><b>Nume</b><br />  {{ $service->nume_contact }}</p>
                                        </div>
                                        <div class="address-hr">
                                            <p><b>Prenume</b><br />  {{ $service->prenume_contact }}</p>
                                        </div>
                                        <div class="address-hr">
                                            <p><b>Email</b><br />  {{ $service->email_contact }}</p>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
@endsection
