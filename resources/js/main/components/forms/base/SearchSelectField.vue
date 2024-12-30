<template>
    <div class="select-field">
        <input
            class="form-field form-field-select"
            :class="{ 'form-field--invalid' : hasErrors }"
            :id="id"
            :name="name"
            :aria-invalid="hasErrors ? 'true' : null"
            :aria-describedby="describedBy || null"
            type="text"
            v-model="filter"
            placeholder="Selecciona una opción..."
            @focus="showOptions = true"
            @blur="hideOptions"
            @input="filterOptions"
            ref="input"
        />
        <!-- Flecha hacia abajo, solo visible cuando no se está escribiendo y las opciones no están abiertas -->
        <span v-if="!filter && !showOptions" class="arrow"></span>

        <ul v-show="showOptions" class="options-list" ref="dropdown">
            <li v-for="(option, key) in filteredOptions"
                :key="key"
                @mousedown.prevent="selectOption(key, option)"
                v-text="option"
                class="option-item"
            ></li>
        </ul>
    </div>
</template>



<script>
import FormField from '../../../mixins/FormField.js';

export default {
    mixins: [FormField],

    props: {
        /**
         * Receive an initial selected value.
         */
        initial: {
            type: [Number, String],
            required: false,
            default: ''
        },

        /**
         * An object of values and descriptions to populate the options
         * inside the select field.
         */
        options: {
            type: [Object, Array],
            required: true
        }
    },

    data() {
        return {
            filter: this.initial ? this.options[this.initial] || '' : '',
            showOptions: false,
            selectedOption: this.initial,
            filteredOptions: this.options
        };
    },

    methods: {
        filterOptions() {
            const filter = this.filter.toLowerCase();
            this.filteredOptions = Object.keys(this.options).reduce((acc, key) => {
                if (this.options[key].toLowerCase().includes(filter)) {
                    acc[key] = this.options[key];
                }
                return acc;
            }, {});

            // Calcula dinámicamente la posición para el dropdown
            this.calculateDropdownPosition();
        },

        selectOption(key, option) {
            this.filter = option;
            this.selectedOption = key;
            this.showOptions = false;
            this.$emit('input', key);
        },

        hideOptions() {
            // Delay hiding to allow option selection
            setTimeout(() => {
                this.showOptions = false;
            }, 100);
        },

        calculateDropdownPosition() {
            const inputElement = this.$refs.input; // Si le añades una referencia al input
            const dropdown = this.$refs.dropdown; // Referencia a la lista de opciones
            if (inputElement && dropdown) {
                const inputRect = inputElement.getBoundingClientRect();
                dropdown.style.top = `${inputRect.bottom + window.scrollY}px`; // Ajusta la posición
            }
        },
    },

    mounted() {
        this.$set(this.$parent.fields, this.name, this.initial);
    }
};
</script>

<style>
.select-field {
  position: relative;
  overflow: visible;  /* Permitir que los elementos se desborden fuera del contenedor */
}

.form-field-select {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
  background-color: white;
  border: 1px solid #ccc;
  border-radius: 4px;
  cursor: pointer;
  position: relative;
  padding-right: 30px;  /* Aseguramos que haya espacio para la flecha */
}

.selected-option {
  flex-grow: 1;
  color: #333;
}

.arrow {
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 6px solid #333;
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  pointer-events: none;
}

.options-list {
  width: auto;
  border: 1px solid #ccc;
  background: white;
  max-height: 150px;
  overflow-y: auto;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
  z-index: 9999;
  margin: 0;
  padding: 0;
  list-style: none;
}

.option-item {
  padding: 10px;
  cursor: pointer;
}

.option-item:hover {
  background-color: #f0f0f0;
}



</style>
