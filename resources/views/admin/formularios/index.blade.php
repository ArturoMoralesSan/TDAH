@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Formularios')
@section('tab_title', 'Formularios | ' . config('app.name'))
@section('description', 'Lista de Formularios.')
@section('class', 'dashboard')

@section('content')
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Formularios
        </h1>

        <p class="dashboard-heading__caption">
            Hay {{ $diagnosticforms->count() }} formularios registrados.
        </p>
    </div>

    <div class="fluid-container mb-16">
        @include('components.alert')
        <section class="db-panel">
            <h3 class="db-panel__title">
                Lista de formularios
            </h3>

            @if (! $diagnosticforms->count())
                <p class="text-center py-1">
                    Por el momento no hay formularios registrados.
                </p>
            @else

                <resource-table :breakpoint="800" :model="{{ $diagnosticforms }}" inline-template>
                    <table class="table size-caption mx-auto mb-16 md:table--responsive">
                        <thead>
                            <tr class="table-resource__headings">
                                <th>Formulario</th>
                                <th>Preguntas</th>
                                <th class="pr-4">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="diagnosticFormItem in resourceList" class="table-resource__row" :key="diagnosticFormItem.id">
                                <td data-label="Tipo:">
                                    @{{ diagnosticFormItem.form }}
                                </td>
                                <td>
                                    @{{ diagnosticFormItem.count_questions }}
                                </td>
                                
                                
                                <td class="table-resource__actions" data-label="Acciones:">
                                    <a class="btn btn-nowrap btn--sm btn--blue table-resource__button mr-2" :href="$root.path + '/admin/formulario/' + diagnosticFormItem.id + '/editar' ">
                                        <img class="svg-icon" src="{{ url('img/svg/edit.svg')}}">
                                        Editar
                                    </a>
                                    <delete-button class="btn--danger table-resource__button" :url="$root.path + '/admin/formulario/eliminar/' + diagnosticFormItem.id"
                                        :resource-id="diagnosticFormItem.id"
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