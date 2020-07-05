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

<style>
.ma{
  margin: 5px 0px 0px 0px!important;
  background: red !important;
}

.checkbox-login{
  margin: 0px 0px 0px 0px!important;
}

.checkbox-label{
  margin: 0px 0px 0px 20px!important;
}
</style>

<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>VA RUGAM SA VA LOGATI IN APLICATIE</h3>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="email" placeholder="example@gmail.com" title="Please enter you username" required="" value="{{ old('email') }}" name="email" id="email" class="form-control" required autocomplete="email" autofocus>
                                <span class="help-block small">va rugam introduceti emailul</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Parola</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                <span class="help-block small">introduceti parola</span>
                            </div>
                            <div class="checkbox login-checkbox">
                                <label class="checkbox-label">
                                <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Tinema minte </label>
                                <p class="help-block small">(daca aveti incredere in acest dispozitiv)</p>
                            </div>

                            <button class="btn btn-success btn-block loginbtn ">Logare</button>
                             <a href="{{ route('password.request') }}" class="btn btn-danger btn-block loginbtn ma">
                                        Am uitat parola
                                    </a>
                        </form>
                    </div>
                </div>
			</div>

@endsection
