<div class="social-bar-container">
    <a style="margin-right: 5px;" href="https://www.facebook.com/unipolidgo"><img class="social-icon" src="{{ url('img/svg/facebook.svg') }}" alt=""></a>
    <a style="margin-right: 5px;" href="https://twitter.com/unipolidgo"><img class="social-icon" src="{{ url('img/svg/twitter.svg') }}" alt=""></a>
    <a href="https://www.instagram.com/unipolidgo/"><img class="social-icon" src="{{ url('img/svg/instagram.svg') }}" alt=""></a>
</div>
<site-header
    :logo="'{{ url('img/logo-softgical.png') }}'"
    :logotext="'{{ url('img/softgical.png') }}'"
    :uri="'{{ url('/') }}'"
    :breakpoint="760"
>
    <template slot="button-session">
        <a style="margin-right: 5px;" href="https://www.facebook.com/unipolidgo"><img class="social-icon" src="{{ url('img/svg/facebook.svg') }}" alt=""></a>
        <a style="margin-right: 5px;" href="https://twitter.com/unipolidgo"><img class="social-icon" src="{{ url('img/svg/twitter.svg') }}" alt=""></a>
        <a href="https://www.instagram.com/unipolidgo/"><img class="social-icon" src="{{ url('img/svg/instagram.svg') }}" alt=""></a>
    </template>
    <template slot="menu">
        <site-menu
        :breakpoint="760"
        :links="{
            'Inicio': '{{ url('/') }}',
            'formulario': '{{ url('formulario') }}',
        }"
        active-link="{{ $activeLink }}"
        >
            <template slot="close">
                Cerrar @svg('x', 'main-menu__close-icon')
            </template>
        </site-menu>
        @guest
            <a href="{{ url('iniciar-sesion') }}" class="btn btn-login-menu">
                <img class="img-user-login" src="{{ url('img/header/user.svg') }}">
                Ingresar
            </a>
        @endguest
    </template>
</site-header>
    
