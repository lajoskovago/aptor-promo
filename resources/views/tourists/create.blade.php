@extends('layouts/app')

@section('content')


<form action="{{ route('tourists.store') }}" method="POST">
    @csrf



<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                        @if ($errors->getBags())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach($errors->getBags() as $key=>$error)
                <li>{{ $key }}</li>
            @endforeach
        </ul>
    </div>
@endif


                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Adaugare Turist</a>{{ Session::get('error') }}</li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                    Detalii turist
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="nume" type="text" class="form-control" placeholder="Nume turist" required value="{{ old('nume') }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="prenume" type="text" class="form-control" placeholder="Prenume turist" required value="{{ old('prenume') }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="email" type="email" class="form-control" placeholder="Email turist" required value="{{ old('email') }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="telefon"  type="text" class="form-control" placeholder="Telefon turist" required value="{{ old('telefon') }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="oras"  type="text" class="form-control" placeholder="Localitate de domiciliu" required value="{{ old('oras') }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="tara"  type="text" class="form-control" placeholder="Tara de resedinta" required value="{{ old('tara') }}">
                                                                </div>



                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                              <div class="form-group">
                                                                    Detalii calatorie
                                                                </div>
                                                                <div class="form-group">
                                                                    Data check-in
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="date" name="checkin_date" class="form-control" placeholder="Data check-in" required value="{{ old('checkin_date') }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    Data check-out
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="date" name="checkout_date" class="form-control" placeholder="Data check-out" required value="{{ old('checkout_date') }}">
                                                                </div>
                                                              <div class="form-group">
                                                                    <input type="text" name="transport" class="form-control" placeholder="Transport" required value="{{ old('transport') }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" name="voucher" class="form-control" placeholder="Voucher" value="{{ old('voucher') }}">
                                                                </div>
                                                                <input type="hidden" name="hotel" class="form-control" value={{ $hotelId }}>
                                                                <div class="form-group">
                                                                   Scop calatorie
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Turism"><input type="radio" name="scop" value="Turism" class="form-control" @if(old('scop') == 'Turism') checked @endif>Turism</label>
                                                                    <label for="Business"><input type="radio" name="scop" value="Business" class="form-control" @if(old('scop') == 'Business') checked @endif>Business</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Adaugare</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>







</form>
@endsection
