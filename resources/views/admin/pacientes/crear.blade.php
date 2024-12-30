@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Agregar pacientes')
@section('tab_title', 'Agregar pacientes | ' . config('app.name'))
@section('description', 'Agregar pacientes.')

@section('content')

<section class="mb-16">
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Agregar paciente
        </h1>
    </div>

    <div class="fluid-container mb-16">
        <p class="mb-12">
            @include('components.alert')
            <span class="color-link">«</span>
            <a href="{{ url('admin/pacientes/') }}">Ver todos los pacientes</a>
        </p>

            <base-form action="{{ url('admin/paciente/crear') }}"
                enctype="multipart/form-data"
                inline-template
                v-cloak
            >
                <form>
                    <section class="db-panel">
                        <h3 class="db-panel__title">
                            Datos del paciente
                        </h3>

                        <div class="md:row mb-4">
                            <div class="md:col-1/3">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="name">Nombre</label>
                                    <text-field name="name" v-model="fields.name" maxlength="80" initial=""></text-field>
                                    <field-errors name="name"></field-errors>

                                </div>
                            </div>
                            <div class="md:col-1/3">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="first_last_name">Primer apellido</label>
                                    <text-field name="first_last_name" v-model="fields.first_last_name" maxlength="80" initial=""></text-field>
                                    <field-errors name="first_last_name"></field-errors>

                                </div>
                            </div>
                            <div class="md:col-1/3">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="second_last_name">Segundo apellido</label>
                                    <text-field name="second_last_name" v-model="fields.second_last_name" maxlength="80" initial=""></text-field>
                                    <field-errors name="second_last_name"></field-errors>

                                </div>
                            </div>
                        </div>
                        <div class="md:row mb-4">
                            <div class="md:col-1/2">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="age">Edad</label>
                                    <text-field name="age" v-model="fields.age" maxlength="80" initial=""></text-field>
                                    <field-errors name="age"></field-errors>

                                </div>
                            </div>
                            <div class="md:col-1/2">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="sex">Sexo</label>
                                    <text-field name="sex" v-model="fields.sex" maxlength="80" initial=""></text-field>
                                    <field-errors name="sex"></field-errors>

                                </div>
                            </div>
                        </div>
                        <div class="md:row mb-4">
                            <div class="md:col-1/2">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="father_name">Nombre del papá</label>
                                    <text-field name="father_name" v-model="fields.father_name" maxlength="80" initial=""></text-field>
                                    <field-errors name="father_name"></field-errors>

                                </div>
                            </div>
                            <div class="md:col-1/2">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="mother_name">Nombre de la mamá</label>
                                    <text-field name="mother_name" v-model="fields.mother_name" maxlength="80" initial=""></text-field>
                                    <field-errors name="mother_name"></field-errors>

                                </div>
                            </div>
                        </div>
                        <div class="md:row mb-4">
                            <div class="md:col">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="address">Dirección</label>
                                    <text-field name="address" v-model="fields.address" maxlength="80" initial=""></text-field>
                                    <field-errors name="address"></field-errors>

                                </div>
                            </div>
                        </div>
                        <div class="md:row mb-4">
                            <div class="md:col-1/2">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="phone">Télefono</label>
                                    <text-field name="phone" v-model="fields.phone" maxlength="80" initial=""></text-field>
                                    <field-errors name="phone"></field-errors>

                                </div>
                            </div>
                            <div class="md:col-1/2">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="optional_phone">Otro télefono</label>
                                    <text-field name="optional_phone" v-model="fields.optional_phone" maxlength="80" initial=""></text-field>
                                    <field-errors name="optional_phone"></field-errors>
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
