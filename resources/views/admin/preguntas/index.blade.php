@extends('layout.dashboard-master')

{{-- Metadata --}}
@section('title', 'Preguntas')
@section('tab_title', 'Preguntas | ' . config('app.name'))
@section('description', 'Lista de Preguntas.')
@section('class', 'dashboard')

@section('content')
    <div class="dashboard-heading">
        <h1 class="dashboard-heading__title">
            Preguntas
        </h1>

        <p class="dashboard-heading__caption">
            Hay {{ $questions->count() }} preguntas registradas.
        </p>
    </div>

    <div class="fluid-container mb-16">
        @include('components.alert')
        <section class="db-panel">
            <h3 class="db-panel__title">
                Lista de preguntas
            </h3>

            @if (! $questions->count())
                <p class="text-center py-1">
                    Por el momento no hay preguntas registradas.
                </p>
            @else

                <resource-table :breakpoint="800" :model="{{ $questions }}" inline-template>
                    <table class="table size-caption mx-auto mb-16 md:table--responsive">
                        <thead>
                            <tr class="table-resource__headings">
                                <th>Pregunta</th>
                                <th>Descripción</th>
                                <th class="pr-4">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="questionItem in resourceList" class="table-resource__row" :key="questionItem.id">
                                <td data-label="Pregunta:">
                                    @{{ questionItem.question }}
                                </td>
                                <td data-label="Descripción:">
                                    @{{ questionItem.description }}
                                </td>
                                
                                <td class="table-resource__actions" data-label="Acciones:">
                                    <a class="btn btn-nowrap btn--sm btn--blue table-resource__button mr-2" :href="$root.path + '/admin/pregunta/' + questionItem.id + '/editar' ">
                                        <img class="svg-icon" src="{{ url('img/svg/edit.svg')}}">
                                        Editar
                                    </a>
                                    <delete-button class="btn--danger table-resource__button" :url="$root.path + '/admin/pregunta/eliminar/' + questionItem.id"
                                        :resource-id="questionItem.id"
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
