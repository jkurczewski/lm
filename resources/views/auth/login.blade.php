{{-- TO DO:
- przyciski z animacjami
- walidacja --}}

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="d-none d-md-flex col-md align-items-end bg-login">
            <h2 class="text-white pb-3 ps-3"><b>Cagliari</b><br>Miasto na Sardynii, Włochy</h2>
        </div>
            <div class="col-sm-12 col-md-6">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 d-flex justify-content-center login-logo_wrapper">
                        <a href="/"><img class="login-logo" src="../assets/logo.png" alt="Logo - Las Mieszkanias"></a>
                    </div>
                    <div class="col-sm-8 col-md-10 col-lg-8 col-xl-6 justify-content-center login-panel">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">{{ __('Adres e-mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">{{ __('Hasło') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Zapamiętaj mnie') }}
                                </label>
                            </div>

                            <button type="submit" class="btn-custom-solid color-white">
                                {{ __('Zaloguj') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="text-dark d-flex justify-content-end mt-2" href="{{ route('password.request') }}">
                                {{ __('Przypomnij hasło') }}
                            </a>
                            @endif
                            <hr>
                            <div class="mb-2">
                                Nie masz konta?
                            </div>
                            <a class="btn-custom-outline" href="{{ route('register') }}">
                                {{ __('Zarejestruj się!') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
