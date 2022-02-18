<template>

<div>

<v-card
    v-for="category in categories.data" :key="category.id"
    class="mx-auto mb-4"
    max-width="400"
    tile
    :to="'/cards-category/' + category.id"
>
    <v-list-item>
        <v-list-item-content>
            <v-list-item-title><h3>{{ category.name }}</h3></v-list-item-title>
        </v-list-item-content>
    </v-list-item> 

    <v-img
      :src="serverUrl + category.img"
      max-height="125"
      contain
    ></v-img>

    <br>


</v-card>


<pagination 
    :data="categories" 
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
            page: 1,
            categories: {},
            serverUrl: ''
        }
    },
    methods: {
        getResults(page = this.page) {
			axios.get('/api/card-categories?page=' + page)
				.then(response => {
					this.categories = response.data;
				});

            this.serverUrl = this.$store.getters.serverUrl;    
		}
    },
    created() {
        this.getResults()
    },
    updated (){

    },
    mounted() {
        this.getResults()
    }

    }

</script>

