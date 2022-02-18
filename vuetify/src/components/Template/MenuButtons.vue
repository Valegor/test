<template>

<v-toolbar-items class="hidden-sm-and-down">
    <div>
    <v-btn
        v-for="link in links"
        :key="link.title"
        :to="link.url"
        color="primary"
        depressed
    >
        <v-icon left>{{link.icon}}</v-icon>
        {{link.title}}
        
        </v-btn>

        
        <!-- LOGIN BUTTON -->

    <v-btn
            v-if="!token"
            depressed
            color="primary"
            router-link to=/login
            >
            <v-icon left>mdi-lock</v-icon>
            Login
    </v-btn>


        <!-- REGISTRATION BUTTON -->

        <v-btn
            v-if="!token"
            depressed
            color="primary"
            router-link to=/registration
            >
            <v-icon left>mdi-star</v-icon>
            Registration
        </v-btn>

        <!-- LOGOUT BUTTON -->

        <v-btn
            v-if="token"
            depressed
            color="primary"
            @click="logout"
            >
            <v-icon left>mdi-home</v-icon>
            Logout
        </v-btn>
        </div>
    </v-toolbar-items>

</template>

<script>

import { logouts } from '../../axios/logout'

export default {
    data () {
    return {
        links: [
        {title: 'Games', icon: 'mdi-gamepad-variant', url: '/games-categories'},
        {title: 'Posts', icon: 'mdi-newspaper', url: '/posts-categories'},
        {title: 'Cards', icon: 'mdi-cards-playing-outline', url: '/cards-categories'},
        {title: 'Templates', icon: 'mdi-checkbox-multiple-blank-outline', url: '/template-categories'},
        {title: 'My Answers', icon: 'mdi-border-color', url: '/myanswers'},
        // {title: 'Get', icon: 'mdi-trending-up', url: '/get'},
        ],
        token: null
    }
    },
    mounted() {
            this.getToken()
        },

        updated() {
            this.getToken()
        },
    methods: {
            getToken(){
                this.token = localStorage.getItem('x_xsrf_token')
            },
            logout() {
                logouts()
            }
        }
}
    
</script>

<style scoped>

</style>