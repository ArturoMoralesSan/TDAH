<template>
    <form class="search-form__dashboard search-form-width" action="" method="get">
        <!--@blur="outSelect"  -->
        <input
            class="form-field"
            name="search"
            placeholder="Buscar"
            ref="searchinput"
            :value="selected"
        >
        <button class=" btn btn--primary" type="submit" @click.prevent="search">
            <slot name="svg-search"></slot>
        </button>
    </form>
</template>
<script>
    export default {
        props: {

            selected: {
                type: String,
                default:false,
                required:false
            },
        },
        methods: {
            search(e) {
                let queryString = window.location.search;
                let urlParams = new URLSearchParams(queryString);
                let reloadUrl = this.$root.path + window.location.pathname;
                console.log(urlParams);
                urlParams.set('search', this.$refs.searchinput.value)
                urlParams.delete('page');
                let urlParameter = reloadUrl+'?'+urlParams.toString();
                window.location.href = urlParameter;

            }
        }
    };
</script>