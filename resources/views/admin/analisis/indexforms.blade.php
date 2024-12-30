@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Formularios de análisis')
@section('tab_title', 'Formularios de análisis | ' . config('app.name'))
@section('description', 'Lista de Formularios de análisis.')
@section('class', 'dashboard')

@section('content')
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Análisis
        </h1>

        <p class="dashboard-heading__caption">
            Hay {{ $forms->count() }} formularios registrados para este análisis.
        </p>
    </div>

    <div class="fluid-container mb-16">
        @include('components.alert')
        <div class="row-grid">
            @foreach($forms as $key => $form)
                <div class="col-grid-1-3">
                    <section class="db-panel db-panel__form">
                        <h3 class="db-panel__title db-panel__title-form">
                            {{$key + 1 }} - {{ $form->diagnosticform->form }}
                        </h3>
                        <div class="db-panel__details">
                            <div class="db-panel__detail-block">
                                <span class="db-panel__detail-icon">❓</span>
                                <span class="db-panel__detail-text">{{ $form->diagnosticform->count_questions }} preguntas</span>
                            </div>

                            <div class="db-panel__detail-block">
                                <span class="db-panel__detail-icon">📋</span>
                                @if($form->completed_at)
                                    <span class="db-panel__status completed">Completado</span>
                                @else
                                    <span class="db-panel__status pending">Sin completar</span>
                                @endif
                                
                            </div>
                        </div>
                        
                        <div class="db-panel__footer">
                        @if(!$form->completed_at)
                            <a class="btn btn-nowrap btn--sm btn--blue" href="{{ url('admin/formulario-analisis/'.$form->id) }}">Responder</a>
                        @endif
                        </div>
                    </section>
                </div>
            @endforeach
        </div>
    </div>
@endsection
