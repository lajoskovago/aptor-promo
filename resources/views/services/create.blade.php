@extends('layouts/app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add new service</h2>
        </div>
       <div class="pull-right">
            <a class="btn btn-primary" href="{{ url()->previous() }}"> Inapoi</a>
        </div>
    </div>
</div>

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

<form action="{{ route('services.store') }}" method="POST">
    @csrf


<!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Adaugare Prestator</a></li>
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
                                                                    Detalii Prestator
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="nume" type="text" class="form-control" placeholder="Denumire prestator" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="email" id="finish" type="email" class="form-control" placeholder="Email prestator" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="password" type="text" class="form-control" placeholder="Parola" required>
                                                                </div>


                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                    Detalii Contact
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="nume_contact" type="text" class="form-control" placeholder="Nume contact" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="prenume_contact" type="text" class="form-control" placeholder="Prenume Contact" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input name="email_contact" type="email" class="form-control" placeholder="Email Contact" required>
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
