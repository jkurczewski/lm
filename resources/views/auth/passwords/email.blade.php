@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-cover_home d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <h2 class="mb-4">Wprowadź swój adres e-mail, na który prześlemy link pozwalający zresetować hasło.</h2>

                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adres e-mail') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <button type="submit" class="btn-custom-solid mt-4">
                    {{ __('Wyślij wiadomość resetującą hasło') }}
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
