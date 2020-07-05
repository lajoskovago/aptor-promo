@extends('layouts/app')

@section('content')


<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mg-b-15">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <h2> Detalii unitate cazare</h2>
                            </div>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Nume</b><br />{{ $hotel->nume }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Persoana de contact</b><br /> {{ $hotel->nume_contact }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Email hotel</b><br /> {{ $hotel->email }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Email persoana de contact</b><br /> {{ $hotel->email_contact }}</p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>




@endsection
