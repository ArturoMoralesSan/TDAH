@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Análisis')
@section('tab_title', 'Análisis | ' . config('app.name'))
@section('description', 'Lista de Análisis.')
@section('class', 'dashboard')

@section('content')
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Análisis
        </h1>

        <p class="dashboard-heading__caption">
            Hay {{ $analysis->count() }} análisis registrados.
        </p>
    </div>

    <div class="fluid-container mb-16">
        @include('components.alert')
        <section class="db-panel">
            <h3 class="db-panel__title">
                Lista de análisis
            </h3>

            @if (! $analysis->count())
                <p class="text-center py-1">
                    Por el momento no hay análisis registrados.
                </p>
            @else

                <resource-table :breakpoint="800" :model="{{ $analysis }}" inline-template>
                    <table class="table size-caption mx-auto mb-16 md:table--responsive">
                        <thead>
                            <tr class="table-resource__headings">
                                <th>Paciente</th>
                                <th>Diagnostico</th>
                                <th class="pr-4">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="analysisItem in resourceList" class="table-resource__row" :key="analysisItem.id">
                                <td data-label="Paciente:">
                                    @{{ analysisItem.patient.name }}
                                </td>
                                <td data-label="Diagnostico:">
                                    @{{ analysisItem.diagnostic.type }}
                                </td>

                                <td class="table-resource__actions" data-label="Acciones:">
                                    <a class="btn btn-nowrap btn--sm btn--blue table-resource__button mr-2" :href="$root.path + '/admin/analisis-formularios/' + analysisItem.id ">
                                        Formularios
                                    </a>
                                    <a class="btn btn-nowrap btn--sm btn--blue table-resource__button mr-2" :href="$root.path + '/admin/analisis/' + analysisItem.id + '/editar' ">
                                        <img class="svg-icon" src="{{ url('img/svg/edit.svg')}}">
                                        Editar
                                    </a>
                                    <delete-button class="btn--danger table-resource__button" :url="$root.path + '/admin/analisis/eliminar/' + analysisItem.id"
                                        :resource-id="analysisItem.id"
                                        :options="{ onDelete: onResourceDelete }"
                                    >
                                        <img class="svg-icon" src="{{ url('img/svg/trash.svg')}}">
                                        Eliminar
                                    </delete-button>
                                </td>
                            </tr>
                        </tbody>

                    </table>

                </resource-table>

            @endif

        </section>
    </div>
@endsection
