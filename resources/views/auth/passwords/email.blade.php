@extends('layout.master')
@section('title', config('app.name'))
@section('description', 'Restablecer contraseña.')
@section('canonical', config('app.url'))
@section('class', 'home')
@section('content')
<section class="section section--corporate">
    <div class="container">         
        <div class="login-form">
            <form class="form-350" method="POST" action="{{ route('password.email') }}">
                @csrf
                <h1 class="h3 form-title text-center ">Restablecer contraseña</h1>
                <div class="separator-container">
                    <hr class="login-separator">
                </div>
                <div class="form-control">
                    <input id="email" type="email" placeholder="Correo electrónico" class="form-input form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn--success btn--login  w-full">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
