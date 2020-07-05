@extends('layouts/app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
        </div>
        </div>
    </div>

<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mg-b-15">
            <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="pull-left">
                          <h2> </h2>
                      </div>
                  </div>
              </div>
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <h2>

                            </h2>
                            <div class="pull-left">
                <h2> Detalii turist:
                @if( $availableCode)
                  Codul este valabil
                @else
                  Codul nu mai este valabil
                @endif
                </h2>
            </div>
            <div class="pull-right">
                @if($user->user_type == 3 && $availableCode)
                  <a class="btn btn-info" href="{{ route('tourists.apply', $tourist->id) }}"> Aplica cod</a>
                @endif
                <a class="btn btn-success" href="{{ route('services.used', $tourist->id) }}"> Locatii Folosire Cod</a>
                <a class="btn btn-success" href="{{ route('options.used', $tourist->id) }}"> Servicii Folosite</a>
                <a class="btn btn-success" href="{{ route('tourists.promo',$tourist->id) }}">Cod nou</a>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ url()->previous() }}"> Inapoi</a>
                </div>
            </div>
                            </div>
                            <div class="profile-details-hr">
                              <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                         <div class="address-hr">
                                            <p><b>Detalii Turist</b><br /></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Detalii Vizita</b><br /></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                         <div class="address-hr">
                                            <p><b>Nume</b><br />{{ $tourist->nume }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Data checkin:</b><br />  {{ $tourist->checkin_date }}</p>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                         <div class="address-hr">
                                            <p><b>Prenume</b><br />{{ $tourist->prenume }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                         <div class="address-hr">
                                            <p><b>Data checkout declarata</b><br />  {{ $tourist->checkout_date }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Email</b><br />{{ $tourist->email }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                       <div class="address-hr">
                                            <p><b>Momentul checkoutului</b><br />  {{ $tourist->checkout_timestamp }}</p>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                          <div class="address-hr">
                                            <p><b>Telefon</b><br />{{ $tourist->telefon }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                         <div class="address-hr">
                                            <p><b>Voucher</b><br />  {{ $tourist->voucher }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Hotel</b><br />{{ $tourist->hotel }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                       <div class="address-hr">
                                            <p><b>Transport</b><br />  {{ $tourist->transport }}</p>
                                        </div>
                                    </div>
                                </div>



                                 <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                          <div class="address-hr">
                                            <p><b>Oras</b><br />{{ $tourist->oras }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                         <div class="address-hr">
                                            <p><b>Scopul Vizitei</b><br />  {{ $tourist->scop }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Tara</b><br />{{ $tourist->tara }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                       <div class="address-hr">

                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
@endsection
