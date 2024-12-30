@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Agregar formulario')
@section('tab_title', 'Agregar formulario | ' . config('app.name'))
@section('description', 'Agregar formulario.')

@section('content')

<section class="mb-16">
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Agregar formulario
        </h1>
    </div>

    <div class="fluid-container mb-16">
        <p class="mb-12">
            @include('components.alert')
            <span class="color-link">«</span>
            <a href="{{ url('admin/formularios/') }}">Ver todos los formularios</a>
        </p>

            <registration-form 
                action="{{ url('admin/formulario/crear') }}"
                :questions="22"
                :min-questions="1"
                :diagnostics="{{ $diagnostics }}"
                :question-data="{{ $questions }}"
                :assigned-questions="[]"
                form=""
            >
            </registration-form>
    </div>
</section>

@endsection
