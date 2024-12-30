@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Agregar análisis')
@section('tab_title', 'Agregar análisis | ' . config('app.name'))
@section('description', 'Agregar análisis.')

@section('content')

<section class="mb-16">
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Agregar análisis
        </h1>
    </div>

    <div class="fluid-container mb-16">
        <p class="mb-12">
            @include('components.alert')
            <span class="color-link">«</span>
            <a href="{{ url('admin/analisis/') }}">Ver todos los análisis</a>
        </p>

            <base-form action="{{ url('admin/analisis/crear') }}"
                enctype="multipart/form-data"
                inline-template
                v-cloak
            >
                <form>
                    <section class="db-panel">
                        <h3 class="db-panel__title">
                            Datos del análisis
                        </h3>

                        <div class="md:row mb-4">
                            <div class="md:col-1/2">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="patient_id">Paciente</label>
                                    <search-select-field
                                        name="patient_id"
                                        v-model="fields.patient_id"
                                        :options="{{ $patients }}"
                                        initial=""
                                    >
                                    </search-select-field>
                                    <field-errors name="patient_id"></field-errors>

                                </div>
                            </div>
                            <div class="md:col-1/2">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="diagnostic_id">Diagnostico</label>
                                    <search-select-field
                                        name="diagnostic_id"
                                        v-model="fields.diagnostic_id"
                                        :options="{{ $diagnostics }}"
                                        initial=""
                                    >
                                    </search-select-field>
                                    <field-errors name="diagnostic_id"></field-errors>

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
