@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Editar formulario')
@section('tab_title', 'Editar formulario | ' . config('app.name'))
@section('description', 'Editar formulario.')

@section('content')

<section class="mb-16">
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Editar formulario
        </h1>
    </div>

    <div class="fluid-container mb-16">
        <p class="mb-12">
            @include('components.alert')
            <span class="color-link">«</span>
            <a href="{{ url('admin/formularios/') }}">Ver todos los formulario</a>
        </p>

        <registration-form 
            action="{{ url('admin/formulario/'. $diagnosticform->id .'/actualizar') }}"
            :questions="22"
            :min-questions="1"
            :diagnostics="{{ $diagnostics }}"
            :question-data="{{ $questions }}"
            :assigned-questions="{{ $questionsform }}"
            :form="{{ $diagnosticform }}"
        >
        </registration-form>
    </div>
</section>

@endsection
