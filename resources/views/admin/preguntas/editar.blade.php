@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Editar pregunta')
@section('tab_title', 'Editar pregunta | ' . config('app.name'))
@section('description', 'Editar pregunta.')

@section('content')

<section class="mb-16">
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Editar pregunta
        </h1>
    </div>

    <div class="fluid-container mb-16">
        <p class="mb-12">
            @include('components.alert')
            <span class="color-link">«</span>
            <a href="{{ url('admin/preguntas/') }}">Ver todas las preguntas</a>
        </p>

            <base-form action="{{ url('admin/pregunta/'. $question->id .'/actualizar') }}"
                method="put"
                enctype="multipart/form-data"
                inline-template
                v-cloak
            >
                <form>
                    <section class="db-panel">
                        <h3 class="db-panel__title">
                            Datos de la pregunta
                        </h3>
                        <div class="md:row mb-4">
                            <div class="md:col">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="question">Pregunta</label>
                                    <text-field name="question" v-model="fields.question" maxlength="255" initial="{{ $question->question }}"></text-field>
                                    <field-errors name="question"></field-errors>

                                </div>
                            </div>
                            
                        </div>
                        <div class="md:row mb-4">
                            <div class="md:col">
                                {{-- nombres --}}
                                <div class="form-control">
                                    <label for="description">Descripción</label>
                                    <text-field name="description" v-model="fields.description" maxlength="255" initial="{{ $question->description }}"></text-field>
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
