<template>
    <v-container>
        <v-row justify="center">
            Store
        </v-row>
    </v-container>
</template>

<script>

    export default {
    data: () => ({

    }),
    methods: {
        set_total($total){
            this.$store.commit('SET_TOTAL', $total)
        },
        total(){
            return this.$store.getters.TOTAL;
        },
    },
    mounted() {
        this.set_total(500)
        console.log(this.total())

    }

    }

</script>
