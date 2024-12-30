@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('meta.title', 'Actualizar perfil' )
@section('meta.tab_title', 'Actualizar perfil | Panel de administración | ' . config('app.name'))
@section('css_classes', 'dashboard')
@section('has_gallery', 'true')

@section('content')
    @include('components.alert')
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Actualizar perfil
        </h1>
    </div>

    <div class="fluid-container mb-16">
        <base-form action="{{ url('admin/perfil/editar') }}"
            method="PUT"
            inline-template
            v-cloak
        >
            <form>
                <section class="db-panel">
                    <h3 class="db-panel__title">
                        Datos del usuario
                    </h3>

                    <div class="md:row">
                        <div class="md:col-1/2">

                            {{-- Name --}}
                            <div class="form-control">
                                <label for="name">Nombre</label>
                                <text-field name="name" v-model="fields.name" maxlength="160" initial="{{ $authUser->name }}"></text-field>

                                <field-errors name="name"></field-errors>
                            </div>
                        </div>
                        <div class="md:col-1/2">

                            {{-- Name --}}
                            <div class="form-control">
                                <label for="lastname">Apellidos</label>
                                <text-field name="lastname" v-model="fields.lastname" maxlength="160" initial="{{ $authUser->lastname }}"></text-field>

                                <field-errors name="lastname"></field-errors>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="text-center">
                    <form-button class="btn--blue--dashboard btn--wide">
                        Actualizar
                    </form-button>
                </div>
            </form>
        </base-form>

    </div>

@endsection
