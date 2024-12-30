<template>
    <form>
        <section class="db-panel">
            <h3 class="db-panel__title">
                Datos del formulario
            </h3>
            <div class="md:row">
                <div class="md:col-1/2">
                    <div class="form-control">
                        <label for="form">Formulario</label>
                        <text-field 
                            name="form" 
                            v-model="fields.form" 
                            :initial="((typeof form !== 'undefined') ? form.form : '')"                           
                        ></text-field>
                        <field-errors name="form"></field-errors>
                    </div>
                </div>
                <div class="md:col-1/2">
                    <div class="form-control">
                        <label for="diagnostic_id">Diagnostico</label>
                        <select-field 
                            class="form-select" 
                            name="diagnostic_id" 
                            v-model="fields.diagnostic_id"
                            :options="diagnostics"
                            :initial="((typeof form.diagnostic_id !== 'undefined') ? form.diagnostic_id : '')"
                        >
                                    </select-field>
                        <field-errors name="teacher"></field-errors>
                    </div>
                </div>
            </div>
        </section>
        <div>
            <QuestionForm v-for="i in fields.question_count" :key="i"
                :index="i"
                :min-questions="minQuestions"
                :question-data="questionData"
                :assigned-questions="assignedQuestions"
                :errors="errors"
                :fields="fields"
                @remove="removeQuestion"
            >
            </QuestionForm>

            <p class="pt-4">
                <button v-if="fields.question_count < questions"
                    class="btn btn--light mr-4"
                    type="button"
                    @click="fields.question_count++"
                >
                    <img class="mr-1 align-top"
                        :src="$root.path + '/img/icons/plus-circle-primary.svg'"
                        alt=""
                        width="20px"
                    >
                    <span class="align-top">Agregar Pregunta</span>
                </button>

                <span v-if="questions > 1 "> Puedes registrar a un máximo de {{ questions }} preguntas.</span>
                <span v-else> Puedes registrar únicamente una pregunta.</span>
            </p>
        </div>
        <div class="text-center pt-8">
            <form-button class="btn--primary btn--wide">
                Enviar
            </form-button>
        </div>
   </form>
</template>

<script>
    import BaseForm from '../base/BaseForm.vue';
    import QuestionForm from './QuestionForm.vue';

    export default {
        extends: BaseForm,

        components: { QuestionForm },
        props: {
            questions: {
                required: true,
                type: Number
            },
            minQuestions: {
                required: true,
                type: Number
            },
            questionData: {
                required: true,
                type: Object
            },
            assignedQuestions: {
                required: true,
                type: Array
            },
            diagnostics: {
                required: true,
                type: Object
            },
            form: {
                required: true,
                type: Object,
                
            },

        },
        data() {
            return {
                firstTime: null,
                fields: {
                    question_count: this.minQuestions,
                    form_id : this.form.id
                }
            };
        },
        mounted() {
            if (this.assignedQuestions.length != 0) {
                this.fields.question_count = this.assignedQuestions.length;
            }

        },
        watch: {
            firstTime: function(val) {
                this.fields._method = val === false ? 'patch' : 'post';
            }
        },

        methods: {
            /**
             * Copy all author's fields from one card to another.
             *
             * @param {Integer} source
             * @param {Integer} target
             */
            copyAuthorFields(source, target) {
                const regex = new RegExp('^question' + source + '_');

                this.deleteAuthorFields(target);

                for (let field in this.fields) {
                    if (regex.test(field)) {
                        this.$set(this.fields, field.replace(source, target), this.fields[field]);
                    }
                }
            },


            /**
             * Delete all fields for the given author.
             *
             * @param {Integer} index
             */
            deleteAuthorFields(index) {
                const regex = new RegExp('^question' + index + '_');

                for (let field in this.fields) {
                    if (regex.test(field)) {
                        delete this.fields[field];
                    }
                }
            },


            /**
             * Copy all necessary author fields to move their index
             * and then remove the last card.
             *
             * @param {Integer} index
             */
            removeQuestion(index) {
                for (let i = 0; i < this.fields.question_count - index; i ++) {
                    this.copyAuthorFields(index + i + 1, index + i);
                }

                this.fields.question_count--;

                this.deleteAuthorFields(this.fields.question_count + 1);
            }
        }
    };
</script>
