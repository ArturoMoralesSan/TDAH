<site-header
    :logo="'{{ url('img/logo-softgical.png') }}'"
    :logotext="'{{ url('img/softgical.png') }}'"
    :uri="'{{ url('/') }}'"
    :breakpoint="760"
> 
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
    
