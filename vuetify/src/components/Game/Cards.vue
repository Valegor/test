
<template>

<div>

<v-card
    v-for="card in cards.data" :key="card.id"
    class="mx-auto mb-4"
    max-width="400"
    tile
    :to="'/card/' + card.id"
>
    <v-list-item>
        <v-list-item-content>
            <v-list-item-title>{{ card.name }}</v-list-item-title>
        </v-list-item-content>
    </v-list-item> 
</v-card>

<pagination 
    :data="cards" 
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
            cards: {},
            page: 1,
            // current_page: 7
        }
    },
    methods: {
        getResults(page = this.page) {
			axios.get('/api/cards?page=' + page)
				.then(response => {
					this.cards = response.data;
				});
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