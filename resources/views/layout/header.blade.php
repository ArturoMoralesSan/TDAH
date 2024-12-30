<site-header
    :logo="'{{ url('img/logosg.png') }}'"
    :uri="'{{ url('/') }}'"
    :breakpoint="760"
> 
    <template slot="menu">
        <site-menu
        :breakpoint="760"
        :links="{
            'INICIO': '{{ url('/') }}',
            'OBJECTIVE': '{{ url('#objective') }}',
            'BLOCKCHAIN': '{{ url('#blockchain') }}',
            'FAQ' : '{{ url('#faq') }}',
        }"
        active-link="{{ $activeLink }}"
        >
            <template slot="close">
                Cerrar @svg('x', 'main-menu__close-icon')
            </template>
        </site-menu>
        @guest
            <a href="{{ url('login') }}" class="btn btn-login-menu">
                <img class="img-user-login" src="{{ url('img/header/user.svg') }}">
                Ingresar
            </a>
        @endguest
    </template>
</site-header>
    
