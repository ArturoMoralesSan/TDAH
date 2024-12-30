<template>
    <div class="box box--lg bg-white b-1 rounded relative">
        <h3>
            Pregunta {{ index }}
        </h3>

        <button v-if="index > minQuestions"
            class="btn btn--danger btn--xs rounded-0 absolute top-0 right-0"
            type="button"
            @click="$emit('remove', index)"
        >
            Eliminar
        </button>
        <div class="row mb-4">
            <div class="md:col">
                <div class="form-control">
                    <label :for="'question' + index + '-question'">Pregunta</label>
                    <search-select-field
                        :name="'question' + index + '_question'"
                        v-model="fields['question' + index + '_question']"
                        :options="questionData"
                        :initial="((typeof assignedQuestions[index-1] !== 'undefined') ? assignedQuestions[index-1].id.toString() : '')"
                    >
                    </search-select-field>
                    <field-errors :name="'question' + index + '_question'"></field-errors>
                </div>
            </div>
            
            
        </div>
        
    </div>
</template>

<script>
    import SearchSelectField from '../base/SearchSelectField.vue';
    import TextField from '../base/TextField.vue';
    import FieldErrors from '../base/FieldErrors.vue';

    export default {
        components: { SearchSelectField, FieldErrors, TextField },

        props: {
            questionData: {
                type: Object,
                required: true
            },
            index: {
                type: Number,
                required: true
            },

            errors: {
                type: Object,
                required: true
            },

            fields: {
                type: Object,
                required: true
            },
            
            minQuestions: {
                required: true,
                type: Number
            },
            assignedQuestions: {
                required: true,
                type: Array
            },
        },
        data() {
            return {
                noExistAlert: false,

            };
        },
    };
</script>
