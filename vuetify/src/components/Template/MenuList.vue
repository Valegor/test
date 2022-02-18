<template>
    <v-list
        dense
        nav
    >

        <!-- LOGIN ITEM -->

        <v-list-item
        v-if="!token"
        router-link to=/login
        >
        <v-list-item-icon>
            <v-icon>mdi-lock</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
            <v-list-item-title>Login</v-list-item-title>
        </v-list-item-content>
        </v-list-item>


        <!-- REGISTER ITEM -->

        <v-list-item
        v-if="!token"
        router-link to=/registration
        >
        <v-list-item-icon>
            <v-icon>mdi-star</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
            <v-list-item-title>Registration</v-list-item-title>
        </v-list-item-content>
        </v-list-item>


        <!-- LOGOUT ITEM -->

        <v-list-item
        v-if="token"
        @click="logout"
        >
        <v-list-item-icon>
            <v-icon>mdi-home</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
            <v-list-item-title>Logout</v-list-item-title>
        </v-list-item-content>
        </v-list-item>




        <v-list-item
        v-for="link in links"
        :key="link.title"
        :to="link.url"
        >
        <v-list-item-icon>
            <v-icon>{{ link.icon }}</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
            <v-list-item-title>{{ link.title }}</v-list-item-title>
        </v-list-item-content>
        </v-list-item>


    </v-list>
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