@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="d-none d-md-flex col-md align-items-end bg-cover bg-register">
            <h2 class="text-white pb-3 ps-3"><b>Twój nowy dom...</b><br>Gdzie tylko chcesz!</h2>
        </div>
            <div class="col-sm-12 col-md-6">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 d-flex justify-content-center login-logo_wrapper">
                        <a href="/"><img class="login-logo" src="../assets/logo.png" alt="Logo - Las Mieszkanias"></a>
                    </div>
                    <div class="col-12 col-md-10 col-lg-8 col-xl-6 justify-content-center login-panel">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-1">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Imię') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-1">
                                <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('Adres e-mail') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-1">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Powtórz hasło') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <button type="submit" class="btn-custom-solid color-white mb-2">
                                {{ __('Zarejestruj się') }}
                            </button>

                            <hr>
                            <div class="mb-2">
                                Masz już konto?
                            </div>
                            <a class="btn-custom-outline" href="{{ route('login') }}">
                                {{ __('Zaloguj się!') }}
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
