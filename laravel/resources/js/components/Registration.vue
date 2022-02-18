<template>
    <div  class="w-25">
            <input v-model="name" type="text" placeholder="name" class="form-control mt-3 mb-3">
            <input v-model="email" type="email" placeholder="email" class="form-control mb-3">
            <input v-model="password" type="password" placeholder="password" class="form-control mb-3">
            <input v-model="password_confirmation" type="password" placeholder="confirm password" class="form-control mb-3">
            <input @click.prevent="register" type="submit" value="register" class="btn btn-primary mb-3">
    </div>
</template>

<script>
    export default {
        name: "Rgistration",

        data(){
            return{
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            }
        },

        methods: {
            register() {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('/register', 
                        { 
                            name: this.name , 
                            email: this.email, 
                            password: this.password, 
                            password_confirmation: this.password_confirmation  
                        })
                                .then( res => {
                                    // console.log('response')
                                    // console.log(res);
                                    localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
                                    this.$router.push({ name: 'user.personal' })
                                })
                                .catch( err => {
                                    // console.log('error')
                                    console.log(err.response);
                                })
                })
            }
        }
    }
</script>

<style scoped>

</style>