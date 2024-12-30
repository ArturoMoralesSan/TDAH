@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Formulario')
@section('tab_title', 'Formulario | ' . config('app.name'))
@section('description', 'Formulario.')

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
            <a href="{{ url('admin/analisis-formularios/'.$form->analysis_patient_id) }}">Ver formularios</a>
        </p>

            <base-form action="{{ url('admin/guardar-formulario/'.$form->id) }}"
                enctype="multipart/form-data"
                inline-template
                v-cloak
            >
                <form>
                    <section class="db-panel">
                        <h3 class="db-panel__title">
                            Preguntas de {{ $form->diagnosticform->form}}
                        </h3>
                        @foreach($form->diagnosticform->questionsform as $question)
                            <div class="md:row mb-4">
                                <div class="md:col">
                                    {{-- nombres --}}
                                    <div class="form-control">
                                        <label for="question-{{ $question->id }}">{{ $question->question->question }}</label>
                                        <text-field 
                                        id="question-{{ $question->id }}" 
                                        name="question-{{ $question->id }}" 
                                        v-model="fields['question-'+{{ $question->id }}]" 
                                        maxlength="80" initial=""
                                        aria-describedby="question-{{ $question->id }}"
                                        ></text-field>
                                        <field-errors name="question-{{ $question->id }}"></field-errors>
                                        <p id="question-{{ $question->id }}" class="description">
                                            {{ $question->question->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
