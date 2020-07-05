@extends('layouts/app')

@section('content')

<div class="all-content-wrapper">
 <div class="tinymce-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="tinymce-single responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>Editare text email</h2>
                                <p>IMPORTANT: pentru a insera codul turistului va rugam folositi: {{ $promo_code }} si momentan NU SUPORTA INCARCARE DE FISIERE</p>
                            </div>
                            <form method="post" action="{{ route('tourists.emailconf') }}">
                            @csrf
                              <textarea id="summernote1" name="content" >{{ $content }}</textarea>
                              <button type="submit" class="btn btn-primary waves-effect waves-light">Schimbare template</button>
                            </form>
                            </div>

                        </div>
                    </div>
              </div>
        </div>
</div>

@endsection
