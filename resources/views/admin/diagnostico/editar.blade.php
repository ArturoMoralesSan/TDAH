@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Editar diagnostico')
@section('tab_title', 'Editar diagnostico | ' . config('app.name'))
@section('description', 'Editar diagnostico.')

@section('content')

<section class="mb-16">
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Editar diagnostico
        </h1>
    </div>

    <div class="fluid-container mb-16">
        <p class="mb-12">
            @include('components.alert')
            <span class="color-link">«</span>
            <a href="{{ url('admin/diagnosticos/') }}">Ver todos los diagnosticos</a>
        </p>

            <base-form action="{{ url('admin/diagnostico/'. $diagnostic->id .'/actualizar') }}"
                method="put"
                enctype="multipart/form-data"
                inline-template
                v-cloak
            >
                <form>
                    <section class="db-panel">
                        <h3 class="db-panel__title">
                            Datos de diagnostico
                        </h3>
                        <div class="md:row mb-4">
                            <div class="md:col">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="type">Tipo</label>
                                    <text-field name="type" v-model="fields.type" maxlength="80" initial="{{ $diagnostic->type }}"></text-field>
                                    <field-errors name="type"></field-errors>

                                </div>
                            </div>
                            
                        </div>
                        <div class="md:row mb-4">
                            <div class="md:col">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="description">Descripción</label>
                                    <text-field name="description" v-model="fields.description" maxlength="255" initial="{{ $diagnostic->description }}"></text-field>
                                    <field-errors name="description"></field-errors>

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
            </user-form>
    </div>
</section>

@endsection
