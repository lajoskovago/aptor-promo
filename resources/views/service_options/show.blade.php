@extends('layouts/app')

@section('content')

<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mg-b-15">
            <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                      <div class="pull-left">
                          <h2> Detalii Serviciu</h2>
                      </div>
                  </div>
              </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <h2> Detalii Serviciu</h2>
                            </div>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Nume</b><br />{{ $serviceOption->nume_serviciu }}</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Descriere</b><br />  {{ $serviceOption->descriere_serviciu }}</p>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
@endsection
