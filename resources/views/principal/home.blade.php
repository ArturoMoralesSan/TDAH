@extends('layout.master')

{{-- Metadata --}}
@section('title', config('app.name'))
@section('description', '')
@section('canonical', config('app.url'))
@section('class', 'home')
@section('content')
    <section class="section section--white">
        <div class="container">
            <h2 class="h2 text-center mb-8">Cuestionario para detectar TDAH en niños</h2>
            <div>
                <login-form action="{{ url('registro-artistas') }}"
                    enctype="multipart/form-data"
                    inline-template
                    v-cloak
                >
                    <form>
                        <div class="form-group">
                            <div class="form-group__title" aria-description="Pregunta 1">
                                Pregunta 1
                            </div>
                            <div class="form-control">
                                <label for="full_name">Nombre completo</label>
                                <text-field name="full_name" v-model="fields.full_name" maxlength="160" placeholder="" initial=""></text-field>
                                <field-errors name="full_name"></field-errors>
                            </div>
                            <div class="form-control">
                                <label for="photo" v-text="'Fotografia artística'"></label>
                                <file-field name="photo" v-model="fields.photo" aria-describedby="photo-specs"></file-field>
                                <field-errors name="photo"></field-errors>
                                <ul id="photo-specs" class="description">
                                    <li>
                                        Sólo imágenes de tipo: jpeg, gif, png.
                                    </li>
                                    <li>
                                         El archivo no debe exceder 2 MB.
                                    </li>
                                </ul>
                            </div>
                            <div class="form-control">
                                <label for="email">Correo electrónico</label>
                                <text-field name="email" type="email" v-model="fields.email" maxlength="60" placeholder="" initial=""></text-field>
                                <field-errors name="email"></field-errors>
                            </div>
                            <div class="form-control">
                                <label for="password">Contraseña</label>
                                <text-field name="password" type="password" v-model="fields.password" maxlength="60" placeholder="" initial=""></text-field>
                                <field-errors name="password"></field-errors>
                            </div>
                            {{-- Password confirmation --}}
                            <div class="form-control">
                                <label for="password-confirmation">Confirmar contraseña</label>

                                <text-field v-model="fields.password_confirmation"
                                    name="password_confirmation"
                                    maxlength="60"
                                    type="password"
                                ></text-field>
                                <field-errors name="password_confirmation"></field-errors>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group__title">
                                Pregunta 2
                            </div>
                            <div class="row">
                                <div class="col lg:col-1/2 form-control">
                                    <label for="activity">Actividad en la que se desarrolla principalmente:</label>
                                    <select-field name="activity"  v-model="fields.activity">
                                    </select-field>
                                    <field-errors name="activity"></field-errors>
                                </div>
                                <div class="col lg:col-1/2 form-control">
                                    <label for="category">Categoría:</label>
                                    <select-field name="category"  v-model="fields.category">
                                    </select-field>
                                    <field-errors name="category"></field-errors>
                                </div>
                            </div>
                            <div class="col">
                                <label for="speciality">Especialidad:</label>
                                <text-field name="speciality" v-model="fields.speciality" maxlength="120" placeholder="" initial=""></text-field>
                            </div>
                        </div>
                        <div class="text-center">
                            <form-button class="btn--success">
                                Registrar
                            </form-button>
                        </div>
                    </form>
                </login-form>
            </div>
        </div>
    </section>
@endsection