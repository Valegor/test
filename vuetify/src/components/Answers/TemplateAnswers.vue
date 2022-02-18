<template>

<div>


<v-card
    v-for="post in posts.data" :key="post.id"
    class="mx-auto mb-4"
    max-width="400"
    tile
    :to="'/answer/' + post.id"
  >
    <v-list-item>
        <v-list-item-content>
            <v-list-item-title>{{ post.title }}</v-list-item-title>
            <v-list-item-subtitle>
                {{ post.subtitle }}
            </v-list-item-subtitle>
            <v-list-item-subtitle>
                <b>Author: </b>{{ post.author_name }}
            </v-list-item-subtitle>
        </v-list-item-content>
    </v-list-item> 

</v-card>


<br>

<pagination 
    :data="posts" 
    @pagination-change-page="getResults"
    :limit=2
    size="small"
    align="center"
></pagination>

</div> 

</template>

<script>

    import axios from '@/axios/axios'

    export default {
    data () {
        return {
            posts: {},
            category: '',
            page: 1,
            cat_id: '',
            show: false,
            serverUrl: '',

        }
    },
    methods: {
        getResults(page = this.page) {

            this.cat_id = this.$route.params.id

			axios.get('/api/template-answers/' + this.cat_id + '?page=' + page)
				.then(response => {
					this.posts = response.data;
				});
        
            // console.log(this.posts)
            
            this.serverUrl = this.$store.getters.serverUrl;
		}
    },
    created() {

    },
    updated (){

    },
    mounted() {
        this.getResults()
    }

    }

</script>