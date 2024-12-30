@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'pacientes')
@section('tab_title', 'pacientes | ' . config('app.name'))
@section('description', 'Lista de pacientes.')
@section('class', 'dashboard')

@section('content')
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Pacientes
        </h1>

        <p class="dashboard-heading__caption">
            Hay {{ $patients->count() }} pacientes registrados.
        </p>
    </div>

    <div class="fluid-container mb-16">
        @include('components.alert')
        <section class="db-panel">
            <h3 class="db-panel__title">
                Lista de pacientes
            </h3>

            @if (! $patients->count())
                <p class="text-center py-1">
                    Por el momento no hay pacientes registrados.
                </p>
            @else

                <resource-table :breakpoint="800" :model="{{ $patients }}" inline-template>
                    <table class="table size-caption mx-auto mb-16 md:table--responsive">
                        <thead>
                            <tr class="table-resource__headings">
                                <th>Nombre completo</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Nombre papá</th>
                                <th>Nombre mamá</th>
                                <th>Télefono</th>
                                <th class="pr-4">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="patientItem in resourceList" class="table-resource__row" :key="patientItem.id">
                                <td data-label="Nombre completo:">
                                    @{{ patientItem.name }}
                                </td>
                                <td data-label="Edad:">
                                    @{{ patientItem.age }}
                                </td>
                                <td data-label="Sexo:">
                                    @{{ patientItem.sex }}
                                </td>
                                <td data-label="Nombre papá:">
                                    @{{ patientItem.father_name }}
                                </td>
                                <td data-label="Nombre mamá:">
                                    @{{ patientItem.mother_name }}
                                </td>
                                <td data-label="Nombre télefono:">
                                    @{{ patientItem.phone }}
                                </td>
                                

                                <td class="table-resource__actions" data-label="Acciones:">
                                    <a class="btn btn-nowrap btn--sm btn--blue table-resource__button mr-2" :href="$root.path + '/admin/paciente/' + patientItem.id + '/editar' ">
                                        <img class="svg-icon" src="{{ url('img/svg/edit.svg')}}">
                                        Editar
                                    </a>
                                    <delete-button class="btn--danger table-resource__button" :url="$root.path + '/admin/paciente/eliminar/' + patientItem.id"
                                        :resource-id="patientItem.id"
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
