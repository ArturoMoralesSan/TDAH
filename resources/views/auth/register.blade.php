@extends('layout.master')
@section('title', config('app.name'))
@section('description', 'Registro.')
@section('canonical', config('app.url'))
@section('class', 'home')
@section('content')
<div class="section section--corporate">
    <div class="container">
        <div class="login-form">        
            <form class="form-350" method="POST" action="{{ route('register') }}">
                @csrf
                <h1 class="form-title text-center">Registro</h1>
                <div class="separator-container">
                    <hr class="login-separator">
                </div>
                <div class="form-control">
                    <input placeholder="Nombre" id="name" type="text" class="form-input form-field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-control">
                    <input id="lastname" placeholder="Apellidos" type="text" class="form-input form-field @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-control">
                    <input id="email" type="text" placeholder="Correo electrónico" class="form-input form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-control">
                    <input placeholder="Contraseña" id="password" type="password" class="form-input form-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
             
                <div class="form-control">
                    <input placeholder="Confirmar contraseña" id="password-confirm" type="password" class="form-input form-field" name="password_confirmation" required autocomplete="new-password">
                </div>

                
                <div class="text-center">
                    <button type="submit" type="button" class="btn btn--success btn--login w-full">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
