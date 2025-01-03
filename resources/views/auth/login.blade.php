@extends('layout.master')
{{-- Metadata --}}
@section('title', config('app.name'))
@section('description', 'Iniciar-sesion.')
@section('canonical', config('app.url'))
@section('class', 'home')
@section('content')
<section class="section section--corporate">
    
    <div class="container">
        <div class="login-form">
            
            <form class="form-350" method="POST" action="{{ route('login') }}">
                @csrf
                <h1 class="h3 form-title text-center">Iniciar Sesión</h1>
                <div class="separator-container">
                    <hr class="login-separator">
                </div>
                <div class="form-control">
                    <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->
                    <input id="email" type="email" class="form-input form-field @error('email') is-invalid @enderror" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-control">
                    <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->
                    <input id="password" type="password" class="form-input form-field @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember"  id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" type="button" class="btn btn--login w-full">
                        {{ __('Login') }}
                    </button>
                </div>
                <div class="divider-form-login">
                    <span class="divider-form-login-span"> ó</span>
                </div>
                <p class="text_reset-pass m-0">
                    <a class="form-link" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                </p>
                <p class="text_reset-pass m-0">
                    <a class="form-link" href="{{ route('register') }}">
                        ¿Aún no tienes cuenta? Regístrate
                    </a>
                </p>
            </form>
        </div> 
    </div>
</section>
@endsection
