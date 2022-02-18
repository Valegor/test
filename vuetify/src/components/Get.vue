<template>
    <div>
        Get
    </div>
</template>

<script>
    import axios from '../axios/axios'

    export default {
        name: "Get",

        mounted(){
            this.getData()
        },

        methods: {
            getData() {
                axios.get('/api/get').then(res => { console.log(res)})
                // console.log ('hello world')
            }
        }
    }
    
</script>

<style scoped>

</style>