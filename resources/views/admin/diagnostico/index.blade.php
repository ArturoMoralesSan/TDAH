@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Diagnosticos')
@section('tab_title', 'Diagnosticos | ' . config('app.name'))
@section('description', 'Lista de Diagnosticos.')
@section('class', 'dashboard')

@section('content')
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Diagnosticos
        </h1>

        <p class="dashboard-heading__caption">
            Hay {{ $diagnostics->count() }} Diagnosticos registrados.
        </p>
    </div>

    <div class="fluid-container mb-16">
        @include('components.alert')
        <section class="db-panel">
            <h3 class="db-panel__title">
                Lista de diagnosticos
            </h3>

            @if (! $diagnostics->count())
                <p class="text-center py-1">
                    Por el momento no hay diagnosticos registrados.
                </p>
            @else

                <resource-table :breakpoint="800" :model="{{ $diagnostics }}" inline-template>
                    <table class="table size-caption mx-auto mb-16 md:table--responsive">
                        <thead>
                            <tr class="table-resource__headings">
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Formularios</th>
                                <th class="pr-4">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="diagnosticItem in resourceList" class="table-resource__row" :key="diagnosticItem.id">
                                <td data-label="Tipo:">
                                    @{{ diagnosticItem.type }}
                                </td>
                                <td data-label="Descripción:">
                                    @{{ diagnosticItem.description }}
                                </td>
                                <td data-label="Formularios:">
                                    @{{ diagnosticItem.count_forms }}
                                </td>
                                
                                <td class="table-resource__actions" data-label="Acciones:">
                                    <a class="btn btn-nowrap btn--sm btn--blue table-resource__button mr-2" :href="$root.path + '/admin/diagnostico/' + diagnosticItem.id + '/editar' ">
                                        <img class="svg-icon" src="{{ url('img/svg/edit.svg')}}">
                                        Editar
                                    </a>
                                    <delete-button class="btn--danger table-resource__button" :url="$root.path + '/admin/diagnostico/eliminar/' + diagnosticItem.id"
                                        :resource-id="diagnosticItem.id"
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
