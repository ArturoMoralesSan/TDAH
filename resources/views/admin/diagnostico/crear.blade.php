@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Agregar diagnosticos')
@section('tab_title', 'Agregar diagnosticos | ' . config('app.name'))
@section('description', 'Agregar diagnosticos.')

@section('content')

<section class="mb-16">
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Agregar diagnostico
        </h1>
    </div>

    <div class="fluid-container mb-16">
        <p class="mb-12">
            @include('components.alert')
            <span class="color-link">«</span>
            <a href="{{ url('admin/diagnosticos/') }}">Ver todos los diagnosticos</a>
        </p>

            <base-form action="{{ url('admin/diagnostico/crear') }}"
                enctype="multipart/form-data"
                inline-template
                v-cloak
            >
                <form>
                    <section class="db-panel">
                        <h3 class="db-panel__title">
                            Datos del diagnostico
                        </h3>

                        <div class="md:row mb-4">
                            <div class="md:col">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="type">Tipo</label>
                                    <text-field name="type" v-model="fields.type" maxlength="80" initial=""></text-field>
                                    <field-errors name="type"></field-errors>

                                </div>
                            </div>
                        </div>
                        <div class="md:row mb-4">
                            <div class="md:col">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="description">Descripción</label>
                                    <text-field name="description" v-model="fields.description" maxlength="80" initial=""></text-field>
                                    <field-errors name="description"></field-errors>

                                </div>
                            </div>
                            
                        </div>
                    </section>
                    <div class="text-center">
                        <form-button class="btn--success btn--wide">
                            Crear
                        </form-button>
                    </div>
                </form>
            </base-form>
    </div>
</section>

@endsection
