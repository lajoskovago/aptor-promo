@extends('layouts/app')

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tourists.update',$tourist->id) }}" method="POST">
@csrf
@method('PUT')


<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Editare Turist</a></li>
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
                                                                    <input name="nume" type="text" class="form-control" placeholder="Nume turist" required value="{{ $tourist->nume }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="prenume" type="text" class="form-control" placeholder="Prenume turist" required value="{{ $tourist->prenume }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="email" type="email" class="form-control" placeholder="Email turist" required value="{{ $tourist->email }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="telefon"  type="text" class="form-control" placeholder="Telefon turist" required value="{{ $tourist->telefon }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="oras"  type="text" class="form-control" placeholder="Localitate de domiciliu" required  value="{{ $tourist->oras }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="tara"  type="text" class="form-control" placeholder="Tara de resedinta" required  value="{{ $tourist->tara }}">
                                                                </div>



                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                              <div class="form-group">
                                                                    Detalii calatorie
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="date" name="checkin_date" class="form-control" placeholder="Data check-in" required value="{{ $tourist->checkin_date }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="date" name="checkout_date" class="form-control" placeholder="Data check-out" required value="{{ $tourist->checkout_date }}">
                                                                </div>
                                                              <div class="form-group">
                                                                    <input type="text" name="transport" class="form-control" placeholder="Transport" required value="{{ $tourist->transport }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" name="voucher" class="form-control" placeholder="Voucher" required value="{{ $tourist->voucher }}">
                                                                </div>
                                                                <div class="form-group">
                                                                   Scop calatorie
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="i-checks pull-left">
                                                                      <label><input type="radio"
                                                                       @if($tourist->scop == 'Turism')
                                                                        checked
                                                                       @endif
                                                                       value="Turism" name="scop"> <i></i> Turism </label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="i-checks pull-left">
                                                                      <label><input type="radio"
                                                                       @if($tourist->scop == 'Business')
                                                                        checked
                                                                       @endif
                                                                       value="Business" name="scop"> <i></i> Business </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Editare</button>
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
